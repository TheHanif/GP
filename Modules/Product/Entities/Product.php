<?php

namespace Modules\Product\Entities;

use Illuminate\Database\Eloquent\Model;
use Cache;

class Product extends Model
{
    protected $fillable = [];

    /**
     * Get all the categories associated with the category
     */
    public function categories()
    {
        return $this->belongsToMany(\Modules\Category\Entities\Category::class);
    }
    public function getCategoriesAttribute(){
        return Cache::remember('productCategories'.$this->id, env('CACHE_ITEM', 60), function() {
            return $this->categories()->get();
        });
    }

    /**
     * Get all the metas associated with the product
     */
    public function metas()
    {
        return $this->hasMany(\Modules\Product\Entities\ProductMeta::class);
    }

    /**
     * Get single meta by key
     */
    public function meta($key)
    {
        $value = $this->metas()->select('meta_value')->where('meta_key', $key)->first();
        return $value ? $value['meta_value'] : null;
    }    

    /**
     * With status active
     */
    public function scopeActive($query)
    {
        return $query->where('status', 1);
    }

    /**
     * Get calculated sale price
     */
    public function getSalePriceAttribute(){

        $sale_price = $this->price;

        if($this->discount > 0 && $this->discount_type != null){

            if ($this->discount_type == 'percentage'){
                $sale_price -= ($sale_price/100)*$this->discount;
            }

            if ($this->discount_type == 'flat'){
                $sale_price = $sale_price-$this->discount;
            }
        }

        return number_format($sale_price, 2);
    }

    /**
     * Product thumbnail images
     */
    public function thumbnails(){
        return $this->hasMany(\Modules\Product\Entities\ProductImage::class)
            ->where('size', 'thumbnail');
    }
    public function getThumbnailsAttribute(){
        return Cache::remember('productThumbnails'.$this->id, env('CACHE_ITEM', 60), function() {
            return $this->thumbnails()->get();
        });
    }

    /**
     * Product images
     */
    public function images(){
        return $this->hasMany(\Modules\Product\Entities\ProductImage::class)
            ->where('size', 'large');
    }
    public function getImagesAttribute(){
        return Cache::remember('productImages'.$this->id, env('CACHE_ITEM', 60), function() {
            return $this->images()->get();
        });
    }

    /**
     * Generate Route using last category
     */
    public function getRouteAttribute()
    {
        return Cache::remember('productURL'.$this->id, env('CACHE_ITEM', 60), function() {
            return route('site.product', [$this->categories->last()->AncestorsList, $this->slug]);
        });
    }
}

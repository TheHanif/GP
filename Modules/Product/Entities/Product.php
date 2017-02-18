<?php

namespace Modules\Product\Entities;

use Illuminate\Database\Eloquent\Model;

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

    /**
     * Get all the metas associated with the product
     */
    public function metas()
    {
        return $this->hasMany(\Modules\Product\Entities\ProductMeta::class);
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
                $sale_price += ($sale_price/100)*$this->discount;
            }

            if ($this->discount_type == 'flat'){
                $sale_price = $sale_price-$this->discount;
            }

        }

        return $sale_price;
    }
}

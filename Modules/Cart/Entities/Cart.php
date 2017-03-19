<?php

namespace Modules\Cart\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;
use Modules\Product\Entities\Product;

class Cart extends Model
{
    protected $fillable = ['user_id', 'product_id', 'name', 'route', 'thumbnail', 'price', 'quantity'];

    protected $table = 'cart';

    public function getPriceAttribute(){
        return $this->product->sale_price;
    }
    public function getNameAttribute(){
        return $this->product->name;
    }
    public function getRouteAttribute(){
        return $this->product->route;
    }
    public function getThumbnailAttribute(){
        $thumbnail = $this->product->thumbnails->first();
        return url($thumbnail->path.$thumbnail->name);
    }

    public function product(){
        return $this->belongsTo(Product::class);
    }
    public function getProductAttribute(){
        return Cache::remember('cartProduct'.$this->id, env('CACHE_CART_PRODUCT', 1), function() {
            return $this->product()->first();
        });
    }
}

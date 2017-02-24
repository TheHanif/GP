<?php

namespace Modules\Brand\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

class Brand extends Model
{
    protected $fillable = [];

    /**
     * With status active
     */
    public function scopeActive($query)
    {
        return $query->where('status', 1);
    }

    /**
     * Get Route
     */
    public function getRouteAttribute(){
        return route('site.brand', $this->slug);
    }

    /**
     * Get all the products
     */
    function products()
    {
        return $this->hasMany(\Modules\Product\Entities\Product::class);
    }
    public function getProductsAttribute(){
        return Cache::remember('brandProduct'.$this->id, env('CACHE_ITEM', 60), function() {
            return $this->products()->active()->get();
        });
    }
}

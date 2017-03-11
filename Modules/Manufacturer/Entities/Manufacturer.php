<?php

namespace Modules\Manufacturer\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

class Manufacturer extends Model
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
        return route('site.manufacturer', $this->slug);
    }

    /**
     * Get all the products
     */
    function products()
    {
        return $this->hasMany(\Modules\Product\Entities\Product::class);
    }
    public function getProductsAttribute(){
        return Cache::remember('manufacturerProduct'.$this->id, env('CACHE_ITEM', 60), function() {
            return $this->products()->active()->get();
        });
    }

    /**
     * Generate Ancestors list for URL and Route
     */
    public function getAncestorsListAttribute()
    {
        // Manufacturer does not have ancestors like categories,
        // So we will use slug
        return $this->slug;
    }

    /**
     * This is used in route model binding
     */
    public function getAncestorsAttribute()
    {
        return collect();
    }
}

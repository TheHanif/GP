<?php

namespace Modules\Category\Entities;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['name', 'slug', 'description', 'status', 'parent_id'];

    protected $dates = ['created_at', 'updated_at'];

    /**
     * Get parent for current item
     */
    public function parent()
    {
    	return $this->belongsTo($this, 'parent_id');
    }

    /**
     * Get children of current element
     */
    public function children()
    {
    	return $this->hasMany($this, 'parent_id');
    }

    /**
     * With status active
     */
    public function scopeActive($query)
    {
        return $query->where('status', 1);
    }

    /**
     * Select item of first level in heirarchy
     */
    public function scopeFirstLevel($query)
    {
        return $query->where('parent_id', null);
    }

    /**
     * Check if item has third level
     * Used in navigation bar
     */
    public function UseMega()
    {   
        $useMega = false;

        foreach ($this->children as $child) {
            if ($child->children()->exists()) {
                $useMega = true;
                break;
            }
        }

        return $useMega;
    }

}

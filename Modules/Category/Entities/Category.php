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

    public function ancestors(){
        
        $ancestors = $this->select('id', 'slug', 'parent_id')->where('id', '=', $this->parent_id)->get();

        while ($ancestors->last() && $ancestors->last()->parent_id !== null)
        {
            $parent = $ancestors->last()->ancestors;
            $ancestors = $ancestors->merge($parent);
        }

        return $ancestors;
    }

    public function getAncestorsAttribute()
    {
        // return $this->ancestors();
        // or like this, if you want it the other way around
        return $this->ancestors()->reverse();
    }

    /**
     * Generate URL using ancestors
     */
    public function getUrlAttribute()
    {
        // Ancestors for get parents
        $ancestors = $this->ancestors;

        // Merge requested category in parents array
        $ancestors = $ancestors->merge(collect([$this]));

        $sections=array();
        foreach($ancestors as $ancestor)
        {
            $sections[]=$ancestor->slug;
        }
        
        return route('site.category', implode("/",$sections));
    }

}

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
    	return $this->belongsTo(\Modules\Category\Entities\Category::class, 'parent_id');
    }

    /**
     * Get children of current element
     */
    public function children()
    {
    	return $this->hasMany(\Modules\Category\Entities\Category::class, 'parent_id');
    }

}

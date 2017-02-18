<?php

namespace Modules\Product\Entities;

use Illuminate\Database\Eloquent\Model;

class ProductMeta extends Model
{
    protected $fillable = [];

    /**
     * Get Product of the meta
     */
    public function product()
    {
        return $this->belongsTo(\Modules\Product\Entities\Product::class);
    }
}

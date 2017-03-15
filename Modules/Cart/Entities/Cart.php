<?php

namespace Modules\Cart\Entities;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $fillable = ['user_id', 'product_id', 'name', 'route', 'thumbnail', 'price', 'quantity'];

    protected $table = 'cart';
}

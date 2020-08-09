<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'product_id', 'order_id', 'price', 'quantity'
    ];

    public function product()
    {
        return $this->belongsTo('App\Product');
    }

    public function order()
    {
        return $this->belongsTo('App\Order');
    }
}

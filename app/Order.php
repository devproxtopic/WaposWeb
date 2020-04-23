<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    //public $timestamps = false;
 
    protected $fillable = [
        'product_id', 'buyer_id', 'concept', 'amount','payment_type','date','transaction_status','ordernumber'
    ];
}

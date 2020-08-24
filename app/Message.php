<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $fillable = [
        'product_id','buyer_id','message',
        'concept',
        'type',
        'service_name',
        'amount',
        'phone_contact',
    ];
}

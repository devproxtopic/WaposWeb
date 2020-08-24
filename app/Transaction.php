<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $fillable = [
        'order_id', 'message_id', 'status'
    ];

    public function order(){
        return $this->belongsTo('App\Order');
    }

    public function message(){
        return $this->belongsTo('App\Message');
    }

    public function status(){
        return $this->belongsTo('App\Status');
    }
}

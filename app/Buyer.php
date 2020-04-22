<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Buyer extends Model
{
    public $timestamps = false;
    protected $fillable = [
        'lastname', 'name', 'phone', 'date_of_birth',
    ];
}

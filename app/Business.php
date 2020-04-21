<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Business extends Model
{
    public $timestamps = false;
    //
    protected $fillable = [
        'country_id', 'city_id', 'name', 'razon_social','rfc_rut_cuit','address','postal_code','phone','email','pin','pin_confirmation','status','client_id','no_cuenta','cedula_fiscal','bps','dgi'
    ];
}

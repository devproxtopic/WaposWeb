<?php

namespace App;

use Laravel\Passport\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

use App\Notifications\VerifyApiEmail;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'lastname', 'email', 'password', 'phone', 'provider', 'provider_id',
        'date_of_birth', 'gender', 'address', 'amount', 'country_id', 'city_id', 'profession_id',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Relaciones
     */

     public function profession(){
         return $this->belongsTo('App\Profession');
     }

     public function membership(){
        return $this->belongsTo('App\Membership');
    }

    public function sport_team(){
        return $this->belongsTo('App\SportTeam');
    }

    public function sport_player(){
       return $this->belongsTo('App\SportPlayer');
   }

   public function country(){
    return $this->belongsTo('App\Country');
    }

    public function city(){
    return $this->belongsTo('App\City');
    }

    public function sendApiEmailVerificationNotification()
    {
        $this->notify(new VerifyApiEmail);
    }
}

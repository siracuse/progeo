<?php

namespace App;

use function foo\func;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'firstname', 'email','phone' ,'password', 'is_resp'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


    public function promotions() {
        return $this->belongsToMany(Promotion::class);
    }

    public function stores() {
        return $this->hasMany(Store::class);
    }

    public function storeSecond() {
        return $this->belongsToMany(Store::class);
    }
}
<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'id_number',
        'email',
        'password',
        'is_admin',
        'is_operator',
        'is_guest',
        'mac_address',
        'ip_address',
        'avatar_file',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'created_at',
        'update_at',
    ];

    public function products()
    {
      return $this->hasMany('App\Models\Products', 'id');
    }

    public function schoolOperators()
    {
      return $this->hasMany('App\Models\SchoolOperator', 'id');
    }

    public function comments()
    {
      return $this->hasMany('App\Models\NewsComment', 'id');
    }

    public function bankAccounts()
    {
      return $this->hasMany('App\Models\BankAccount', 'id');
    }

    public function userAddresses()
    {
      return $this->hasMany('App\Models\UserAddress', 'id');
    }

    public function carts()
    {
      return $this->hasMany('App\Models\Cart', 'id');
    }

    public function payments()
    {
      return $this->hasMany('App\Models\Payment', 'id');
    }

    public function incomingMails()
    {
      return $this->hasMany('App\Models\IncomingMail', 'id');
    }
}

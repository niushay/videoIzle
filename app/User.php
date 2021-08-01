<?php

namespace App;

use http\Env\Request;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Passport\HasApiTokens;

class User extends Authenticatable
{
    use Notifiable, HasApiTokens;

    const TYPE_ADMIN = 'admin';
    const TYPE_USER = 'user';
    const TYPES = [self::TYPE_ADMIN , self::TYPE_USER];

    protected $table = 'users';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
            'type','mobile' ,'email' ,'name' ,'password' ,'avatar' ,'website' ,'verify_code', 'verified_at'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'verify_code',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'verified_at' => 'datetime',
    ];

    /**
     * find user for login by email or mobile phone
     * @param $username
     * @return mixed
     */
    public function findForPassport($username)
    {
        $user = static::where( 'mobile' , $username) -> orWhere('email', $username) -> first();
        return $user;
    }
}

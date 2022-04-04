<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Tymon\JWTAuth\Contracts\JWTSubject;

class User extends Authenticatable implements JWTSubject
{
    use HasFactory, Notifiable;

   
    protected $table = 'users';
    protected $primaryKey = 'user_id';
    

    
    const CREATED_AT = 'added_at';
    const UPDATED_AT = 'updated_at';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'mobile_number',
        'role_id',
		'roles',
        'country_code',
        'phone_otp',
        'phone_otp_verified_at',
        'first_name',
        'last_name',
        'emergency_contact_name',
        'emergency_contact_no',
        'date_of_birth',
        'profile_picture',
        'home_picture',
        'description',
        'bio',
        'receive_receipt_email',
        'is_available',
        'about_home',
        'latitude',
        'latitude',
        'longitude',
        'password',
		'users_name',
		'gender',
		'confirm_password',
        'email_id',
        'email_verified_at',
        'email_verified',
        'screen_completed',
        'wallet_amount',
        'remember_token',
        'delete_status',
        'active_status',
        'pin_code',
        'added_at',
        'updated_at'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = ['phone_otp_verified_at','email_verified_at','phone_otp'];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

       public function getJWTIdentifier()
        {
            return $this->getKey();
        }
    public function getJWTCustomClaims()
        {
            return [];
        }
}

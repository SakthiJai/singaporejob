<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ContactUs extends Model
{
   
    protected $table = 'contact_us';
    protected $primaryKey = 'id';

    
    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id', 'first_name', 'last_name', 'email_id', 'mobile_number', 'reason', 'message', 'added_at', 'ip_address', 'device_info'
    ];


}

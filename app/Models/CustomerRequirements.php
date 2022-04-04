<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CustomerRequirements extends Model
{
   
    protected $table = 'customer_requirements';
    protected $primaryKey = 'cust_req_id';

    
    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'cust_req_id',
        'user_id',
        'requirement_id',
        'added_at',
        'ip_address',
        'device_info',
        'browser_info',
        'utm_source',
        'utm_campaign'
    ];


}

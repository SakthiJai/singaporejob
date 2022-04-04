<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CustomerServiceEnquiries extends Model
{
   
    protected $table = 'customer_service_enquiries';
    protected $primaryKey = 'enquiry_id';

    
    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'enquiry_id',
        'user_id',
        'service_page_id',
        'added_at',
        'status'
    ];


}

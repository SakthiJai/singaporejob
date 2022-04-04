<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Orders extends Model
{
    

   
    protected $table = 'orders';
    protected $primaryKey = 'id';
    
      const CREATED_AT = 'added_at';
      const UPDATED_AT = 'updated_at';


    protected $fillable = [
       
        'id',
        'bill_no',
        'customer_name',
        'customer_address',
        'customer_phone',
		'gross_amount',
		'service_charge_rate',
		'service_charge',
		'vat_charge_rate',
		'vat_charge',
		'net_amount',
		'discount',
		'paid_status',
		'user_id',
		'delete_status',
		'added_at',
		'updated_at'
		
    ];

    
}

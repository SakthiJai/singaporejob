<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Company extends Model
{
    

   
    protected $table = 'company';
    protected $primaryKey = 'id ';
    
      const CREATED_AT = 'added_at';
      const UPDATED_AT = 'updated_at';


    protected $fillable = [
       
        'id ',
        'company_name	',
        'service_charge_value',
		'vat_charge_value',
		'address',
		'phone',
		'country',
		'message',
		'currency',
        'added_at',
        'updated_at'
    ];

    
}

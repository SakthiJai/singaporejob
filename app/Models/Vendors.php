<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Vendors extends Model
{
    

   
    protected $table = 'vendors';
    protected $primaryKey = 'id ';
    

      const CREATED_AT = 'added_at';
      const UPDATED_AT = 'updated_at';
	  
    protected $fillable = [
        'id',
        'vendors_name',
        'address',
		'sales_date',
		'sales_value',
		'invoice_no',
		'invoice_date',
        'due_date',
		'active',
		'added_at',
		'updated_at'
    ];

    
}

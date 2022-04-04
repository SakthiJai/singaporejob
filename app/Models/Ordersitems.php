<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Ordersitems extends Model
{
    

   
    protected $table = 'orders_item';
    protected $primaryKey = 'id';
    
      const CREATED_AT = 'added_at';
      const UPDATED_AT = 'updated_at';


    protected $fillable = [
       
        'id',
        'order_id',
        'product_id',
        'qty',
		'rate',
		'amount',
		'added_at',
        'updated_at'
    ];

    
}

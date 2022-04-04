<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class product extends Model
{
    

   
    protected $table = 'products';
    protected $primaryKey = 'id';
    

      const CREATED_AT = 'added_at';
      const UPDATED_AT = 'updated_at';
	  
    protected $fillable = [
        'id',
        'name',
        'price',
		'selling_price',
		'sku',
		'description',
		'qty',
        'image',
		'brand_id',
		'attribute_value_id',
		'category_id',
		'size_id',
		'store_id',
		'availability',
		'status',
		'barcode',
		'weight',
		'stock',
		'added_at',
		'updated_at'
    ];

    
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class AddElementsValue extends Model
{
    

   
    protected $table = 'attribute_value';
    protected $primaryKey = 'id';
    
      const CREATED_AT = 'added_at';
      const UPDATED_AT = 'updated_at';


    protected $fillable = [
       
        'id',
        'value',
        'attribute_parent_id',
		'active',
        'added_at',
        'updated_at'
    ];

    
}

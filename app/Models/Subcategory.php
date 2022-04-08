<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Subcategory extends Model
{
    

   
    protected $table = 'sub_category';
    protected $primaryKey = 'sub_cat_id ';
    
      const CREATED_AT = 'added_at';
      const UPDATED_AT = 'updated_at';


    protected $fillable = [
       
        'sub_cat_id ',
        'cat_id',
        'sub_cat_name',
		'education_certficate',
		'is_certificate',
		'certficate',
		'status',
        'added_at',
        'updated_at'
    ];

    
}

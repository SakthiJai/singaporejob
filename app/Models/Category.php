<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Category extends Model
{
    

   
    protected $table = 'category';
    protected $primaryKey = 'cat_id';
    
      const CREATED_AT = 'added_at';
      const UPDATED_AT = 'updated_at';


    protected $fillable = [
       
        'cat_id',
        'cat_name',
        'status',
        'added_at',
        'updated_at'
    ];

    
}

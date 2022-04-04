<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Menuname extends Model
{
    

   
    protected $table = 'menu_name';
    protected $primaryKey = 'id ';
    
      const CREATED_AT = 'added_at';
      const UPDATED_AT = 'updated_at';


    protected $fillable = [
       
        'id ',
        'menu_name',
		'added_at',
		'updated_at'
    ];

    
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Items extends Model
{
    

   
    protected $table = 'brands';
    protected $primaryKey = 'id';
    
        const CREATED_AT = 'added_at';
      const UPDATED_AT = 'updated_at';
      


    protected $fillable = [
       
        'id',
        'name',
        'active',
        'added_at',
        'updated_at'
    ];


}
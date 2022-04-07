<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Sectors extends Model
{
    

   
    protected $table = 'sectors';
    protected $primaryKey = 'sectors_id';
    
      const CREATED_AT = 'added_at';
      const UPDATED_AT = 'updated_at';


    protected $fillable = [
       
        'sectors_id',
        'sectors_name',
        'status',
        'added_at',
        'updated_at'
    ];

    
}

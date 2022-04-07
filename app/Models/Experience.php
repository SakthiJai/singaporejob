<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Experience extends Model
{
    

   
    protected $table = 'experiencerange';
    protected $primaryKey = 'exp_id ';
    
        const CREATED_AT = 'added_at';
      const UPDATED_AT = 'updated_at';
      


    protected $fillable = [
       
        'exp_id ',
        'exp_range',
        'status',
        'added_at',
        'updated_at'
    ];


}
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Terms extends Model
{
   
    protected $table ='cms';
    protected $primaryKey ='id';

    
   

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'content',
        'type',
        'updated_at',
        'created_at'
       
    ];

   

   
}

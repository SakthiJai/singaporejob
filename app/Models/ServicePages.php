<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ServicePages extends Model
{
   
    protected $table = 'service_pages';
    protected $primaryKey = 'service_page_id';

    
    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'service_page_id',
        'service_name',
        'added_by',
        'added_at'
    ];

   

   
}

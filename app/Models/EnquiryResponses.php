<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EnquiryResponses extends Model
{
   
    protected $table = 'enquiry_responses';
    protected $primaryKey = 'id';

    
    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'enquiry_id',
        'question',
        'answer',
        'type'
    ];


}

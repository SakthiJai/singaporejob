<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CREmailInfo extends Model
{
   
    protected $table = 'cir_email_info';
    protected $primaryKey = 'cir_email_info_id';

    
    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'cir_email_info_id', 'report_id', 'seq', 'report_date', 'emai_address'
    ];


}

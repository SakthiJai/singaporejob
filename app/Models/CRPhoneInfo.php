<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CRPhoneInfo extends Model
{
   
    protected $table = 'cir_phone_info';
    protected $primaryKey = 'cir_phone_info_id';

    
    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'cir_phone_info_id', 'report_id', 'seq', 'type_code', 'report_date', 'number'
    ];


}

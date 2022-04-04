<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CRAddressInfo extends Model
{
   
    protected $table = 'cir_address_info';
    protected $primaryKey = 'cir_address_info_id';

    
    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'cir_address_info_id', 'report_id', 'seq', 'reported_date', 'address', 'state', 'postal', 'type'
    ];


}

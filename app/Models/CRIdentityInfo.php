<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CRIdentityInfo extends Model
{
   
    protected $table = 'cir_identity_info';
    protected $primaryKey = 'id';

    
    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id', 'report_id', 'type_of_document', 'id_number', 'reported_date','added_at'
    ];


}

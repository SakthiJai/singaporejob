<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CRDimensionalVariable extends Model
{
   
    protected $table = 'cir_dimensional_variable';
    protected $primaryKey = 'dimension_id';

    
    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'dimension_id', 'report_id', 'TDA_MESMI_CC_PSDAMT_24', 'TDA_MESME_INS_PSDAMT_24', 'TDA_METSU_CC_PSDAMT_3', 'TDA_SUM_PF_PSDAMT_3'
    ];


}

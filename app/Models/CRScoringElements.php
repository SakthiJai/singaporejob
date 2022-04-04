<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CRScoringElements extends Model
{
   
    protected $table = 'cir_scoring_elements';
    protected $primaryKey = 'cir_score_element_id';

    
    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'cir_score_element_id', 'cir_score_id', 'type', 'seq', 'Description'
    ];


}

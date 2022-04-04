<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CRScoreDetails extends Model
{
   
    protected $table = 'cir_score_details';
    protected $primaryKey = 'cir_score_id';

    
    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'cir_score_id', 'report_id', 'Type', 'Version', 'Name', 'Value'
    ];

    public function ScoringElements()
    {
        return $this->hasMany(CRScoringElements::class,'cir_score_id');
    }
}

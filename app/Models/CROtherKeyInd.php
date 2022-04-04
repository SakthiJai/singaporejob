<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CROtherKeyInd extends Model
{
   
    protected $table = 'cir_other_key_ind';
    protected $primaryKey = 'other_key_ind_id';

    
    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'other_key_ind_id', 'report_id', 'AgeOfOldestTrade', 'NumberOfOpenTrades', 'AllLinesEVERWritten', 'AllLinesEVERWrittenIn9Months', 'AllLinesEVERWrittenIn6Months'
    ];


}

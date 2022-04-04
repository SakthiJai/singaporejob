<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CREnquirySummary extends Model
{
   
    protected $table = 'cir_enquiry_summary';
    protected $primaryKey = 'cir_enquiry_id';

    
    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'cir_enquiry_id', 'report_id', 'Purpose', 'Total', 'Past30Days', 'Past12Months', 'Past24Months', 'Recent'
    ];


}

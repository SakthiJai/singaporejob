<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CRRecentActivities extends Model
{
   
    protected $table = 'cir_recent_activities';
    protected $primaryKey = 'cir_recent_activities_id';

    
    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'cir_recent_activities_id', 'report_id', 'AccountsDeliquent', 'AccountsOpened', 'TotalInquiries', 'AccountsUpdated'
    ];


}

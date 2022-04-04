<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CRHistory48Months extends Model
{
   
    protected $table = 'cir_history_48_months';
    protected $primaryKey = 'history_id';

    
    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'history_id', 'cir_account_id', 'key', 'payment_status', 'suit_filed_status', 'asset_classification_status'
    ];


}

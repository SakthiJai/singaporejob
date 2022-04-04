<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CRRetailAccountDetails extends Model
{
   
    protected $table = 'cir_retail_account_details';
    protected $primaryKey = 'cir_account_id';

    
    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'cir_account_id', 'report_id', 'seq', 'account_number', 'institution', 'account_type', 'ownership_type', 'balance', 'last_payment', 'open', 'sanction_amount', 'last_payment_date', 'date_reported', 'repayment_tenure', 'installment_amount', 'term_frequency', 'account_status', 'source', 'credit_limit'
    ];

    public function History48Months()
    {
        return $this->hasMany(CRHistory48Months::class,'cir_account_id');
    }

    public function Counselling()
    {
        return $this->hasMany(CounsellingChats::class,'cir_account_id');
    }

    

    
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CRRetailAccountsSummary extends Model
{
   
    protected $table = 'cir_retail_accounts_summary';
    protected $primaryKey = 'summary_id';

    
    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'summary_id', 'report_id', 'no_of_accounts', 'no_of_active_accounts', 'no_of_write_offs', 'TotalPastDue', 'SingleHighestCredit', 'SingleHighestSanctionAmount', 'TotalHighCredit', 'AverageOpenBalance', 'SingleHighestBalance', 'NoOfPastDueAccounts', 'NoOfZeroBalanceAccounts', 'RecentAccount', 'OldestAccount', 'TotalBalanceAmount', 'TotalSanctionAmount', 'TotalCreditLimit', 'TotalMonthlyPaymentAmount'
    ];


}

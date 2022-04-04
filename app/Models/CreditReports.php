<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CreditReports extends Model
{
   
    protected $table = 'credit_reports';
    protected $primaryKey = 'report_id';

    
    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'report_id', 'user_id', 'generated_at', 'credit_score', 'open_accounts', 'issue_based_accounts', 'closed_accounts', 'total_accounts', 'json_response', 'report_order_number', 'client_id', 'score_type', 'score_version', 'inquiry_request_info', 'inquiry_purpose'
    ];

    protected $hidden = ['json_response','inquiry_request_info'];

    public function getCreditScoreAttribute($value)
    {
        $data = CRScoreDetails::where('report_id',$this->report_id)->first();
        CreditReports::where('report_id',$this->report_id)->update(array('credit_score'=>$data->Value));
        return $data->Value;
    }

    public function getScoreTypeAttribute($value)
    {
        $data = CRScoreDetails::where('report_id',$this->report_id)->first();
        CreditReports::where('report_id',$this->report_id)->update(array('score_type'=>$data->Type));
        return $data->Type;
    }

    public function getScoreVersionAttribute($value)
    {
        $data = CRScoreDetails::where('report_id',$this->report_id)->first();
        CreditReports::where('report_id',$this->report_id)->update(array('score_version'=>$data->Version));
        return $data->Version;
    }

    /*public function getOpenAccountsAttribute($value)
    {
        return CRRetailAccountDetails::where('report_id',$this->report_id)->where('open','Yes')->count(); 
    }

    public function getClosedAccountsAttribute($value)
    {
        return CRRetailAccountDetails::where('report_id',$this->report_id)->where('open','No')->count();  
    }*/

    public function getTotalAccountsAttribute($value)
    {
        return CRRetailAccountDetails::where('report_id',$this->report_id)->count();  
    }

   
    public function AddressInfo()
    {
        return $this->hasMany(CRAddressInfo::class,'report_id');
    }

    public function PhoneInfo()
    {
        return $this->hasMany(CRPhoneInfo::class,'report_id');
    }

    public function EmailInfo()
    {
        return $this->hasMany(CREmailInfo::class,'report_id');
    }

    public function PersonalInfo()
    {
        return $this->hasOne(CRPersonalInfo::class,'report_id');
    }
    public function IdentityInfo()
    {
        return $this->hasMany(CRIdentityInfo::class,'report_id');
    }

    public function MainRetailAccountDetails()
    {
        return $this->hasMany(CRRetailAccountDetails::class,'report_id');
       
    }

    public function RetailAccountDetails()
    {
        return $this->MainRetailAccountDetails()->with('History48Months');
    }

    public function OpenAccountList()
    {
        return $this->MainRetailAccountDetails()->with('History48Months')->where('open','Yes');
    }

    public function CloseAccountList()
    {
        return $this->MainRetailAccountDetails()->with('History48Months')->where('open','No');
    }

    public function IssueBasedAccountList()
    {
        //return array();
       return $this->MainRetailAccountDetails()->with('History48Months')->where('open','Issue');
    }

    public function RetailAccountsSummary()
    {
        return $this->hasOne(CRRetailAccountsSummary::class,'report_id');
    }
    public function DimensionalVariable()
    {
        return $this->hasOne(CRDimensionalVariable::class,'report_id');
    }

    public function RecentActivities()
    {
        return $this->hasOne(CRRecentActivities::class,'report_id');
    }

    public function EnquirySummary()
    {
        return $this->hasOne(CREnquirySummary::class,'report_id');
    }

    public function mainScoreDetails()
    {
        return $this->hasMany(CRScoreDetails::class,'report_id');
    }

    public function ScoreDetails()
    {
        return $this->mainScoreDetails()->with('ScoringElements');
    }

    public function OtherKeyInd()
    {
        return $this->hasOne(CROtherKeyInd::class,'report_id');
    }


}

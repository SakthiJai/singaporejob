<?php
/**
 * Created by RDA.
 * User: Boopathi
 * Date: 9-7-19
 * 
 */

namespace App\Data;
use App\Models\CRDimensionalVariable;
use App\Models\CreditReports;
use App\Models\CREnquirySummary;
use App\Models\CRAddressInfo;
use App\Models\CREmailInfo;
use App\Models\CRHistory48Months;
use App\Models\CRIdentityInfo;
use App\Models\CROtherKeyInd;
use App\Models\CRPersonalInfo;
use App\Models\CRPhoneInfo;
use App\Models\CRRecentActivities;
use App\Models\CRRetailAccountDetails;
use App\Models\CRRetailAccountsSummary;
use App\Models\CRScoreDetails;
use App\Models\CRScoringElements;


class CRReportRepository
{
    
    public function __construct(){}

    public function isNull(&$object) {
        return (null !== $object) ? $object : '';
    }
     /* Save Main Reports Details */
     public function SaveReportinfo($data){
        return CreditReports::create($data);
    }

     /* Save Main Reports Update Details */
     public function UpdateReportinfo($report_id,$data){
        return CreditReports::where('report_id',$report_id)->update($data);
    }
    
    /* Save Personal Details */
    public function SavePersonalInfo($report_id,$data){
        CRPersonalInfo::create([
            'report_id'=>$report_id,'full_name'=>$this->isNull($data->Name->FullName),'first_name'=>$this->isNull($data->Name->FirstName),
            'last_name'=>$this->isNull($data->Name->LastName),'date_of_birth'=>$this->isNull($data->DateOfBirth),'gender'=>$this->isNull($data->Gender),
            'age'=>$this->isNull($data->Age->Age),'total_income'=>$this->isNull($data->TotalIncome),'occupation'=>$this->isNull($data->Occupation)
        ]);
       
    }
    /* Save ID Info Details */
    public function SaveIdInfo($report_id,$data){
        
        foreach($data as $key =>  $val){
            $value=$data->{$key};
            foreach($value as $val1){
                $check=CRIdentityInfo::where('report_id',$report_id)->where('type_of_document',$key)
                ->where('id_number',$val1->IdNumber)->first();
                if(!$check){
                    CRIdentityInfo::create(['report_id'=>$report_id, 'type_of_document'=>$key, 
                    'id_number'=>$val1->IdNumber, 'reported_date'=>$val1->ReportedDate]);
                }
            }
        }
       
    }
    /* Save Address Details */
    public function SaveAddressInfo($report_id,$data){
        foreach($data as $val){
            CRAddressInfo::create(['report_id'=>$report_id,'seq'=>$this->isNull($val->Seq),'reported_date'=>$this->isNull($val->ReportedDate),
            'address'=>$this->isNull($val->Address),'state'=>$this->isNull($val->State),'postal'=>$this->isNull($val->Postal),'type'=>$this->isNull($val->Type)]);
        }
       
    }
    /* Save Phone Details */
    public function SavePhoneInfo($report_id,$data){
        foreach($data as $val){
            CRPhoneInfo::create(['report_id'=>$report_id,'seq'=>$this->isNull($val->seq),'type_code'=>$this->isNull($val->typeCode),
            'report_date'=>$this->isNull($val->ReportedDate),'number'=>$this->isNull($val->Number)]);
        }
       
    }
     /* Save Email Address Details */
     public function SaveEmailInfo($report_id,$data){
        foreach($data as $val){
            CREmailInfo::create(['report_id'=>$report_id,'seq'=>$this->isNull($val->seq),'report_date'=>$this->isNull($val->ReportedDate),
            'emai_address'=>$this->isNull($val->EmailAddress)]);
        }
       
    }

    /* Save RetailAccountsSummary Details */
    public function SaveRetailAccountsSummary($report_id,$data){
        //print_r($data);exit;
        CRRetailAccountsSummary::create(['report_id'=>$report_id, 'no_of_accounts'=>$this->isNull($data->NoOfAccounts), 'no_of_active_accounts'=>$this->isNull($data->NoOfActiveAccounts), 
        'no_of_write_offs'=>$this->isNull($data->NoOfWriteOffs), 'TotalPastDue'=>$this->isNull($data->TotalPastDue), 'SingleHighestCredit'=>$this->isNull($data->SingleHighestCredit), 
        'SingleHighestSanctionAmount'=>$this->isNull($data->SingleHighestSanctionAmount), 'TotalHighCredit'=>$this->isNull($data->TotalHighCredit), 'AverageOpenBalance'=>$this->isNull($data->AverageOpenBalance), 
        'SingleHighestBalance'=>$this->isNull($data->SingleHighestBalance), 'NoOfPastDueAccounts'=>$this->isNull($data->NoOfPastDueAccounts), 'NoOfZeroBalanceAccounts'=>$this->isNull($data->NoOfZeroBalanceAccounts), 
        'RecentAccount'=>$this->isNull($data->RecentAccount), 'OldestAccount'=>$this->isNull($data->OldestAccount), 'TotalBalanceAmount'=>$this->isNull($data->TotalBalanceAmount), 
        'TotalSanctionAmount'=>$this->isNull($data->TotalSanctionAmount), 'TotalCreditLimit'=>$this->isNull($data->TotalCreditLimit), 'TotalMonthlyPaymentAmount'=>$this->isNull($data->TotalMonthlyPaymentAmount)]);
        
    }

     /* Save EnquirySummary Details */
     public function SaveEnquirySummary($report_id,$data){
        CREnquirySummary::create(['report_id'=>$report_id, 'Purpose'=>$this->isNull($data->Purpose), 'Total'=>$this->isNull($data->Total), 
        'Past30Days'=>$this->isNull($data->Past30Days), 'Past12Months'=>$this->isNull($data->Past12Months), 'Past24Months'=>$this->isNull($data->Past24Months), 'Recent'=>$this->isNull($data->Recent)]);
        
    }

    /* Save OtherKeyInd Details */
    public function SaveOtherKeyInd($report_id,$data){
        CROtherKeyInd::create(['report_id'=>$report_id, 'AgeOfOldestTrade'=>$this->isNull($data->AgeOfOldestTrade), 'NumberOfOpenTrades'=>$this->isNull($data->NumberOfOpenTrades),
         'AllLinesEVERWritten'=>$this->isNull($data->AllLinesEVERWritten), 'AllLinesEVERWrittenIn9Months'=>$this->isNull($data->AllLinesEVERWrittenIn9Months), 'AllLinesEVERWrittenIn6Months'=>$this->isNull($data->AllLinesEVERWrittenIn6Months)]);
       
    }

    /* Save RecentActivities Details */
    public function SaveRecentActivities($report_id,$data){
        CRRecentActivities::create(['report_id'=>$report_id,'AccountsDeliquent'=>$this->isNull($data->AccountsDeliquent), 'AccountsOpened'=>$this->isNull($data->AccountsOpened), 
        'TotalInquiries'=>$this->isNull($data->TotalInquiries), 'AccountsUpdated'=>$this->isNull($data->AccountsUpdated)]);
       
    }

     /* Save DimensionalVariables Details */
     public function SaveDimensionalVariables($report_id,$data){
        CRDimensionalVariable::create(['report_id'=>$report_id,'TDA_MESMI_CC_PSDAMT_24'=>$this->isNull($data->TDA_MESMI_CC_PSDAMT_24), 'TDA_MESME_INS_PSDAMT_24'=>$this->isNull($data->TDA_MESME_INS_PSDAMT_24), 
        'TDA_METSU_CC_PSDAMT_3'=>$this->isNull($data->TDA_METSU_CC_PSDAMT_3), 'TDA_SUM_PF_PSDAMT_3'=>$this->isNull($data->TDA_SUM_PF_PSDAMT_3)]);
        
    }

    /* Save RetailAccountDetails Details */
    public function SaveRetailAccountDetails($report_id,$data){
        return CRRetailAccountDetails::create(['report_id'=>$report_id,'seq'=>$this->isNull($data->seq), 'account_number'=>$this->isNull($data->AccountNumber), 'institution'=>$this->isNull($data->Institution), 
        'account_type'=>$this->isNull($data->AccountType), 'ownership_type'=>$this->isNull($data->OwnershipType), 'balance'=>$this->isNull($data->Balance), 
        'last_payment'=>$this->isNull($data->LastPayment), 'open'=>$this->isNull($data->Open), 'sanction_amount'=>$this->isNull($data->SanctionAmount), 
        'last_payment_date'=>$this->isNull($data->LastPaymentDate), 'date_reported'=>$this->isNull($data->DateReported), 'repayment_tenure'=>$this->isNull($data->RepaymentTenure), 
        'installment_amount'=>$this->isNull($data->InstallmentAmount), 'term_frequency'=>$this->isNull($data->TermFrequency), 'account_status'=>$this->isNull($data->AccountStatus), 
        'source'=>$this->isNull($data->source), 'credit_limit'=>$this->isNull($data->CreditLimit),'data_opened'=>$this->isNull($data->DateOpened),'CollateralValue'=>$this->isNull($data->CollateralValue), 
        'CollateralType'=>$this->isNull($data->CollateralType), 'AssetClassification'=>$this->isNull($data->AssetClassification)]);
    }

    /* Save History48Months Details */
    public function SaveHistory48Months($account_id,$data){
        CRHistory48Months::create(['cir_account_id'=>$account_id, 'key'=>$this->isNull($data->key), 'payment_status'=>$this->isNull($data->PaymentStatus), 
        'suit_filed_status'=>$this->isNull($data->SuitFiledStatus), 'asset_classification_status'=>$this->isNull($data->AssetClassificationStatus)]);
    }

     /* Save ScoreDetails Details */
     public function SaveScoreDetails($report_id,$data){
        return CRScoreDetails::create(['report_id'=>$report_id, 'Type'=>$this->isNull($data->Type), 'Version'=>$this->isNull($data->Version),
         'Name'=>$this->isNull($data->Name), 'Value'=>$this->isNull($data->Value)]);
    }

    /* Save ScoringElements Details */
    public function SaveScoringElements($score_id,$data){
        CRScoringElements::create(['cir_score_id'=>$score_id, 'type'=>$this->isNull($data->type), 'seq'=>$this->isNull($data->seq), 'Description'=>$this->isNull($data->Description)]);
    }

     /* Save Main Reports Update Details */
     public function GetReports($user_id){
        return CreditReports::with('PersonalInfo','IdentityInfo','AddressInfo','PhoneInfo','EmailInfo','OpenAccountList','CloseAccountList','IssueBasedAccountList',
        'RetailAccountsSummary','ScoreDetails','RecentActivities','EnquirySummary','OtherKeyInd','DimensionalVariable')->
        where('user_id',$user_id)->get();
    }

    /* Save Main Reports Update Details */
    public function GetCurrentReports($user_id){
        
        $issues=['1-29 days past due','30-59 days past due','90-119 days past due','120-179 days past due'];

        $reports= CreditReports::with('PersonalInfo','IdentityInfo','AddressInfo','PhoneInfo','EmailInfo','RetailAccountDetails',
        'RetailAccountsSummary','ScoreDetails','RecentActivities','EnquirySummary','OtherKeyInd','DimensionalVariable')->
        where('user_id',$user_id)->orderBy('report_id', 'DESC')->first();

        $IssuesAccounts=(object)array();
        $issuescount=0;$opencount=0;$closecount=0;
        $i=0;$j=0;$k=0;$n=0;$m=0;$l=0;$a=0;$b=0;$c=0;
        $CloseAccounts=(object)array();$OpenAccounts=(object)array();
        foreach($reports->RetailAccountDetails as $retails){
            if(in_array($retails->account_status,$issues)){
                $issuescount=$issuescount + 1;
                
                if (strpos($retails->account_type, 'Loan') !== false) {
                    $IssuesAccounts->loan[$n]=$retails;
                    $n++;
                }
                else if(strpos($retails->account_type, 'Card') !== false){
                    $IssuesAccounts->card[$i]=$retails;
                    $i++;
                }
                else{
                    $IssuesAccounts->others[$a]=$retails;
                    $a++;
                }
                
            }else{
                
                if(strtotime($retails->DateOpened) > strtotime(now())){
                    $opencount=$opencount + 1; 
                if (strpos($retails->account_type, 'Loan') !== false) {
                    $OpenAccounts->loan[$m]=$retails;
                    $m++;
                }
                else if(strpos($retails->account_type, 'Card') !== false){
                    $OpenAccounts->card[$j]=$retails;
                    $j++;
                }

                else{
                    $OpenAccounts->others[$b]=$retails;
                    $b++;
                }
                   
             
                }else{
                  
                    $closecount=$closecount + 1; 
                    if (strpos($retails->account_type, 'Loan') !== false) {
                        $CloseAccounts->loan[$l]=$retails;
                        $l++;
                    }
                    else if(strpos($retails->account_type, 'Card') !== false){
                        $CloseAccounts->card[$k]=$retails;
                        $k++;
                    }
                    else{
                        $CloseAccounts->card[$c]=$retails;
                        $c++;
                    }
                  
                }
            }
        }
        
        
        $reports->open_accounts=$opencount;
        $reports->issue_based_accounts=$issuescount;
        $reports->closed_accounts=$closecount;

        $reports->closed_account_list = $CloseAccounts;
        $reports->issue_based_account_list = $IssuesAccounts;
        $reports->open_account_list = $OpenAccounts;
        return $reports;

    }
    
    
}
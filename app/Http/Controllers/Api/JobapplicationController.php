<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ChatMessages as Message;
use App\Models\Jobapplication;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
class JobapplicationController extends Controller
//use Illuminate\Support\Facades\Validator;

{
     public function __construct()
    {

    }

    
    public function addcategory(Request $request){
		$insert=Category::create([
            'cat_name' =>$request->category,
            'status'=>'1']);
        if($insert){
            
               return response()->json(['result' =>'Success']);
        }else{
               
              return response()->json(['result'=>'failed']);
        }
    }
     public function getjobapplicationlist(Request $request)
    {
		  $sql="SELECT A.job_app_id,concat(A.first_name,' ',A.last_name) as name,A.dob,A.mother_name,A.email_id,A.mobile_number,A.maritial_status,B.appl_certificate_id,B.passport_no,
		  B.skilled_labour,A.application_status,A.yoe,(case when (B.qualification = 1) then 'Diploma'
                when (B.qualification = 2) then 'Bachelor Degree'
                when (B.qualification = 3) then 'Master Degree'
             end)as qualification,
		  B.resume,B.pervious_certficate,B.singapore_experience_details,B.certifcate_10th,B.certficate_12th,B.bachelors_degree,B.diploma_certificate,B.bacholer_degree_certificate,
		  B.mater_degree_certificate,B.mark_sheet,B.mark_sheet,B.skilled_certificate
    FROM job_application A
	left join jop_application_certificate B ON B.job_app_id = A.job_app_id
     order by A.added_at DESC";
		 $categoryList = DB::select($sql);
        
        return response()->json($categoryList);
    }
    public function editcategoryList(Request $request)
    {
        $petList = Category::where('id',$request->id)->first();
        return response()->json($petList);
    }
    public function updatecategoryList(Request $request){
         
         $id=$request->id;
         $data=array(
            'name' => $request->category
         );

        $update=  Category::where('id',$id)->update($data);
        if($update){
            
               return response()->json(['result' =>'Success']);
        }else{
               
              return response()->json(['result'=>'failed']);
        }
    }
   public function deletecatgeroy(Request $request){
         
        $id=$request->id;
        $delete= Category::where('cat_id',$id)->delete();
        if($delete){
            
               return response()->json('Success');
        }else{
               
              return response()->json('failed');
        }
    }
	public function categoryStatus(Request $request){
         
         $id=$request->id;
         $status=$request->status;
        
         if($status==1){
            $active=2;
         }elseif($status==2){
             $active=1;
         }
         $data=array(
            'status' =>($request->status==1?2:1)
         );
        $update=Category::where('cat_id',$id)->update($data);
        if($update){
           
               return response()->json(['result' =>'true']);
        }else{
               
              return response()->json(['result'=>'false']);
        }
    }
        

}

<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ChatMessages as Message;
use App\Models\JobType;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
class JobtypeController extends Controller
{
     public function __construct()
    {

    }

    
    public function addJobtype(Request $request){
         //print_r($request);exit();
        
         $insert=JobType::create([
            'job_tittle' =>$request->job_title,
			'job_sectors' =>$request->job_sectors,
			'sub_category' =>$request->sub_Category,
			'job_category' =>$request->job_Category,
			'job_experience' =>$request->job_experience,
			'serivce_charge' =>$request->service_charge,
			'requried_skills' =>$request->required_skills,
			'description' =>$request->description,
            'status'=>'1']);
        if($insert){
            
               return response()->json(['result' =>'Success']);
        }else{
               
              return response()->json(['result'=>'failed']);
        }
    }
	public function getcategorylist(Request $request)
    {
        $sql="SELECT *
			from category";
	  $productList = DB::select($sql);
        return response()->json($productList);
		
    }
     public function getsectors(Request $request)
    {
		 $sql="SELECT * FROM `sectors`";		
		 $warehouseList = DB::select($sql);
        return response()->json($warehouseList);
    }
	public function getsubcategory(Request $request)
    {
		 $sql="SELECT * FROM `sub_category`";		
		 $warehouseList = DB::select($sql);
        return response()->json($warehouseList);
    }
	public function getexperience(Request $request)
    {
		 $sql="SELECT * FROM `experiencerange`";		
		 $warehouseList = DB::select($sql);
        return response()->json($warehouseList);
    }
	public function getjoblist(Request $request)
    {
		 $sql="SELECT A.job_id,A.job_tittle,A.ref_image,A.job_sectors,A.job_category,A.sub_category,A.job_experience,A.serivce_charge,A.description,A.status,B.cat_name,C.sectors_name,D.sub_cat_name
		 FROM job_list A
		 left join category B on B.cat_id  = A.	job_category
		 LEFT JOIN sectors C on C.sectors_id =A.job_sectors
		 LEFT JOIN sub_category D on D.sub_cat_id = A.sub_category
		order by A.added_at desc";		
		 $warehouseList = DB::select($sql);
        return response()->json($warehouseList);
    }
    public function editwarehouseList(Request $request)
    {
        $warehouseList = Warehouse::where('id',$request->id)->first();
        return response()->json($warehouseList);
    }
    public function updatewarehouseList(Request $request){
         
         $id=$request->id;
         $data=array(
            'name' => $request->warehouse
         );

        $update=  Warehouse::where('id',$id)->update($data);
        if($update){
            
               return response()->json(['result' =>'Success']);
        }else{
               
              return response()->json(['result'=>'failed']);
        }
    }
    public function deletewarehouse(Request $request){
         
         $id=$request->id;
		$data=array(
            'active' =>3
         );
        $delete= Warehouse::where('id',$id)->update($data);
        if($delete){
            
               return response()->json('Success');
        }else{
               
              return response()->json('failed');
        }
    }
     public function jobtypeStatus(Request $request){
         
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
        $update=JobType::where('job_id',$id)->update($data);
        if($update){
           
               return response()->json(['result' =>'true']);
        }else{
               
              return response()->json(['result'=>'false']);
        }
    }   

}

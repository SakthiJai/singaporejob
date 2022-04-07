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
			'job_sectors' =>$request->job_Sectors,
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
			from category
			ORDER BY added_at desc";
	  $productList = DB::select($sql);
        return response()->json($productList);
		
    }
     public function getsectors(Request $request)
    {
		 $sql="SELECT * FROM `sectors`	 
			order by added_at desc";		
		 $warehouseList = DB::select($sql);
        return response()->json($warehouseList);
    }
	public function getjoblist(Request $request)
    {
		 $sql="SELECT A.job_id,A.job_title,A.ref_image,A.sector_id,A.category_id,A.sub_category_id,A.experience,A.amount,A.description,A.status,B.cat_name,C.sectors_name,D.sub_cat_name
		 FROM job_list A
		 left join category B on B.cat_id  = A.	category_id
		 LEFT JOIN sectors C on C.sectors_id =A.sector_id
		 LEFT JOIN sub_category D on D.sub_cat_id = A.sub_category_id
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
     public function warehousestatus(Request $request){
         
         $id=$request->id;
         $status=$request->status;
        
         if($status==1){
            $active=2;
         }elseif($status==2){
             $active=1;
         }
         $data=array(
            'active' =>($request->status==1?2:1)
         );
        $update=Warehouse::where('id',$id)->update($data);
        if($update){
           
               return response()->json(['result' =>'true']);
        }else{
               
              return response()->json(['result'=>'false']);
        }
    }   

}

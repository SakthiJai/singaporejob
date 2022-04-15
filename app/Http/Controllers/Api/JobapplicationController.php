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
		  $sql="SELECT * 
    FROM `job_application`
     order by added_at DESC";
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

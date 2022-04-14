<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ChatMessages as Message;
use App\Models\Experience;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class ExperienceController extends Controller
{
     public function __construct()
    {

    }

    
    public function addexperience(Request $request){
         //print_r($request);exit();
        
         $insert=Experience::create([
            'exp_range' =>$request->experience_range,
            'status'=>'1']);
        if($insert){
            
               return response()->json(['result' =>'Success']);
        }else{
               
              return response()->json(['result'=>'failed']);
        }
    }
     public function getexperiencelist(Request $request)
    {
		 $sql="SELECT * FROM `experiencerange`
		 where status !=3
		ORDER BY added_at DESC";
		
		$itemsList = DB::select($sql);
        return response()->json($itemsList);
    }
    public function edititemsList(Request $request)
    {
        $itemsList = Items::where('id',$request->id)->first();
        return response()->json($itemsList);
    }
    public function updateitemsList(Request $request){
         
         $id=$request->id;
         $data=array(
            'name' => $request->items
         );

        $update=  Items::where('id',$id)->update($data);
        if($update){
            
               return response()->json(['result' =>'Success']);
        }else{
               
              return response()->json(['result'=>'failed']);
        }
    }
    public function deleteexperience(Request $request){
         
         $id=$request->id;
        $delete= Experience::where('exp_id',$id)->delete();
        if($delete){
            
               return response()->json('Success');
        }else{
               
              return response()->json('failed');
        }
    }
	 public function experienceStatus(Request $request){
         
         $id=$request->id;
         $status=$request->status;
        
         if($status==1){
            $active=2;
         }
         elseif($status==2){
             $active=1;
         }
         $data=array(
            'status' =>($request->status==1?2:1)
         );
        $update=Experience::where('exp_id',$id)->update($data);
       
        if($update){
           
               return response()->json(['result' =>'True']);
        }else{
               
              return response()->json(['result'=>'False']);
        }
    }
	
	
        

}

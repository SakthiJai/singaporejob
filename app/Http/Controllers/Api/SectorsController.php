<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ChatMessages as Message;
use App\Models\Sectors;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
class SectorsController extends Controller

//use Illuminate\Support\Facades\Validator;

{
     public function __construct()
    {

    }

    
    public function addsectors(Request $request){
		$insert=Sectors::create([
            'sectors_name' =>$request->sectors,
            'status'=>'1']);
        if($insert){
            
               return response()->json(['result' =>'Success']);
        }else{
               
              return response()->json(['result'=>'failed']);
        }
    }
     public function getsectorslist(Request $request)
    {
		  $sql="SELECT * 
			FROM `sectors`
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
    public function deletesectors(Request $request){
		$id=$request->sectors_id;
        $delete= Sectors::where('sectors_id',$id)->delete();
        if($delete){
            
               return response()->json('Success');
        }else{
               
              return response()->json('failed');
        }
    }
	public function sectorsStatus(Request $request){
         
         $id=$request->id;
         $status=$request->status;
        
         if($status==1){
            $active=2;
         }else if($status==2){
             $active=1;
         }
         $data=array(
            'status' =>($request->status==1?2:1)
         );
        $update=Sectors::where('sectors_id',$id)->update($data);
        if($update){
           
               return response()->json(['result' =>'true']);
        }else{
               
              return response()->json(['result'=>'false']);
        }
    }
        

}

<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ChatMessages as Message;
use App\Models\Category;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
class CategoryController extends Controller

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
     public function getcategoryList(Request $request)
    {
		  $sql="SELECT * 
    FROM `categories`
	where active !=3
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
         
        $id=$request->cat_id;
        $delete= Category::where('cat_id',$id)->delete($data);
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

<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ChatMessages as Message;
use App\Models\Subcategory;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
class SubcategoryController extends Controller

//use Illuminate\Support\Facades\Validator;

{
     public function __construct()
    {

    }

    
    public function addSubcategory(Request $request){
		$insert=Subcategory::create([
            'cat_id' =>$request->category,
			'sub_cat_name' =>$request->sub_category,
			'is_certificate' =>$request->certificate,
			'certficate' =>$request->certificate_name,
            'status'=>'1']);
        if($insert){
            
               return response()->json(['result' =>'Success']);
        }else{
               
              return response()->json(['result'=>'failed']);
        }
    }
     public function getcategoryname(Request $request)
    {
		  $sql="SELECT * 
			FROM category
			order by added_at DESC";
		 $categoryList = DB::select($sql);
        
        return response()->json($categoryList);
    }
	public function getsubcategorylist(Request $request)
    {
		  $sql="SELECT B.cat_name,A.sub_cat_id ,A.cat_id,A.sub_cat_name,A.is_certificate,A.certficate,A.status
			FROM sub_category A
			left join category B ON B.cat_id   = A.cat_id
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
    public function deletecategory(Request $request){
         
         $id=$request->id;
		$data=array(
            'active' =>3
         );

        $delete= Category::where('id',$id)->update($data);
        if($delete){
            
               return response()->json('Success');
        }else{
               
              return response()->json('failed');
        }
    }
	public function subcategoryStatus(Request $request){
         
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
        $update=Subcategory::where('sub_cat_id',$id)->update($data);
        if($update){
           
               return response()->json(['result' =>'true']);
        }else{
               
              return response()->json(['result'=>'false']);
        }
    }
        

}

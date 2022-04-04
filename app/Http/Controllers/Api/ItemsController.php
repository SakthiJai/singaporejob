<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ChatMessages as Message;
use App\Models\Items;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class ItemsController extends Controller
{
     public function __construct()
    {

    }

    
    public function additems(Request $request){
         //print_r($request);exit();
        
         $insert=Items::create([
            'name' =>$request->items,
            'active'=>'1']);
        if($insert){
            
               return response()->json(['result' =>'Success']);
        }else{
               
              return response()->json(['result'=>'failed']);
        }
    }
     public function getitemsList(Request $request)
    {
		 $sql="SELECT * FROM `brands`
		 where active !=3
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
    public function deleteitems(Request $request){
         
         $id=$request->id;
		$data=array(
            'active' =>3
         );
        $delete= Items::where('id',$id)->update($data);
        if($delete){
            
               return response()->json('Success');
        }else{
               
              return response()->json('failed');
        }
    }
	 public function itemsStatus(Request $request){
         
         $id=$request->id;
         $status=$request->status;
        
         if($status==1){
            $active=2;
         }
         elseif($status==2){
             $active=1;
         }
         $data=array(
            'active' =>($request->status==1?2:1)
         );
        $update=Items::where('id',$id)->update($data);
       
        if($update){
           
               return response()->json(['result' =>'True']);
        }else{
               
              return response()->json(['result'=>'False']);
        }
    }
	
	
        

}

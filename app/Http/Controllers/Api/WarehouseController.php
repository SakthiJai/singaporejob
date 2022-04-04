<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ChatMessages as Message;
use App\Models\Warehouse;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
class WarehouseController extends Controller
{
     public function __construct()
    {

    }

    
    public function addwarehouse(Request $request){
         //print_r($request);exit();
        
         $insert=Warehouse::create([
            'name' =>$request->warehouse,
            'active'=>'1']);
        if($insert){
            
               return response()->json(['result' =>'Success']);
        }else{
               
              return response()->json(['result'=>'failed']);
        }
    }
     public function getwarehouseList(Request $request)
    {
		 $sql="SELECT * FROM `stores`
where active !=3		 
   order by added_at desc";
		
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

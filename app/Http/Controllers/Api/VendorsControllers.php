<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ChatMessages as Message;
use App\Models\Vendors;
use Illuminate\Support\Facades\DB;
use App\Models\Permission;

use Illuminate\Support\Facades\Validator;

class VendorsControllers extends Controller
{
     public function __construct()
    {

    }
    public function addvendors(Request $request){
         $insert=Vendors::create([
            'vendors_name' =>$request->vendors_name,
			'address' =>$request->vendors_address,
			'sales_date' =>$request->sales_date,
			'sales_value' =>$request->sales_value,
			'invoice_no' =>$request->invoice_no,
			'invoice_date' =>$request->invoice_date,
			'due_date' =>$request->due_date,
			'active'=>1]);
        if($insert){
            
               return response()->json(['result' =>'Success']);
        }else{
               
              return response()->json(['result'=>'failed']);
        }
    }
     public function getvendorsList(Request $request)
    {
		 $sql="select *
				from vendors
				where active !=3
				order by added_at DESC;";
				$usersList = DB::select($sql);
        return response()->json($usersList);
    }
    public function editvendorsList(Request $request)
    {
        $useeList = Vendors::where('id',$request->id)->first();
        return response()->json($useeList);
    }
    public function updatevendors(Request $request){
         
         $id=$request->id;
         $data=array(
			'vendors_name' =>$request->vendors_name,
			'address' =>$request->vendors_address,
			'sales_date' =>$request->sales_date,
			'sales_value' =>$request->sales_value,
			'invoice_no' =>$request->invoice_no,
			'invoice_date' =>$request->invoice_date,
			'due_date' =>$request->due_date
         );

        $update=  Vendors::where('id',$id)->update($data);
        if($update){
            
               return response()->json(['result' =>'Success']);
        }else{
               
              return response()->json(['result'=>'failed']);
        }
    }
    public function deletevendors(Request $request){
         
         $id=$request->id;
		$data=array(
            'active' =>3
         );
        $delete= Vendors::where('id',$id)->update($data);
        if($delete){
            
               return response()->json('Success');
        }else{
               
              return response()->json('failed');
        }
    }
	public function getroleslist(Request $request)
    {
        $rolesList = Permission::where('active','=','1')->get();
        return response()->json($rolesList);
    }
        

}

<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ChatMessages as Message;
use App\Models\Elements;
use App\Models\AddElementsValue;
use Illuminate\Support\Facades\DB;


use Illuminate\Support\Facades\Validator;

class ElementsControllers extends Controller
{
     public function __construct()
    {

    }

    
    public function addelements(Request $request){
         //print_r($request);exit();
        
         $insert=Elements::create([
            'name' =>$request->elements_name]);
        if($insert){
            
               return response()->json(['result' =>'Success']);
        }else{
               
              return response()->json(['result'=>'failed']);
        }
    }
     public function getelementsList(Request $request)
    {
       $sql="SELECT * 
    FROM `attributes`
	where active !=3
     order by added_at DESC";
		 $elementsList = DB::select($sql);
        return response()->json($elementsList);
    }
    public function editelementsList(Request $request)
    {
        $elementsList = Elements::where('id',$request->id)->first();
        return response()->json($elementsList);
    }
    public function updatelementsList(Request $request){
         
         $id=$request->id;
         $data=array(
            'name' =>$request->elements_name
         );

        $update=  Elements::where('id',$id)->update($data);
        if($update){
            
               return response()->json(['result' =>'Success']);
        }else{
               
              return response()->json(['result'=>'failed']);
        }
    }
    public function deleteelements(Request $request){
         
         $id=$request->id;
		$data=array(
            'active' =>3
         );
        $delete= Elements::where('id',$id)->update($data);
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
	public function getelementsvalueList(Request $request)
    {
        
		$sql = "select A.id,A.name,B.id,B.value,B.attribute_parent_id,B.added_at
				from attributes A
				left join attribute_value B on B.attribute_parent_id = A.id
				where B.active !=3
				order by added_at DESC";
				$rolesList = DB::select($sql);
        return response()->json($rolesList);
    }
	public function getelementsnamelist(Request $request)
    {
        //$elementsList = Elements::all();
				$sql="SELECT * 
					FROM `attributes`
					where active !=3
					order by added_at DESC";
		 $elementsList = DB::select($sql);
        return response()->json($elementsList);
    }
	public function addelementsvalue(Request $request){
         //print_r($request);exit();
        
         $insert=AddElementsValue::create([
            'attribute_parent_id' =>$request->elementsname,
			'value' =>$request->elements_value]);
        if($insert){
            
               return response()->json(['result' =>'Success']);
        }else{
               
              return response()->json(['result'=>'failed']);
        }
    }
	public function editaddvalueList(Request $request)
    {
        //$elementsList = AddElementsValue::where('id',$request->id)->first();
		$sql="SELECT A.id,A.value,A.attribute_parent_id,B.name
					FROM attribute_value A
					inner join attributes B on B.id = A.attribute_parent_id
					where A.id = '".$request->id."' and A.active!=3
					order by A.added_at DESC";
		 $editvalueList = DB::select($sql);
        return response()->json($editvalueList[0]);
    }
	public function updatelementsvalue(Request $request){
         
         $id=$request->id;
         $data=array(
			'value' =>$request->elements_value
         );

        $update=  AddElementsValue::where('id',$id)->update($data);
        if($update){
            
               return response()->json(['result' =>'Success']);
        }else{
               
              return response()->json(['result'=>'failed']);
        }
    }
	public function deleteelementsvalueList(Request $request){
         
         $id=$request->id;
		$data=array(
            'active' =>3
         );
        $delete= AddElementsValue::where('id',$id)->update($data);
        if($delete){
            
               return response()->json('Success');
        }else{
               
              return response()->json('failed');
        }
    }
	public function elementsstatus(Request $request){
         
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
        $update=Elements::where('id',$id)->update($data);
        if($update){
           
               return response()->json(['result' =>'true']);
        }else{
               
              return response()->json(['result'=>'false']);
        }
    }
        

}

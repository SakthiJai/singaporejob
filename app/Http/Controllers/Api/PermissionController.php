<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ChatMessages as Message;
use App\Models\Permission;
use App\Models\UserAccess;
use App\Models\UsergroupAccess;
use App\Models\Menuname;
use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Validator;

class PermissionController extends Controller
{
     public function __construct()
    {

    }
	public function menulist(Request $request)
	{
		$menu = Menuname::all();
		return view('permission', compact('menu'));
	}
    public function addpermission(Request $request){
		$members = array();
		$permission = array();
		$items = array();
		$category = array();
		$warehouse = array();
		$elements = array();
		$products = array();
		$orders = array();
		$data=array(
            'group_name' =>$request->group_name
         );
			$insert=  Permission::insert([$data]);
			$id = DB::getPdo()->lastInsertId();
					$sql ="select *
					FROM menu_name ";
					$menunameList = DB::select($sql);
					if($menunameList!=""){
							foreach($menunameList as $x => $val) {
								$data=array(
									'menu_id' 	=>$val->id,
									'roles_id' 	=>$id,
									'read' 		=>0,
									'add' 		=>0,
									'update' 	=>0,
									'delete' 	=>0
								);
								$update=  UserAccess::insert($data);
							}
					}
			
        if($insert){
            
               return response()->json(['result' =>'Success']);
        }else{
               
              return response()->json(['result'=>'failed']);
        }
    }
     public function getpermissionList(Request $request)
    {
        $permissionList = Permission::all();
        return response()->json($permissionList);
    }
    public function editpermissionList(Request $request)
    {
        $permissionList = Permission::where('id',$request->id)->first();
        return response()->json($permissionList);
    }
    public function updatepermissionList(Request $request){
        $members = array();
		$permission = array();
		$items = array();
		$category = array();
		$warehouse = array();
		$elements = array();
		$products = array();
		$orders = array();
         $id=$request->permission_id;
         $data=array(
            'group_name' => $request->group_name
         );
        $update=  Permission::where('id',$id)->update($data);
        if($update){
            
               return response()->json(['result' =>'Success']);
        }else{
               
              return response()->json(['result'=>'failed']);
        }
    }
    public function deletepermission(Request $request){
         
         $id=$request->id;

        $delete= Permission::where('id',$id)->delete();
        if($delete){
            
               return response()->json('Success');
        }else{
               
              return response()->json('failed');
        }
    }
	public function permission(Request $request){
		$permissionList = Permission::where('id',$request->id)->first();
        return response()->json($permissionList);
	}
	 public function submitpermissionList(Request $request){
		$users = [];
		$sql = "select *
		from menu_name A
		where A.status =1";
		$menunameList = DB::select($sql);
		$error = null;
		//echo '<pre>';
		foreach($menunameList as $value) {
			//print_r($request[$value->menu_name]);
			if(isset($request[$value->menu_name]) && sizeof($request[$value->menu_name])>0 && $error ==null){
				$updateArray = array('read'=>0,'add'=>0,'update'=>0,'delete'=>0);
				//print_r($request[$value->menu_name]);
				if(isset($request[$value->menu_name][0]))
				{
					if($request[$value->menu_name][0]==1){ $updateArray['read']=1;}
					if($request[$value->menu_name][0]==2){ $updateArray['add']=1;}
					if($request[$value->menu_name][0]==3){ $updateArray['update']=1;}
					if($request[$value->menu_name][0]==4){ $updateArray['delete']=1;}
					
				}
				if(isset($request[$value->menu_name][1]))
				{
					if($request[$value->menu_name][1]==1){ $updateArray['read']=1;}
					if($request[$value->menu_name][1]==2){ $updateArray['add']=1;}
					if($request[$value->menu_name][1]==3){ $updateArray['update']=1;}
					if($request[$value->menu_name][1]==4){ $updateArray['delete']=1;}
				}
				if(isset($request[$value->menu_name][2]))
				{
					if($request[$value->menu_name][2]==1){ $updateArray['read']=1;}
					if($request[$value->menu_name][2]==2){ $updateArray['add']=1;}
					if($request[$value->menu_name][2]==3){ $updateArray['update']=1;}
					if($request[$value->menu_name][2]==4){ $updateArray['delete']=1;}
				}
				if(isset($request[$value->menu_name][3]))
				{
					if($request[$value->menu_name][3]==1){ $updateArray['read']=1;}
					if($request[$value->menu_name][3]==2){ $updateArray['add']=1;}
					if($request[$value->menu_name][3]==3){ $updateArray['update']=1;}
					if($request[$value->menu_name][3]==4){ $updateArray['delete']=1;}
				
				}
				if(!UsergroupAccess::where('roles_id',$request->permissionList_id)->where('menu_id',$value->id)->update($updateArray))
				{
					$error = 500;
				}
			}
		}
        if($error == null){
               return response()->json(['status'=>200,'result' =>'Success']);
        }else{
               
              return response()->json(['status'=>500,'result'=>'failed']);
        }
    
        

}
}

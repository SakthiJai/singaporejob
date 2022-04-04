<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ChatMessages as Message;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use App\Models\Permission;
use Illuminate\Support\Facades\Hash;

use Illuminate\Support\Facades\Validator;

class UsersController extends Controller
{
     public function __construct()
    {

    }

    
    public function addusers(Request $request){
		 $request->password = Hash::make(($request->password));
         $insert=User::create([
            'role_id' =>$request->roles,
			'users_name' =>$request->user_name,
			'first_name' =>$request->first_name,
			'last_name' =>$request->last_name,
			'mobile_number' =>$request->phone_number,
			'email_id' =>$request->email,
			'password' =>$request->password,
			'confirm_password' =>$request->confirm_password,
			'gender' =>$request->gender,
            'active_status'=>'1']);
        if($insert){
            
				return response()->json(['result' =>'Success']);
        }else{
               
              return response()->json(['result'=>'failed']);
        }
    }
     public function getusersList(Request $request)
    {
		 $sql="SELECT users.* ,groups.group_name
				FROM `users` inner join groups on groups.id=users.role_id

				where active_status !=3 
				order by added_at DESC";
				$usersList = DB::select($sql);
        return response()->json($usersList);
    }
    public function editusersList(Request $request)
    {
        $useeList = User::where('user_id',$request->id)->first();
        return response()->json($useeList);
    }
    public function updateusers(Request $request){
         
         $id=$request->user_id;
         $data=array(
            'roles' =>$request->roles,
			'users_name' =>$request->user_name,
			'first_name' =>$request->first_name,
			'last_name' =>$request->last_name,
			'mobile_number' =>$request->phone_number,
			'email_id' =>$request->email,
			'password' =>$request->password,
			'confirm_password' =>$request->confirm_password,
			'gender' =>$request->gender,
            'active_status'=>'1'
         );

        $update=  User::where('user_id',$id)->update($data);
        if($update){
            
               return response()->json(['result' =>'Success']);
        }else{
               
              return response()->json(['result'=>'failed']);
        }
    }
    public function deleteusers(Request $request){
         
         $id=$request->id;
		$data=array(
            'active_status' =>3
         );
        $delete= User::where('user_id',$id)->update($data);
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
	public function getcountUsers(Request $request)
    {
        $users_lenght = User::where('active_status','=','1')->count();
        return response()->json($users_lenght);
    }
        

}

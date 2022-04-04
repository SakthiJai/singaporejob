<?php


namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use App\Models\User;
use App\Models\AddressDetails;
use App\Models\ServiceBooking;
use App\Models\Petcaredetails;
use App\Models\Document;
use App\Models\Gallery;
use App\Models\Petcaredocuments;
use App\Models\PetcareGallery;
use App\Models\ChatMessages as Message;
use App\Models\Notification;
use App\Models\CounsellingChats as Chat;
use Illuminate\Support\Facades\Validator;
use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Providers\JWT\Lcobucci;
use Illuminate\Support\Facades\DB;  
use App\Models\Setavailable;



class UserController extends Controller
{
   public function __construct()
{
  
}

 public function addUser(Request $request)
    {
        $img=$request->all();
         $path =null;
        $path1 =null;
        $path2 =null;
        //print_r($img); exit;
	    $existyMail	=	User::where('email_id',$request->email_id)->count();
		$existyMoile	=	User::where('mobile_number',$request->mobile_number)->count();
		if($existyMail>0)
		{
			return response()->json(['status'=>501,'result'=>'error update user']);
		}
		if($existyMoile>0)
		{
			return response()->json(['status'=>502,'result'=>'error update user']);
		}
        $error = null;
        if($request->file('profile_picture')){
              $path = $request->file('profile_picture')->store('public/images/upload');
                 $path = env('APP_URL').'/storage/app/'.$path;
        }
         if($request->file('house_picture')){
            $path1 = $request->file('house_picture')->store('public/images/upload');
            $path2 = env('APP_URL').'/storage/app/'.$path1;
        }
         //print_r($request->bio);exit;
          $insert=User::create([
            'role_id'=>$request->role,
            'profile_picture'=> $path,
            'first_name'=>$request->first_name,
            'email_id'=>$request->email_id,
            'mobile_number'=>$request->mobile_number,
            'date_of_birth'=>$request->birthday,
            'bio'=>$request->bio,
            'emergency_contact_name'=>$request->emergency_contactname,
            'emergency_contact_no'=>$request->emergency_contactnumber,
            'description'=>$request->aboutyou,
            'home_picture'=>$path2,
            'about_home'=>$request->about_home,
            'screen_completed'=>2,
           // 'photo_gallery'=>$request->photo_gallery_tmp
           ]);
           //print_r($insert);
           //exit;
          
          if($insert && $request->latitude && $request->longitude){ 
          $address=AddressDetails::create([  
             'user_id'=>$insert->user_id,
             'city' =>$request->city,
             'address_details'=>$request->address,
             'latitude' =>$request->latitude,
             'longitude' =>$request->longitude,
          ]);  

           if(!$address)
           {
                $error = 500;
           }
           else{
                User::where('user_id',$request->user_id)->update(array('screen_completed'=>3));
           }
      }
          if($insert && $request->petwalker){
           $add=Petcaredetails::create([
            'user_id'=>$insert->user_id,
            'pettype'=>$request->walkpet?implode(',',$request->walkpet):"0",
            'other_type'=>$request->other_type,
            'petrange'=>$request->walkpetrange?implode(',',$request->walkpetrange):"0",
            'pet_age'=>$request->walkage?implode(',',$request->walkage):"0",
            'travel_distance'=>$request->travel_distance,
            'walks_perday'=>$request->walks_perday,
            'walking_time'=>$request->walking?implode(',',$request->walking):"0",
            'service_type'=>1,
            'transportation'=>$request->transportation,
            'transportation_option'=>$request->transportationoption?implode(',',$request->transportationoption):"0",
            'emergency_transport'=>$request->emergency_transport,
            'last_min_booking'=>$request->last_min_booking,
            //'screen_ompleted'=>5
        ]);
           if(!$add)
           {
                $error = 500;
           }
            else{
                User::where('user_id',$insert->user_id)->update(array('screen_completed'=>5));
           }
    }
     if( $insert && $request->petsitter){
           $add=Petcaredetails::create([
            'user_id'=>$insert->user_id,
            'other_type'=>$request->other_sitter_othertype,
            'pettype'=>$request->sitpet?implode(',',$request->sitpet):"0",
            'petrange'=>$request->sitpetrange?implode(',',$request->sitpetrange):"0",
            'pet_age'=>$request->sitage?implode(',',$request->sitage):"0",
            'service_type'=>2,
            'areyou_home_fulltime_during_week'=>$request->areyou_home_fulltime_during_week,
            'hostdogs_different_families'=>$request->hostdogs_different_families,
            'transportation'=>$request->transportation,
            'transportation_option'=>$request->transportationoption?implode(',',$request->transportationoption):"0",
            'emergency_transport'=>$request->emergency_transport,
            'last_min_booking'=>$request->last_min_booking,
            'space_available'=>$request->space_available,
            //'screen_ompleted'=>5
        ]);
           if(!$add)
           {
                $error = 500;
           }
            else{
                User::where('user_id',$request->user_id)->update(array('screen_completed'=>5));
           }
    }  
    
        
        if($error==null){
            //return redirect()->to('/userList');
               return response()->json(['status'=>200,'user_id'=>$insert->user_id,'result' =>'Added Successfully']);
        }else{
               //return redirect()->to('/userList');
              return response()->json(['status'=>500,'result'=>'error update user']);
        }
    }

	public function updateUserDetails(Request $request)
    {
        $img=$request->all();
        //print_r($img); exit;
	    $existyMail	=	User::where('email_id',$request->email_id)->where('user_id','!=',$request->user_id)->count();
		$existyMoile	=	User::where('mobile_number',$request->mobile_number)->where('user_id','!=',$request->user_id)->count();
		if($existyMail>0)
		{
			return response()->json(['status'=>501,'result'=>'error update user']);
		}
		if($existyMoile>0)
		{
			return response()->json(['status'=>502,'result'=>'error update user']);
		}
        $error = null;
        if($request->is_available!=null){
                 $data=array(
             'user_id' =>$request->user_id,
             'from_date' =>'0000-00-01',
             'to_date' =>'0000-00-01'
         );
                $insert=  Setavailable::insert([$data]);
            }
          $data=array(
            'role_id'=>$request->role,
            
            //'profile_picture'=>$request->profile_picture_tmp,
            'first_name'=>$request->first_name,
            'email_id'=>$request->email_id,
            'mobile_number'=>$request->mobile_number,
            'date_of_birth'=>$request->birthday,
            'emergency_contact_name'=>$request->emergency_contactname,
            'emergency_contact_no'=>$request->emergency_contactnumber,
            'description'=>$request->aboutyou,
            'is_available'=>$request->is_available,
            //'home_picture'=>$request->house_picture_tmp,
            'about_home'=>$request->about_home,
            'bio'=>$request->bio,
            );
            
             if($request->file('profile_picture')){
              $path = $request->file('profile_picture')->store('public/images/upload');
                 $path = env('APP_URL').'/storage/app/'.$path;
                  $data['profile_picture']= $path;
            }
            if($request->file('house_picture')){
              $path1 = $request->file('house_picture')->store('public/images/upload');
                 $path2 = env('APP_URL').'/storage/app/'.$path1;
                  $data['home_picture']= $path2;
            }
            $insert=User::where('user_id',$request->user_id)->update($data);
		if($insert)
		{
			Petcaredetails::where('user_id',$request->user_id)->delete();
			$lastAddress = AddressDetails::where('user_id',$request->user_id)->orderby('created_at','desc')->first();
			if($lastAddress!=null){
			        $address=AddressDetails::where('address_id',$lastAddress->address_id)->update([  
                    //'user_id'=>$insert->user_id,
                    'city' =>$request->city,
                    'address_details'=>$request->address,
                    'latitude' =>$request->latitude,
                    'longitude' =>$request->longitude
                ]); 
			}
			else if($request->address && $request->latitude && $request->longitude){
			    
			     $address=AddressDetails::insert([  
                    'user_id'=>$request->user_id,
                    'city' =>$request->city,
                    'address_details'=>$request->address,
                    'latitude' =>$request->latitude,
                    'longitude' =>$request->longitude
                ]); 
			}
          
		}
          if($request->petwalker){
			  
           
		$add=Petcaredetails::create([
            'user_id'=>$request->user_id,
            'pettype'=>$request->walkpet?implode(',',$request->walkpet):"0",
            'petrange'=>$request->walkpetrange?implode(',',$request->walkpetrange):"0",
            'pet_age'=>$request->walkage?implode(',',$request->walkage):"0",
            'travel_distance'=>$request->travel_distance,
            'walks_perday'=>$request->walks_perday,
            'walking_time'=>$request->walking?implode(',',$request->walking):"0",
            'service_type'=>1,
            'transportation'=>$request->transportation,
            'transportation_option'=>$request->transportationoption?implode(',',$request->transportationoption):"",
            'emergency_transport'=>$request->emergency_transport,
            'last_min_booking'=>$request->last_min_booking,
			'space_available'=>$request->space_available,
			'other_type'=>$request->other_type,
        ]);
           if(!$add)
           {
                $error = 500;
           }
    }
     if( $request->petsitter){
           $add=Petcaredetails::create([
            'user_id'=>$request->user_id,
            'pettype'=>$request->sitpet?implode(',',$request->sitpet):"0",
            'petrange'=>$request->sitpetrange?implode(',',$request->sitpetrange):"0",
            'pet_age'=>$request->sitage?implode(',',$request->sitage):"0",
            'service_type'=>2,
            'areyou_home_fulltime_during_week'=>$request->areyou_home_fulltime_during_week,
            'hostdogs_different_families'=>$request->hostdogs_different_families,
            'transportation'=>$request->transportation,
            'transportation_option'=>$request->transportationoption?implode(',',$request->transportationoption):"",
            'emergency_transport'=>$request->emergency_transport,
            'last_min_booking'=>$request->last_min_booking,
            'space_available'=>$request->space_available,
            'other_type'=>$request->other_sitter_othertype,
        ]);
           if(!$add)
           {
                $error = 500;
           }
    }    
        if($error==null){
            //return redirect()->to('/userList');
               return response()->json(['status'=>200,'result' =>'Updated Successfully']);
        }else{
               //return redirect()->to('/userList');
              return response()->json(['status'=>500,'result'=>'error update user']);
        }
    }
    public function getuserList(){
      $users = User:: 
            join('roles', 'users.role_id', '=', 'roles.role_id')
             ->where('delete_status','=',0)
             ->where('users.role_id','>',1)
           // ->select('*')
            ->select('*',DB::raw('DATE_FORMAT(updated_at, "%d-%m-%Y %h:%i:%s") as lastLogin'))
           ->orderBy('added_at', 'desc')
            ->get();
          return response()->json($users);
    }
     public function getusersDetails(Request $request){
       
      $users['data'] = User::where('user_id',$request->id)->first();
	  $users['role'] = Petcaredetails::where('user_id',$request->id)->get();
      $users['document'] = Petcaredocuments::where('user_id',$request->id)->get();
      //$users['pettypegallery'] = Petcaredetails::where('user_id',$request->id)->get();
      $users['address'] = AddressDetails::where('user_id',$request->id)->orderBy('created_at', 'desc')->first();
       $users['gallery'] = Gallery::where('user_id',$request->id)->get();
       $users['pettypegallery']= $this->getpetgallerylist($request->id);
       
       $users['countpopulity']	=	ServiceBooking::where('pet_care_giver_id',$request->id)
                                    ->where('booking_status', '=',7)
                                    ->count();
                                    
                                    
          return response()->json($users);
    }
    public function getpetgallerylist($userid){
         $sql = "select A.pet_image_id,B.user_id,A.pet_id,A.booking_id,A.image,B.pet_image 
                from petdetails B 
                LEFT JOIN  petcare_gallery A ON A.pet_id =B.petid 
                where B.user_id= $userid";
        $details = DB::select($sql);
        return $details;
    }
    
    public function deleteuserList(Request $request){
       
       $id=$request->id;
        $delete=User::where('user_id',$id)->update(array('delete_status'=>1,'active_status'=>3));
        if($delete){
            
               return response()->json(['result'=>'true']);
        }else{
               
              return response()->json(['result'=>'false']);
        }
    }
      public function updateUser(Request $request){
         
         $id=$request->user_id;
         $data=array(
            'first_name' => $request->first_name,
            'email_id' => $request->email_id,
            'mobile_number' => $request->mobile_number,
            'role_id' => $request->role_id,

         );
        $update=User::where('user_id',$id)->update($data);
        if($update){
            //return redirect()->to('/userList');
               return response()->json(['result' =>200]);
        }else{
               //return redirect()->to('/userList');
              return response()->json(['result'=>500]);
        }
    }
    public function mobilenumber_verify(Request $request){
        
      
        $otp =rand('1000','9999');
       
       $user= DB::table('users')->where('mobile_number', $request->mobile_number)->first();
      
        if($user){
           
           $update= User::where('mobile_number', $request->mobile_number)
            ->update(['phone_otp' =>$otp]);
            
            if($update){
                if($request->role_id>0 && $user->active_status==1){
                  return response()->json(array('status'=>false,'message'=>'Profile already exist, please try to login','data'=>[])); 
                }
                else if($request->role_id>0 && $user->active_status==2){
                  return response()->json(array('status'=>false,'message'=>'Your Account has been suspended,Please Contact Administrator','data'=>array('mobile_number'=>$request->mobile_number,'phone_otp' => "",
                  'screen_completed'=>$user->screen_completed,'user_status'=>$user->active_status))); 
                }
                else if($request->role_id>0 && $user->active_status==3){
                  return response()->json(array('status'=>false,'message'=>'Your Account is deleted,Please Contact Administrator','data'=>array('mobile_number'=>$request->mobile_number,'phone_otp' => "",
                  'screen_completed'=>$user->screen_completed,'user_status'=>$user->active_status))); 
                }
                else if($request->role_id>0 && $user->active_status==0){
                  return response()->json(array('status'=>false,'message'=>'Your Account not activated,Please Contact Administrator','data'=>array('mobile_number'=>$request->mobile_number,'phone_otp' => "",
                  'screen_completed'=>$user->screen_completed,'user_status'=>$user->active_status))); 
                }
                else
                {
                    return response()->json(array('status'=>true,'message'=>'OTP Sent successfully','data'=>array('mobile_number'=>$request->mobile_number,'phone_otp' => $otp,
                  'screen_completed'=>$user->screen_completed,'user_status'=>$user->active_status))); 
                }
                
            }
            else{
              $data=array('status'=>false,'message'=>'Otp Not Send');
              return response()->json();
            }
            

        }else{
            if($request->role_id==0){
                 $datas=array('status'=>false,'message'=>'Entered mobile number not avaliable,please try to register','data'=>[]);
                  return response()->json($datas);
            }
            else
            {
          $status = $request->role_id==5?1:2;
          
            $users = User::create([
                'mobile_number' => $request->mobile_number,
                'delete_status'=>0,
                'country_code' =>966,
                'role_id' => $request->role_id,
                'phone_otp' => $otp,
                'active_status'=>$status
                
            ]);
           
            if($users){
           
             return response()->json(array('status'=>true,'message'=>'Successfully Send OTP',"data"=>array('mobile_number'=>$request->mobile_number,'otp' => $otp,'screen_completed'=>0,'user_status'=>$status)));
            }else{
                 
              $datas=array('status'=>false,'message'=>'Issue While Send Otp');
             return response()->json($datas);
          }
            }
        }
        

}
 public function otp_verify(Request $request)
    {
        $check = User::where('mobile_number', $request->mobile_number)->first();
        //->where('phone_otp', $request->otp)
        if($request->otp =='1111'){
            if($check->role_id==7 && $check->screen_completed<2){
                User::where('mobile_number', $request->mobile_number)->update(['phone_otp_verified_at'=>now(),'active_status'=>2,'screen_completed'=>$request->screen_completed>0?$request->screen_completed:$check->screen_completed]);
            }
            else if($check->role_id==5 && $check->screen_completed<7){
                User::where('mobile_number', $request->mobile_number)->update(['phone_otp_verified_at'=>now(),'screen_completed'=>$request->screen_completed>0?$request->screen_completed:$check->screen_completed]);
            }
            else {
                User::where('mobile_number', $request->mobile_number)->update(['phone_otp_verified_at'=>now()]);
            }
            
            
            
            $user=$check;
             $token = JWTAuth::fromUser($check);
              User::where('mobile_number', $request->mobile_number)->update(array("remember_token"=>$token));
             $existprofile=DB::table('users')->where('mobile_number', $request->mobile_number)->where('first_name', '!=', null)->first();
                
           $data=array('status'=>true,'message'=>'Successfully Verified OTP','data'=>array('token'=>'Bearer '.$token,'userid'=> $check->user_id,'isProfileCompleted'=>($existprofile==null?0:1)));
            return response()->json($data);  
        }else{
          $data=array('status'=>false,'message'=>'Invalid OTP');
            return response()->json($data);
        }
    }

public function send_sms($mobile,$code)
{
 
  $namess=ucfirst($names);
  $mobileno = str_replace(' ', '', $mobile);
  $mes='Welcome To ALEEF ! Hi! Your Security Code- '.$code;
  //Your authentication key
  $authKey = "";

//Multiple mobiles numbers separated by comma
  $mobileNumber = $mobileno;

//Sender ID,While using route4 sender id should be 6 characters long.
  $senderId = "";

//Your message to send, Add URL encoding here.
  $message = urlencode($mes);

//Define route p
  $route = 4;
//Prepare you post parameters
  $postData = array(
    'authkey' => $authKey,
    'mobiles' => $mobileNumber,
    'message' => $message,
    'sender' => $senderId,
    'route' => $route,
    'DLT_TE_ID'=>''
  );

//API URL
  $url="";

// init the resource
  $ch = curl_init();

  curl_setopt_array($ch, array(
    CURLOPT_URL => $url,
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_POST => true,
    CURLOPT_POSTFIELDS => $postData
    //,CURLOPT_FOLLOWLOCATION => true
  ));


//Ignore SSL certificate verification
  curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
  curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);

//get response
  $output = curl_exec($ch);
//Print error if any

  if(curl_errno($ch))
  {
    // echo json_encode($messages);

  }
  else
  {

    // echo json_encode($message);

  }
  return true;
}

 public function basicInformation(Request $request){
    $img=$request->all();
   
   //$image_details=$img['gallery'];
        
if(User::where('mobile_number', $request->mobile_number)->orWhere('user_id', $request->userid)){
$userData = User::where('mobile_number', $request->mobile_number)->orWhere('user_id', $request->userid)->get();
       $data=[];
                
                    
                    if($request->mobile_number){
                        $data['mobile_number']=  $request->mobile_number;
                    }
                    if($request->emergency_contact_name){
                        $data['emergency_contact_name']=  $request->emergency_contact_name;
                    }
                    if($request->email_id){
                        $data['email_id']=  $request->email_id;
                    }
                    if($request->emergency_contact_no){
                        $data['emergency_contact_no']=  $request->emergency_contact_no;
                    }
                     if($request->about_home){
                        $data['about_home']=  $request->about_home;
                    }
                    if($request->date_of_birth){
                        $data['date_of_birth']= date('Y-m-d',strtotime($request->date_of_birth));
                    }
                     if($request->latitude){
                        $data['latitude']=  $request->latitude;
                    }
                     if($request->longitude){
                        $data['longitude']=  $request->longitude;
                    }
                    if($request->description){
                        $data['description']=  $request->description;
                    }
                     if($request->caregiver_bio){
                        $data['bio']=  $request->caregiver_bio;
                    }
                     if(isset($request->receive_receipt_email)){
                        $data['receive_receipt_email']=  $request->receive_receipt_email==false?0:1;
                    }
                    if(isset($request->first_name)){
                        $data['first_name']=  $request->first_name;
                    }
                    if(isset($request->last_name)){
                        $data['last_name']=  $request->last_name;
                    }
                    if($request->profile_picture){
                        $data['profile_picture']=  $request->profile_picture;
                         /*$file1 = $request->file('profile_picture')->store('public/images/users');   
                         $data['profile_picture']   =  $file1; */
                    }
                     if($request->home_picture){
                        
                        $data['home_picture']   = $request->home_picture;
                       
                    }
                    if($request->screen_completed>0){
                        $data['screen_completed']=  $request->screen_completed;
                    }
                    
                   
        $update=User::where('user_id',$userData[0]['user_id'])->update($data);
       if($userData[0]['receive_receipt_email']==false){$userData[0]['receive_receipt_email']=(bool)false;}
       else
       {
           $userData[0]['receive_receipt_email']=(bool)true;
       }
        $datas['profile_information']=$userData ;
        $datas['gallery']=DB::table('gallery')->where('user_id',$userData[0]['user_id'])->get();  
        
        if($update){
            if($request->latitude!="" && $request->longitude!=""){
            $address=AddressDetails::create([  
             'user_id'          =>$userData[0]['user_id'],
             'city'             =>$request->city,
             'country'          =>$request->country,
             'state'            =>$request->state,
             'address_details'  =>$request->address,
             'latitude'         =>$request->latitude,
             'longitude'        =>$request->longitude
          ]);
            }
            if(isset($img['gallery'])){
              $image_details=$img['gallery'];
            $this->saveGalleryDetails($request->userid,$image_details);
            /* if($request->userid && $img['gallery']>0 )
                  {
                      foreach($img['gallery'] as $value):
                        $photogallery=array(
                                    'user_id'=> $userData[0]['user_id'],
                                    'image'=> $value['image']
                             );
                     Gallery::create($photogallery);
                  
                  endforeach;
            }*/
             $datas['address'] = AddressDetails::where('user_id',$userData[0]['user_id'])->orderBy('created_at', 'desc')->first();
             
             return response()->json(array('status'=>true,'data'=>$datas,'message'=>'Basic Information  Saved Successfully'));
            }else{
              
              return response()->json(array('status'=>false,'message'=>'Issue While Save'));
        }
        
     }
     else{
   
         $users = User::create([
                'mobile_number'=>$request->mobile_number,
                'emergency_contact_name'=>$request->emergency_contact_name,
                'email_id'=>$request->email_id,
                'latitude'=>$request->latitude,
                'longitude'=>$request->longitude,
                'description'=>$request->description,    
                'emergency_contact_no'=>$request->emergency_contact_no,
                'date_of_birth'=>date('Y-m-d',strtotime($request->date_of_birth)),
                'profile_picture'=>$request->profile_picture,
                'home_picture'=>$request->home_picture,
                'bio'=>$request->caregiver_bio, 
                'screen_completed'=>$request->screen_completed
            ]);
         if($users){
             $userData = User::where('mobile_number', $request->mobile_number)->get();
             if(isset($img['gallery']) && sizeof($img['gallery'])>0){
                 $image_details=$img['gallery'];
            $this->saveGalleryDetails($userData[0]['user_id'],$image_details);
             }
            $datas['profile_information']=$users;
           
            return response()->json(array('status'=>true,'data'=>$datas),200,[],JSON_NUMERIC_CHECK);
        }else{
              
             return response()->json(array('status'=>false));
        } 


     }  

 }
 }
 public function saveGalleryDetails($userId,$galleryDetails)
 {
     //print_r($galleryDetails);exit;
    if(sizeof($galleryDetails)>0)
    {
        
        foreach($galleryDetails as $details):
           
           $modified=date("Y-m-d H:i:s");
            $gallery_id=$details['gallery_id'];
             $image=$details['image'];
       
           if($gallery_id!=""){
            if($details['modified']==true){
                DB::table('gallery')->where('gallery_id', $gallery_id)->delete();
                
            }
            else{
           
             $galleryup=DB::table('gallery')->where('gallery_id', $gallery_id)->where('user_id',$userId)->update(['image'=>$image,'modified_at'=>$modified]); 
            }
        
           }
          else{
         
           
         $galleryup=DB::table('gallery')->insert(['user_id'=>$userId,'image'=>$image,'modified_at'=>$modified]); 
           
          }
          endforeach; 

    }
}
 public function petOwner(Request $request){
     
     $users=User::where('user_id', $request->user_id)->update(['first_name'=>$request->display_name,'email_id'=>$request->email_id,
     'screen_completed'=>$request->screen_completed,'device_token'=>$request->device_token]);
     if($users){
           $user= DB::table('users')->where('user_id',$request->user_id)->first();  
           if($user->role_id==7 && $user->screen_completed==2){
                                    $notification = [
                                        "title" => "New User Registration",
                                        "body" => "",
                                    ];
                                    if($user->role_id==7){
                        $notification['body']   = "Welcome to Pawsers ".$request->display_name."";
                                    }
                                    $data=array(
                                      'petowner_id' =>  $request->user_id,
                                      'petcaregiver_id' => "",
                                      'booking_id' =>'',
                                      'message' =>$notification['body'],
                                      'booking_tittle'=>$notification['title'],
                                      'notification_utc_format'=>gmdate("Y-m-d\TH:i:s"),
                                        'status'=>0
                                    );
                                     if($request->user_id!=null){
                                            $data['notification_type']=  12;
                                        }   
                                    $insert=  Notification::insert([$data]);
                                    $insertId = DB::getPdo()->lastInsertId();
                $this->sendPushNotification($user->device_token,$notification,$insertId);
                User::where('user_id',$request->user_id)->update(['screen_completed'=>$request->screen_completed>0?$request->screen_completed:$user->screen_completed]);
            }
            else if($user->role_id==5 && $user->screen_completed==7){
                 User::where('user_id',$request->user_id)->update(['screen_completed'=>$request->screen_completed>0?$request->screen_completed:$user->screen_completed]);
            }
            $user= DB::table('users')->where('user_id',$request->user_id)->first(); 
            return response()->json(array('status'=>true,'data'=>array('userDetails'=>$user),'message'=>'Profile Updated Successfully'),200,[],JSON_NUMERIC_CHECK);
        }else{
              
             return response()->json(array('status'=>false,'message'=>'Issue While Update'));
        } 
 }

 public function changeuserStatus(Request $request){
         
         $id=$request->id;
         $status=$request->status;
        
         if($status==1){
            $active=2;
         }elseif($status==2){
             $active=1;
         }
         $data=array(
            'active_status' =>($request->status==1?2:1)
         );
        $update=User::where('user_id',$id)->update($data);
        if($update){
           
               return response()->json(['result' =>'true']);
        }else{
               
              return response()->json(['result'=>'false']);
        }
    }
      public function getuserType(Request $request){
       
      $roles =DB::table('roles')->where("role_id",">","1")->get();
          return response()->json($roles);
    }
    public function updateDeviceToken(Request $request)
    {
        
        User::where('device_token',$request->device_token)->update(['device_token' => ""]);
        $header = $request->header('Authorization', '');
      $header = str_replace('Bearer ', '', $header) ;
      $currentUser = User::where('remember_token',  $header)
      ->where('active_status','!=','3')->first();
      $currentUser->device_token = $request->device_token;
      //User::where('votes', '>', 100)->update(array('status' => 2))
      if($currentUser->save())
      {
         return response()->json(array('status'=>true,'message'=>'token Saved succesfully','data'=>[]));  
      }
      else
      {
           return response()->json(array('status'=>false,'message'=>'Issue While Save','data'=>[]));
      }
      
    }
    public function getUserDetailsByToken(Request $request)
    {
    $address =[];
    $is_caregiver =0;
    $is_owner =0;
      $header = $request->header('Authorization', '');
      $header = str_replace('Bearer ', '', $header) ;
      $currentUser = User::where('remember_token',  $header)
      ->where('active_status','!=','3')->first();
     
       if($currentUser){
       $galleryup                   =   DB::table('gallery')->where('user_id',$currentUser->user_id)->get();
       $address                     =   DB::table('address')->where('user_id',$currentUser->user_id)->get();
       $petcare                     =   DB::table('petcare_details')->where('user_id',$currentUser->user_id)->get();
       $petcaredocument             =   DB::table('petcare_documents')->where('user_id',$currentUser->user_id)->get();
     // $arr= array_map('strval', array($currentUser->mobile_number));

        $currentUser->mobile_number = $currentUser->mobile_number;
        $currentUser->emergency_contact_no = $currentUser->emergency_contact_no;
        $currentUser->country_code =(int) $currentUser->country_code;
        $currentUser->email_verified	= (int) $currentUser->email_verified;
        $currentUser->screen_completed	= (int) $currentUser->screen_completed;
        $currentUser->role_id	= (int) $currentUser->role_id;
      $currentUser->is_caregiver= $currentUser->role_id==5?true:false;
       $currentUser->is_owner= $currentUser->role_id==7?true:false;
        $currentUser->delete_status	= (int) $currentUser->delete_status;
         $currentUser->active_status	= (int) $currentUser->active_status;
          $currentUser->active_status	= (int) $currentUser->active_status;
        $currentUser->latitude	= (double) $currentUser->latitude;
         $currentUser->longitude	= (double) $currentUser->longitude;
           $currentUser->receive_receipt_email	= (bool) $currentUser->receive_receipt_email==0?false:true;
            $currentUser->screen_completed=(int) $this->screencompleted($currentUser->mobile_number);

        foreach( $petcare  as $index=>$pet)
        {
            $petcare[$index]->id=(int)$pet->id;
            $petcare[$index]->service_type=(int)$pet->service_type;
            $petcare[$index]->travel_distance=(int)$pet->travel_distance;
            $petcare[$index]->walks_perday=(int)$pet->walks_perday;
            $petcare[$index]->areyou_home_fulltime_during_week=(int)$pet->areyou_home_fulltime_during_week;
            $petcare[$index]->hostdogs_different_families=(int)$pet->hostdogs_different_families;
            $petcare[$index]->walking_time=$pet->walking_time;
            $petcare[$index]->transportation=(int)$pet->transportation;
            $petcare[$index]->space_available=(int)$pet->space_available;
            $petcare[$index]->emergency_transport=(int)$pet->emergency_transport;
            $petcare[$index]->last_min_booking=(int)$pet->last_min_booking;
            $petcare[$index]->pet_walking_charge=(double)(($pet->pet_walking_charge>0)?$pet->pet_walking_charge:0.0);
            $petcare[$index]->pet_sitting_charge=(double)$pet->pet_sitting_charge;
            $petcare[$index]->pickup_charge=$pet->pickup_charge;
            $petcare[$index]->dropoff_charge=$pet->dropoff_charge;
            $petcare[$index]->status=(int)$pet->status;
            $petcare[$index]->user_id=(int)$pet->user_id;
            $petcare[$index]->screen_completed=(int)$pet->screen_completed;
        }
         foreach( $address  as $index=>$pet)
        {
            $address[$index]->address_id=(int)$pet->address_id;
            $address[$index]->user_id=(int)$pet->user_id;
             $address[$index]->latitude=doubleval($pet->latitude>0?$pet->latitude:0.00);
              $address[$index]->longitude=doubleval($pet->longitude>0?$pet->longitude:0.00);
               $address[$index]->status=(int)$pet->status;
        }
        foreach( $galleryup  as $index=>$pet)
        {
            $galleryup[$index]->gallery_id=(int)$pet->gallery_id;
            $galleryup[$index]->user_id=(int)$pet->user_id;
        }
        foreach( $petcaredocument  as $index=>$pet)
        {
            $petcaredocument[$index]->petcareid=(int)$pet->petcareid;
            $petcaredocument[$index]->document_id=(int)$pet->document_id;
            $petcaredocument[$index]->user_id=(int)$pet->user_id;
             $petcaredocument[$index]->document_type=(int)$pet->document_type;
        }
     }
       else
       {
              $galleryup = [];
              $currentUser=[];
              $address=[];
              $petcare=[];
              $petcaredocument=[];
       }
        
       //return response()->json(array('status'=>true,'data'=>array('userDetails'=>$currentUser,'address'=>$address,'gallery'=>$galleryup,'petcaredetail'=>$petcare,'petcaredocument'=>$petcaredocument),'message'=>($currentUser)?"":"User details already deleted"), 200, [], JSON_NUMERIC_CHECK); 
      return response()->json(array('status'=>true,'data'=>array('userDetails'=>$currentUser,'address'=>$address,'gallery'=>$galleryup,'petcaredetail'=>$petcare,'petcaredocument'=>$petcaredocument),'message'=>"Success"),200,[],JSON_PRESERVE_ZERO_FRACTION);
      /*$currentUser = JWTAuth::toUser($request->token);
      print_r($currentUser);exit;*/
    }
       public function dashboard(Request $request){
       
       $users = User::distinct('mobile_number')->where('role_id','>','1')->count('mobile_number');

       return view("dashboard", ['users'=>$users]);
      }
	  public function updateImage(Request $request)
	  {
		  print_r($request);
	  }
      public function getdocumentlist(Request $request)
    {
        $documentlist = Document::all();
        return response()->json($documentlist);
    }
     public function documentupload(Request $request){
        
       /*  $file1 = null;
         $file2 = null;*/
      //print_r($request); exit;
       	$userDetails =User::where('user_id',$request->duser_id)->get();
       $deleteFile = null;
       if($request->deletefile!=''){
        $request->deletefile = rtrim($request->deletefile, ',');
         $deleteFile = explode(',',$request->deletefile);
       }
      // print_r($deleteFile); exit;
        $exist = Petcaredocuments::where('user_id',$request->duser_id)->get();
        $documentdetails = false;
        $insert = array('document_type'=>$request->document_type);
      if($request->file('uploadfrontside')!=''){   
           $documentdetails = true;
       $file = $request->file('uploadfrontside')->store('public/images/upload');
       $insert['frontside_image']=env('APP_URL').'/storage/app/'.$file;
      }
       if($request->file('uploadbackside')!=''){
            $documentdetails = true;
            $file1 = $request->file('uploadbackside')->store('public/images/upload');
            $insert['backside_image']=env('APP_URL').'/storage/app/'.$file1;
        }
        if($request->file('takeselfieholding')!=''){
             $documentdetails = true;
         $file2 = $request->file('takeselfieholding')->store('public/images/upload');
         $insert['withselfie_image']=env('APP_URL').'/storage/app/'.$file2;
     }
     if($request->document_type==10){ $insert['backside_image'] =null;}
     if($request->hasfile('userfiles'))
         { 
             //User::where('user_id',$request->duser_id)->update(array('screen_completed'=>7));
             $documentdetails = true;
           if(is_array($request->file('userfiles'))){
            foreach($request->file('userfiles') as $key => $file)
            {
               // echo $file->getClientOriginalName(); 
                if ($deleteFile!=null && in_array($file->getClientOriginalName(), $deleteFile)){}
                else{
                 $path = $file->store('public/images/upload');
                 $path = env('APP_URL').'/storage/app/'.$path;
                 Gallery::insert(array('user_id'=>$request->duser_id,'image'=>$path));
                }
            }
           }
           else
           {
               //$file2 = $request->file('userfiles')->store('public/images/');
               $path = $request->file('userfiles')->store('public/images/upload');
                $path = env('APP_URL').'/storage/app/'.$path;
                Gallery::insert(array('user_id'=>$request->duser_id,'image'=>$path));
           }
         }
        /* if($request->hasfile('pettypefiles'))
         { 
             //User::where('user_id',$request->duser_id)->update(array('screen_completed'=>7));
             $documentdetails = true;
           if(is_array($request->file('pettypefiles'))){
            foreach($request->file('pettypefiles') as $key => $file)
            {
               // echo $file->getClientOriginalName(); 
                if ($deleteFile!=null && in_array($file->getClientOriginalName(), $deleteFile)){}
                else{
                 $path = $file->store('public/images/upload');
                 $path = env('APP_URL').'/storage/app/'.$path;
                 PetcareGallery::insert(array('user_id'=>$request->duser_id,'image'=>$path));
                }
            }
           }
           else
           {
               //$file2 = $request->file('userfiles')->store('public/images/');
               $path = $request->file('userfiles')->store('public/images/upload');
                $path = env('APP_URL').'/storage/app/'.$path;
                PetcareGallery::insert(array('user_id'=>$request->duser_id,'image'=>$path));
           }
         }*/
 
        
 
            //store your file into database
            if($exist->count()>0){
             $add=Petcaredocuments::where('user_id',$request->duser_id)->update($insert);
              if( $documentdetails == true){
                 User::where('user_id',$request->duser_id)->update(array('screen_completed'=>7));
                }
            }
            else
            {
                $insert['user_id']=$request->duser_id;
               
                $add = Petcaredocuments::create($insert);
                if( $documentdetails == true){
                 User::where('user_id',$request->duser_id)->update(array('screen_completed'=>7));
                }
            }
             if($add){
                
          //return redirect('/users');
                if($userDetails[0]->role_id=='5')
                {
                 return redirect('/petcaregiver');
                 }
                else
                 {
                return redirect('/petowneruser');
                }
        }
        else
        {
            if($userDetails[0]->role_id=='5')
            {
                return redirect('/petcaregiver');
            }
            else
            {
                return redirect('/petowneruser');
            }
        }
 
        //$name = $request->file('uploadfrontside')->getClientOriginalName();
 
       // $path = $request->file('uploadfrontside')->store('public');
 
 
       // $save = new Petcaredocuments;
 
       // $save-> frontside_image = $name;
       // $save->path = $path;

      //return response()->json([
               // "success" => true,
                //"message" => "File successfully uploaded",
                //"file" => $file
            //]);
   }
   function deleteGallery(Request $request)
   {
       if( Gallery::where('gallery_id',$request->gallerid)->delete())
       {
           $users['status'] = 200;
           $users['gallery'] = Gallery::where('user_id',$request->user_id)->get();
          return response()->json($users);
       }
       else
       {
           $users['status'] = 500;
           $users['gallery'] = Gallery::where('user_id',$request->user_id)->get();
          return response()->json($users);
       }
   }
   function getowneruserlist(Request $request)
   {
           $users = User::
           join('roles', 'users.role_id', '=', 'roles.role_id')
          -> where('roles.role_id', '=', 7)
             ->where('delete_status','=',0)
              ->where('users.role_id','>',1)
           // ->select('*')
            ->select('*',DB::raw('DATE_FORMAT(updated_at, "%d-%m-%Y %h:%i:%s") as lastLogin'))
           ->orderBy('added_at', 'desc')
            ->get();
          return response()->json($users);
    
   }
   function getpetcaregiverlist(Request $request)
   {
           $users = User::
           join('roles', 'users.role_id', '=', 'roles.role_id')
            ->where('roles.role_id', '=', 5)
             ->where('delete_status','=',0)
              ->where('users.role_id','>',1)
           // ->select('*')
            ->select('*',DB::raw('DATE_FORMAT(updated_at, "%d-%m-%Y %h:%i:%s") as lastLogin'))
           ->orderBy('added_at', 'desc')
            ->get();
          return response()->json($users);
    
   }
    public function petcaregiverStatus(Request $request){
         //print_r($request); exit;
         $id=$request->id;
        /* $data=array(
        if($request->active){
            'active_status' =>2
        }
         );*/
         if($request->status=='Pending'){
                $data['active_status']= 1 ;
        }
        if($request->status=='Active'){
                $data['active_status']= 2;
        } if($request->status=='Inactive'){
                $data['active_status']= 3 ;
        }
         
        $update=User::where('user_id',$id)->update($data);
        if($update){
           
               return response()->json(['result' =>'true']);
        }else{
               
              return response()->json(['result'=>'false']);
        }
    }
    public function changeroles(Request $request){
        $header = $request->header('Authorization', '');
      $header = str_replace('Bearer ', '', $header) ;
      $currentUser = User::where('remember_token',  $header)->first();
       $data=array(
            'role_id' => $request->new_role_id,
            'mobile_number' =>$currentUser['mobile_number'],
            'country_code' => $currentUser['country_code'],
            'first_name' => $currentUser['first_name'],
            'last_name' => $currentUser['last_name'],
            'emergency_contact_name' => $currentUser['emergency_contact_name'],
            'emergency_contact_no' => $currentUser['emergency_contact_no'],
            'date_of_birth' => $currentUser['date_of_birth'],
            'profile_picture' => $currentUser['profile_picture'],
            'about_home' => $currentUser['about_home'],
            'bio' => $currentUser['bio'],
            'receive_receipt_email' => $currentUser['receive_receipt_email'],
            'device_token' => $currentUser['device_token'],
            'description' => $currentUser['description'],
            'latitude' => $currentUser['latitude'],
            'longitude' => $currentUser['longitude'],
            'password' => $currentUser['password'],
            'email_id' => $currentUser['email_id'],
            'email_verified' => $currentUser['email_verified'],
            'screen_completed' => $currentUser['screen_completed'],
            'wallet_amount' => $currentUser['wallet_amount'],
            'pin_code' => $currentUser['pin_code'],
            'remember_token' => $currentUser['remember_token'],
            'delete_status' => $currentUser['delete_status'],
            'active_status' => $currentUser['active_status'],
            'added_at' => $currentUser['added_at'],
             'updated_at' => $currentUser['updated_at'],
         );

        $insert=  User::insert([$data]);
        if($insert){
            
               return response()->json(['result' =>'Success']);
        }else{
               
              return response()->json(['result'=>'failed']);
        }
      //return response()->json($currentUser);
    }
     public function screencompleted($mobilenumber){
         $sql="select A.user_id,A.mobile_number,A.screen_completed
                 from users A
                where mobile_number = $mobilenumber";
                 $details = DB::select($sql);
                // if(sizeof($details['rows'])>1){
                     
                 //}
            if(sizeof($details)==1){return $details[0]->screen_completed;}
            if(sizeof($details)>1){return $details[1]->screen_completed;}
     }
      public function userStatus(Request $request){
         
         $id=$request->id;
         $status=$request->status;
        
         if($status==2){
            $active=3;
         }elseif($status==3){
             $active=2;
         }
         $data=array(
            'active_status' =>($request->status==2?3:2)
         );
        $update=User::where('user_id',$id)->update($data);
        if($update){
           
               return response()->json(['result' =>'true']);
        }else{
               
              return response()->json(['result'=>'false']);
        }  
      }
     function deletepettypeGallery(Request $request)
   {
       //print_r($request);exit;
     $delete = PetcareGallery::where('pet_image_id',$request->pettypegallerid)->delete();
       if($delete)
       {
           $users['status'] = 200;
           $users['pettypegallery'] = PetcareGallery::where('user_id',$request->user_id)->get();
          return response()->json($users);
       }
       else
       {
           return response()->json(array('status'=>false,'message'=>'Delete Failed','data'=>[]));  
       }
   }
   public function sendPushNotification($token,$notification,$notificationid)
    {
       // $firebaseToken = User::whereNotNull('device_token')->pluck('device_token')->all();
          $firebaseToken=$token;
        $SERVER_API_KEY = 'AAAAfiGrWV4:APA91bFbHcDRUgz2LTmYUfPOyyl7GsEWKk28IQiCMv4dW11ekRlPlCFZi_p76b9nFWtTLI-BM9x92AO7a3GLvHXr2BATPkBnOHcIo1PaptargW_arv55J0EapTRoxLYzNCRlvDt3mErE';
        $extra=  [
                            "notification_id" =>$notificationid,
                            "sound" => "default"
                        ];
  
        $data = [
            "to" => $token,
            "notification" => $notification,
            "data" =>$extra
        ];
         $dataString = json_encode($data);
    
        $headers = [
            'Authorization: key=' . $SERVER_API_KEY,
            'Content-Type: application/json',
        ];
        
        $ch = curl_init();
      
        curl_setopt($ch, CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send');
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $dataString);
               
         $response = curl_exec($ch);
   //print_r($response);
        //dd($response);
    }

} 
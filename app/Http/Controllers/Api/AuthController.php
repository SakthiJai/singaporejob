<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Requirements;
use App\Models\ServicePages as Service;
use App\Models\User;
use App\Models\CustomerRequirements as CustomerR;
use App\Models\Roles;
use App\Models\ContactUs;
use App\Models\EmailSubscription;
use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;
use Mail;
use Illuminate\Support\Facades\Crypt;

class AuthController extends Controller
{
    
    public function __construct() {}

    /* Requirement List */
    public function get_requirements()
    {
        return response()->json(array('status'=>true,'requirements'=>Requirements::all()));
    }
      public function getrequirements(Request $request)
    {
        $requirementsList = Requirements::all();
        return response()->json($requirementsList);
    }

    /* Service Pages List */
    public function get_service_pages()
    {
        return response()->json(array('status'=>true,'requirements'=>Service::all()));
    }

    /* Login Api */
    public function login(Request $request)
    {
        $roles=Roles::firstWhere('role_name','customer');
        if(User::firstWhere('mobile_number', $request->mobile_number)){
            User::where('mobile_number', $request->mobile_number)
            ->update(['phone_otp' => 1234]);
            return response()->json(array('status'=>true,'message'=>'Successfully Send OTP','mobile_number'=>$request->mobile_number));  
        }else{
            $users = User::create([
                'mobile_number' => $request->mobile_number,
                'country_code' =>91,
                'role_id' => $roles->role_id,
                'phone_otp' => 1234
            ]);
            return response()->json(array('status'=>true,'message'=>'Successfully Send OTP','mobile_number'=>$request->mobile_number));
        }
    }
    /* OTP Verify */
    public function otp_verify(Request $request)
    {
        $check = User::where('mobile_number', $request->mobile_number)->where('phone_otp', $request->otp)->first();
        if($check){
            User::where('mobile_number', $request->mobile_number)->update(['phone_otp_verified_at'=>now()]);
            $user=$check;
            //$new_user = ($check->pan_number!='' && $check->first_name!='') ? false : true ;
            $token = JWTAuth::fromUser($check);
            $res=array('user'=>$user,'token'=>'Bearer '.$token);
            return response()->json(array('status'=>true,'message'=>'Successfully Verified OTP','body'=>$res));  
        }else{
            return response()->json(array('status'=>false,'message'=>'OTP is Wrong'));
        }
    }
    /* Get User Profiles */
    public function profiles(Request $request)
    {
        $user = User::where('user_id', $request->user_id)->first();
        return response()->json(array('status'=>true,'message'=>'Successfully User details','body'=>compact('user')));  
    }

    /* Get Save Personal Details */
    public function save_personal(Request $request){
        $ip= $request->ip();
        $user_agent= $request->header('User-Agent');
        $data=array('first_name'=>$request->first_name,'last_name'=>$request->last_name,'email_id'=>$request->email_id,
        'pin_code'=>$request->pin_code,'pan_number'=>$request->pan_number,'date_of_birth'=>date('Y-m-d',strtotime($request->date_of_birth)));
        User::where('user_id', $request->user_id)->update($data);

        CustomerR::create([
            'user_id'=>$request->user_id,
            'requirement_id'=>$request->requirement_id,
            'ip_address'=>$ip,
            'device_info'=>$user_agent,
            'browser_info'=>$user_agent
        ]);
        $user = User::where('user_id', $request->user_id)->first();
        $data['url']=route('email_verification',['id' => Crypt::encryptString($request->user_id)]);
        Mail::send('template/registration_mail', $data, function ($message) use ($data) {
            $message->from('noreply@dev.credittriangle.com', 'rudram');
            $message->to($data['email_id'])->subject('Welcome Creditlink');
        });
        return response()->json(array('status'=>true,'message'=>'Successfully User details','body'=>compact('user')));  
    }

    public function email_verification(Request $request) {
        $user = User::where('user_id', $request->user_id)->first();
        if($user->email_verified==0){
            $data=array('first_name'=>$user->first_name,'last_name'=>$user->last_name,'email_id'=>$user->email_id);
            $data['url']=route('email_verification',['id' => Crypt::encryptString($request->user_id)]);
            Mail::send('template/email_verification', $data, function ($message) use ($data) {
                $message->from('noreply@dev.credittriangle.com', 'rudram');
                $message->to($data['email_id'])->subject('Welcome Creditlink');
            });
            return response()->json(array('status'=>true,'message'=>'Successfully Send Email')); 
        }
        else{
            return response()->json(array('status'=>false,'message'=>'Email Already Verified')); 
        }
        
    }

    public function email_verification_link(Request $request, $id) {
        $user_id = Crypt::decryptString($id);
        $user = User::where('user_id', $user_id)->first();
        if($user->email_verified==1){
            return redirect('http://dev.credittriangle.com/?email_verification=already');
        }else{
            User::where('user_id', $user_id)->update(array('email_verified'=>true,'email_verified_at'=>now()));
            return redirect('http://dev.credittriangle.com/?email_verification=yes');
        }
        
    }

    /*Update User Profile */

    public function update_profile(Request $request){
        $data=array('first_name'=>$request->first_name,'last_name'=>$request->last_name,'email_id'=>$request->email_id,
        'pin_code'=>$request->pin_code,'pan_number'=>$request->pan_number,'date_of_birth'=>date('Y-m-d',strtotime($request->date_of_birth)));
        User::where('user_id', $request->user_id)->update($data);
        $user = User::where('user_id', $request->user_id)->first();
        return response()->json(array('status'=>true,'message'=>'Successfully User details','body'=>compact('user')));  
    }
    

    /* Save Contact Us */
    public function contact_us(Request $request){
        $ip= $request->ip();
        $user_agent= $request->header('User-Agent');
        ContactUs::create([
            'first_name'=>$request->first_name,
            'last_name'=>$request->last_name,
            'email_id'=>$request->email_id,
            'mobile_number'=>$request->mobile_number,
            'reason'=>$request->reason,
            'message'=>$request->message,
            'ip_address'=>$ip,
            'device_info'=>$user_agent
        ]);
        return response()->json(array('status'=>true,'message'=>'Successfully Send Message'));  
    }

    /* Save Email Subscription */
    public function email_subscription(Request $request){
        $emails = EmailSubscription::where('email_id', $request->email_id)->first();
        if(!$emails){
            EmailSubscription::create(['email_id'=>$request->email_id]);
            return response()->json(array('status'=>true,'message'=>'Subscription Successfully Added')); 
        }
        else{
            return response()->json(array('status'=>false,'message'=>'Email Address Already Added')); 
        }  
    }
    
      public function getcustomer_requirements(){
              
           
            $users = CustomerR::select('*')
                     ->join("users", "users.user_id", "=", "customer_requirements.cust_req_id")
                     ->join("requirements_list", "requirements_list.requirement_id", "=", "customer_requirements.cust_req_id")
                     ->groupBy('customer_requirements.requirement_id','customer_requirements.user_id','customer_requirements.cust_req_id')
                      ->get();
          return response()->json($users);
      }
    

    
    
    
}

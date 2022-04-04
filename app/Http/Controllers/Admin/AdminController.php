<?php
  
namespace App\Http\Controllers\Admin;
  
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;
use App\Models\User;
use App\Models\SignIn;
use App\Models\Settings;
use Illuminate\Support\Facades\DB;
use Hash;
  
class AdminController extends Controller
{
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function index()
    {
        return view('auth.login');
    }  
      
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function registration()
    {
        return view('auth.registration');
    }
     public function location()
    {
        return view('location.blade.php');
    }
     public function pettype()
    {
        return view('pettype.blade.php');
    }
    public function petsize()
    {
        return view('petsize.blade.php');
    }
    public function users()
    {
        return view('users.blade.php');
    }
    public function payments()
    {
        return view('payments.blade.php');
    }
    public function enquiries()
    {
        return view('enquiries.blade.php');
    }
    public function customer_requirement()
    {
        return view('customer_requirement.blade.php');
    }
    public function services()
    {
        return view('services.blade.php');
    }
    public function requirement()
    {
        return view('requirement.blade.php');
    }
    
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function adminLogin(Request $request)
    {

		$result_orders = [];
	$request->validate([
        'email_id' => 'required|email|max:50',
        'password' => 'required|min:6'
   ]);
       /* $request->validate([

            'email_id' => 'required',
            'password' => 'required',
        ]);*/
   
        $credentials = $request->only('email_id', 'password');
        if ( Auth::attempt(array('email_id' => $request->email_id, 'password' => $request->password), true) ) {
            $user = User::select('first_name', 'last_name','role_id','email_id')->where('email_id',$request->email_id)->get();
			$sql ="SELECT m.menu_name,b.*  FROM `menu_name` m inner join user_access b on b.menu_id=m.id where b.read=1 and b.roles_id=".$user[0]->role_id;
			$permission = DB::select($sql);
			$menus     = DB::select("
			SELECT group_concat(m.menu_name) as menu 
			FROM `menu_name` m 
			inner join user_access b on b.menu_id=m.id 
			where b.read=1 and b.roles_id=".$user[0]->role_id);
			//print_r($menus [0]);exit;
            if($user[0]->email_id!=null || $user[0]->email_id!=""){
				
                Session::put('permission', $permission);
				Session::put('user', $user[0]);
				Session::put('menus', $menus);
				//print_r(Session::get('user') ); exit;
				
                return redirect()->intended('dashboard')
                        ->withSuccess('You have Successfully loggedin');
			}
			else{
					return redirect()->intended('login')
					->withSuccess('Invalid credentials entered');
				}
            }
        else{
        return redirect()->intended('login')
        ->withSuccess('Invalid credentials entered');
        } 
        //return redirect("login")->withErrors('Oppes! You have entered invalid credentials');
    }
		
      
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function postRegistration(Request $request)
    {  
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6'
        ]);
           
        $data = $request->all();
        //$check = this->($data);
         
        return redirect("dashboard")->withSuccess('Great! You have Successfully loggedin');
    }
    
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function dashboard()
    {
        if(Auth::check()){
            return view('dashboard');
        }
  
        return redirect("login")->withSuccess('Opps! You do not have access');
    }
    
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function create(array $data)
    {
      return User::create([
        'name' => $data['name'],
        'email' => $data['email'],
        'password' => Hash::make($data['password'])
      ]);
    }
    public function fileUpload(Request $request)
    {
       // echo '111';exit;
         if($request->file('uploadfile')){
             $url  = \Request::url();
             $url.
                 $file2 = $request->file('uploadfile')->store('public/images/upload');
                 if($file2)
                 {
                      return response()->json(array('status'=>true,'message'=>'file uploaded successfully','data'=>array('file_path'=>env('APP_URL').'/storage/app/'.$file2)),200,[],JSON_NUMERIC_CHECK);
                 }
                 else
                 {
                   return response()->json(array('status'=>false,'data'=>[],'message'=>'Token is Expired'),200,[],JSON_NUMERIC_CHECK);  
                 }
         }
    }
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function logout() {
        Session::flush();
        Auth::logout();
  
        return Redirect('/login');
    }
	public function signinVerify(Request $request){
		$existyMail	=	SignIn::where('email',$request->email)->count();
		if($existyMail>0)
		{
			return response()->json(['status'=>501,'result'=>'error update user']);
		}
		$request->validate([
		'full_name' => 'required|max:50',
        'email' => 'required|email|max:50',
        'password' => 'required|max:50'
   ]);
         $insert=SignIn::create([
            'name' =>$request->full_name,
            'email' =>$request->email,
			'password' =>$request->password]);
        if($insert){
            return Redirect('/login');
        }else{
               
              return response()->json(['result'=>'failed']);
        }
    }
}
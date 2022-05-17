<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Cookie;
use Symfony\Component\HttpFoundation\Session\Session;

class UserController extends Controller
{
    public function __construct()
    {
      
        $this->middleware('isadmin')->only('admindashboard');
        $this->middleware('isuser')->only('userdashboard');
    }


    public function store(Request $request)
    {
         $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
            'phone' => 'required|min:11',
        ]);
           
      $data = $request->all();
         $data['password'] = Hash::make($request->get('password'));
           $data['Dob'] = $request->get('date');
         User::create($data);

         return redirect()->to('login')->with('You Have Successfully Registered');
     
         
     

    }
      public function login(Request $request )
    {
        $email=$request->email;
        $password=$request->password;
       // $rememberme=$request->has('rememberme')? true:false;
        if($request->rememberme===null){
                setcookie('email',$request->email,100);
                setcookie('password',$request->password,100);
             }
             else{
                setcookie('email',$request->email,time()+60*60*24*100);
                setcookie('password',$request->password,time()+60*60*24*100);
 
             }
        if(Auth::attempt(['email'=>$email,'password'=>$password]))
        {
             
            if(Auth::user()->role==1)
            { 
              
              
                  $request->session()->put('email', $email);
                     
    	$request->session()->put('password', $password);
        
              
                 return redirect()->intended('admindashboard');
            }
            else if(Auth::user()->role==0)
            {
               
                $request->session()->put('email', $email);
                     
    	$request->session()->put('password', $password);
                 return redirect()->intended('userdashboard');

            }
           
        }
        return redirect()->intended('login');
    }



        public function index()
    {
     
   
       return view('welcome');
    }
    public function adminprofile()
    {
     
   
      return view('Admin.adminprofile');
    }
       public function userprofile()
    {
     
   
      return view('User.userprofile');
    }
    public function updateprofile($id)
    {
     
   
      return view('Admin.profile');
    }
      

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('add');
    }

   
     public function signup()
    {
        return view('signup');
    }
    public function loginview()
    {
        
         return view('login');
    }

    public function logout()
    {
        Auth::logout();
        session()->flush();
        return redirect()->to('login');
    }
    public function admindashboard()
    {
        
         return view('Admin.admindashboard');
    }
     public function userdashboard()
    {
        
         return view('User.userdashboard');
    }
     



    public function userview()
    {
     $users = DB::table('users')->where('role', '0')->get();
      $admins = DB::table('users')->where('role', '1')->get();
       
   
       return view('Admin.userview', compact('users','admins'));
    }
    
    public function edituser($id)
    {
   
        $users= User::find($id);
   
       return view('Admin.edituser', compact('users'));
    }
    public function updateuser(Request $request,  $id)
    {
    $users=User::find($id);
         $users->name=$request->has('name')?$request->get('name'):'';
         $users->email=$request->has('email')?$request->get('email'):'';
          $users-> phone=$request->has('phone')?$request->get('phone'):'';
          // $users['password'] = Hash::make($request->get('password'));
          $users-> gender=$request->has('gender')?$request->get('gender'):'';
            $users->Dob=$request->has('date')?$request->get('date'):'';
               $users->country=$request->has('country')?$request->get('country'):'';
$users->update();
     return redirect('userview')->with('status','Succesfully Upload');
    }
    public function deleteuser($id)
    {
   
        $users= User::find($id);
        $users->delete();
   
      return redirect()->back()->with('status','Deleleted Successfully');
    }
     public function profileupdate()
    {
         
       
        return view('Admin.profileupdate');
        
    }
    public function profileupdate1(Request $request)
    {
         $userid=Auth::user()->id;
   
         $users=User::findorfail($userid);
         $users->name=$request->input('name');
           $users->email=$request->input('email');
          
           
           
         $users->update();
         return redirect()->to('profile');
          
       
     
        
    }
    
     public function userprofileupdate()
    {
         
       
        return view('User.profileupdate');
        
    }
    public function userprofileupdate1(Request $request)
    {
         $userid=Auth::user()->id;
   
         $users=User::findorfail($userid);
         $users->name=$request->input('name');
           $users->email=$request->input('email');
          
           
           
         $users->update();
         return redirect()->to('userprofile');
          
       
     
        
    }


        public function changepass()
        {  return view('Admin.changepassword');

        }
    public function changepassword(Request $request)

    {
    
       $userid=Auth::user()->id;
                $users=User::findorfail($userid);
        $users['password'] = Hash::make($request->get('password'));
           $users->update();
         return redirect()->to('profile');

    }

     

}

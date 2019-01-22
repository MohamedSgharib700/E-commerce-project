<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Role;
use Auth;
use App\CommercialUsers;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use App\Jobs\SendVerificationEmail;
use Mail;
use App\Nail\EmailVerification;
use App\Http\Requests;
use DB;
use Hash;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Support\MessageBag;
use Twilio\Rest\Client;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/after-register';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'phone' => 'required|numeric',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        
           
           
         
        return User::create([
            'name' => $data['name'],
            'phone' => $data['phone'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'email_token' => base64_encode($data['email']),
            
        ]);
        // // $data['password'] = bcrypt($data['password']);
        // $user = User::create($data);
        // $role = Role::whereSlug('user')->first();
        // $user->roles()->attach($role);
        // return $user;
    }
    public function app(User $user)
    {
        
        return view('layouts.app', compact('$user'));
    }
    
    public function personalEditUser()
    {
       $user = User::where(id , Auth::user()->id)->first();
       
        return view('users.personalUserEdit', compact('user'));
       
    }
    
    public function userPersonalUpdate(Request $request , User $user)
    {
        //$this->validate($request , ['image'=>'image','des'=>'required' ]);
        $user = User::where('id',$user)->first();
      if ($request->hasFile('image')) {
        $file = $request->file('image');
        $imageName = time().'.'.$file->getClientOriginalName();
        $file->move(public_path('imagesProfile'), $imageName);
        $user-> profile_picture = $imageName;
         }

      $user->name = $request->name;
      $user->email = $request->email;
      $user->password = $request->password;
      
      
      $user ->update();
       return redirect('services_show');
    }
    
    
    public function register(Request $request)
    {   
        $this->validator($request->all())->validate();
        event(new Registered($user = $this->create($request->all())));
        dispatch(new SendVerificationEmail($user));
        return view('verification');
        // Auth::login($user);
        // return view('messageconfirmation');
    }
    /**
   * Handle a registration request for the application.
   *
   * @param $token
   * @return \Illuminate\Http\Response
   */
   public function verify($token)
   {
       $user = User::where('email_token',$token)->first();
       $user->verified = 1;
       if($user->save()){
           return view('emailconfirm',['user'=>$user]);
       }
   }
    public function showRegistrationForm()
    {
        return view('auth.preregister');
    }
    public function showUserRegistrationForm()
    {
        return view('auth.register');
    }

}

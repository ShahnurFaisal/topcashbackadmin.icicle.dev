<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Hash;


class AdminAuthController extends Controller
{
    public function adminRegister()
    {
        return view('backend.admin.registration');
    }
    public function register()
    {
        $this->validate(request(), [
            'name' => 'required',
            'email' => 'required|unique:users,email',
            'password' => 'required|min:7',
            'confirm_password' => 'required|same:password|min:7',
        ]);

        Admin::create([
            'name' => request('name'),
            'email' => request('email'),
            'password' => bcrypt(request('password')),
            // 'confirm_password' => bcrypt(request('confirm_password')),
        ]);
        return to_route('dashboard');
    }
    public function showLogin()
    {
        return view('backend.admin.login');
    }
    public function login()
    {
        $this->validate(request(), [
            'email' => 'required|unique:users,email',
            'password' => 'required|min:7'
        ]);

        if (Auth::guard('admin')->attempt([
            'email' => request('email'),
            'password' => request('password'),
        ])) {
            return redirect('/dashboard');
        } else {
            return 'credential not matched';
        }
    }
    public function logout(){
        Auth::guard('admin')->logout();
        return to_route('showLogin');
    }

    //reset password
    public function showForgotForm(){
        return view('backend.admin.forgot');
    }

    public function sendResetLink(Request $request){
        $request->validate([
            'email'=>'required|email|exists:admins,email'
        ]);

        $token = Str::random(64);
        DB::table('password_reset_tokens')->insert([
              'email'=>$request->email,
              'token'=>$token,
              'created_at'=>Carbon::now(),
        ]);

        $action_link = route('reset.password.form',['token'=>$token,'email'=>$request->email]);
        $body = "We are received a request to reset the password for <b>Your app Name </b> account associated with ".$request->email.". You can reset your password by clicking the link below";

       Mail::send('email-forgot',['action_link'=>$action_link,'body'=>$body], function($message) use ($request){
             $message->from('noreply@example.com','Your App Name');
             $message->to($request->email,'Your name')
                     ->subject('Reset Password');
       });

       return back()->with('success', 'We have e-mailed your password reset link!');
   }
   public function showResetForm(Request $request, $token = null){
    return view('backend.admin.reset')->with(['token'=>$token,'email'=>$request->email]);
}
 public function resetPassword(Request $request){
        $request->validate([
            'email'=>'required|email|exists:admins,email',
            'password'=>'required|min:7|confirmed',
            'password_confirmation'=>'required',
        ]);

        $check_token = DB::table('password_reset_tokens')->where([
            'email'=>$request->email,
            'token'=>$request->token,
        ])->first();

        if(!$check_token){
            return back()->withInput()->with('fail', 'Invalid token');
        }else{

            User::where('email', $request->email)->update([
                'password'=>Hash::make($request->password)
            ]);

            DB::table('password_reset_tokens')->where([
                'email'=>$request->email
            ])->delete();

            return redirect()->route('showLogin')->with('info', 'Your password has been changed! You can login with new password')->with('verifiedEmail', $request->email);
        }
    }
}

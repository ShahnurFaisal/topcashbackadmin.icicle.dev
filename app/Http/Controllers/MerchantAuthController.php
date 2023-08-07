<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Merchant;

class MerchantAuthController extends Controller
{
    public function showRegister()
    {
        return view('backend.merchant.register');
    }
//  public function register(){
//         $this->validate(request(),[
//             'merchant_name' => 'required',
//             'merchant_email' => 'required|unique:users,merchant_email',
//             'merchant_password' => 'required|min:7',
//             'merchant_confirm_password' => 'required|same:merchant_password|min:7',
//         ]);

//         Merchant::create([
//             'merchant_name' => request('namerchant_nameme'),
//             'merchant_email' => request('merchant_email'),
//             'merchant_password' => bcrypt(request('merchant_password')),
//             'merchant_confirm_password' => bcrypt(request('merchant_confirm_password')),
//         ]);
//         return to_route('dashboard');
//     }
   


    // public function showLoginMerchant(){
    //     return view('backend.merchant.login');
    // }
    // public function loginMerchant(){
    //     $this->validate(request(),[
    //         'merchant_email' => 'required|unique:Merchant,merchant_email',
    //         'merchant_confirm_password' => 'required|min:7'
    //     ]);

    //     if (Auth::guard('merchant')->attempt([
    //         'merchant_email' => request('merchant_email'),
    //         'merchant_confirm_password' => request('merchant_confirm_password'),
    //     ])) {
    //          return to_route('dashboard');
    //     } else {
    //         return 'credential not matched';
    //     }
    // }

    //logout
    // public function logout(){
    //         Auth::guard('merchant')->logout();
    //         return to_route('merchant.showLogin');

    // }
}

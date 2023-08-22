<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Financial;
use App\Models\Admin;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Services\CommissionService;
use DB;

class CommissionController extends Controller
{
    //

    public function showCommission(){
        $financial = Financial::all();
        $user = User::all();
        $admin = Admin::all();
        return view('backend.commission.commission',compact('financial','user','admin'));
    }

    public function calculateAndDistributeCommission(Request $request)
    {


        // Create a transaction record
        // $transaction = new Financial([
        //     'balance' => request('balance'),
        //     'user_id' => request('user_id'), // Associate with the user who initiated the transaction
        //     'merchant_id' => request('merchant_id'), // Associate with the merchant
        // ]);
        // $transaction->save();
        $financial = new Financial();
        $financial->balance= $request->balance;
        $financial->user_id= $request->user_id;
        $financial->admin_id= $request->admin_id;
        $financial->save();
        // Update user and admin balances

        // $totalCommission = Financial::where('id',$request->balance)->get(); //


        $totalCommission = (float)$request->balance;

        $userCommission =  (float)$totalCommission * 0.80; // User gets 8%
        $adminCommission =  (float)$totalCommission * 0.20; // Admin gets 2%

        $userID = Auth::id();


        // Update the user's balance
        if ($userID) {
            $user = User::find($userID);
            $user->balance += $userCommission; // Assuming $userCommission holds the updated balance
            $user->save();
        }
        // Get the currently authenticated admin user's ID
        $adminID = Auth::guard('admin')->user()->id;

        // Update admin's balance
        if ($adminID) {
            $admin = Admin::find($adminID);
            $admin->balance += $adminCommission; // Assuming $adminCommission holds the updated balance
            $admin->save();
        }
        return back()->with('message','Commission Distribution Successfully');
        // Update admin balance (you need to fetch admin user appropriately)
        // $admin = new Auth::guard('admin');
        // $admin->balance = $adminCommission;
        // $admin->save();
    }
}

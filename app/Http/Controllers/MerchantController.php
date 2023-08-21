<?php

namespace App\Http\Controllers;

use App\Models\Merchant;
use App\Models\Offer;
use Illuminate\Http\Request;

class MerchantController extends Controller
{
    //merchant
    public function merchant(){
        $merchant = Merchant::latest()->paginate(10);
        return view('backend.merchant.merchant',compact('merchant'));
    }
    // edit merchant
    public function editMerchant($id){
        $merchant = Merchant::find($id);
        $offer = Offer::all();
        return view('backend.merchant.edit-merchant',compact('merchant','offer'));
    }
    // update merchant
    public function updateMerchant(Request $request){
        $request->validate([
           'merchant_name' =>'required',
           'merchant_number' =>'required',
           'merchant_email' =>'required',
           'offer_id' =>'required',
        ]);
        $merchant = Merchant::find($request->merchant_id);
        $merchant->merchant_name= $request->merchant_name;
        $merchant->merchant_number= $request->merchant_number;
        $merchant->merchant_email= $request->merchant_email;
        $merchant->offer_id= $request->offer_id;
        $merchant->save();
        return redirect('/merchant')->with('message','Merchant Update Successfully');
    }
    // delete merchant
    public function deleteMerchant($id){
        $merchant = Merchant::find($id);
        $merchant->delete();
        return back()->with('message','Merchant Delete Successfully');
    }
    // add merchant
    public function addMerchant(){
        $offer = Offer::all();
        return view('backend.merchant.add-merchant',compact('offer'));
    }
    // save merchant
    public function saveMerchant(Request $request){
        $request->validate([
            'merchant_name' =>'required',
            'merchant_number' =>'required|unique:merchants,merchant_number',
            'merchant_email' =>'required|unique:merchants,merchant_email',
            'offer_id' =>'required',
            'merchant_password' => 'required'
        ]);
        $merchant=Merchant::create([
            'merchant_name' =>\request('merchant_name'),
            'merchant_number' =>\request('merchant_number'),
            'merchant_email' =>\request('merchant_email'),
            'offer_id' =>\request('offer_id'),
            'merchant_password' => bcrypt(request('merchant_password'))

        ]);
        return to_route('merchant',compact('merchant'))->with('message','Merchant Created Successfully');
    }
}

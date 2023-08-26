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
           'company_name' =>'required',
        ]);
        $merchant = Merchant::find($request->merchant_id);
        $merchant->merchant_name= $request->merchant_name;
        $merchant->merchant_number= $request->merchant_number;
        $merchant->merchant_email= $request->merchant_email;
        $merchant->address= $request->address;
        $merchant->company_name= $request->company_name;
        $merchant->latitude= $request->latitude;
        $merchant->longitude= $request->longitude;
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
            'company_name' =>'required',
            'merchant_password' => 'required'
        ]);
        // $geocodeResponse ="AIzaSyCvHVy94prufBugVVNeUPnxOeHFnZXwT1o";

        // $geocodeResponseArray = json_decode($geocodeResponse, true); // Perform geocoding using a service like Google Maps API

        // if ($geocodeResponse['status'] === 'OK') {
        //     $latitude = $geocodeResponse['results'][0]['geometry']['location']['lat'];
        //     $longitude = $geocodeResponse['results'][0]['geometry']['location']['lng'];
        // } else {
        //     $latitude = null;
        //     $longitude = null;
        // }
        // try {
        //     $address = $request->address;
        //     $result = app('geocoder')->geocode($address)->get();

        //     $lat = null;
        //     $long = null;

        //     if (!empty($result)) {
        //         if (isset($result[0])) {
        //             $coordinates = $result[0]->getCoordinates();
        //             $lat = $coordinates->getLatitude();
        //             $long = $coordinates->getLongitude();
        //         } else {
        //             echo "error: No result found";
        //         }
        //     } else {
        //         echo "error: Empty geocoding result";
        //     }

        //     // Rest of the code to save the merchant data
        // } catch (\Exception $e) {
        //     echo "Geocoding error: " . $e->getMessage();
        // }

        $merchant=Merchant::create([
            'merchant_name' =>\request('merchant_name'),
            'merchant_number' =>\request('merchant_number'),
            'merchant_email' =>\request('merchant_email'),
            'address' =>\request('address'),
            'company_name' =>\request('company_name'),
            'merchant_password' => bcrypt(request('merchant_password')),
            'latitude' => \request('latitude'),
            'longitude' => \request('longitude'),

        ]);
        return to_route('merchant',compact('merchant'))->with('message','Merchant Created Successfully');
    }
}

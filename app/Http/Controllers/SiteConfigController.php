<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Carbon\Carbon;

class SiteConfigController extends Controller
{
    // site info
    public function siteInfo(){
        return view('backend.siteConfig.site-info');
    }
    public function siteInfoPost(Request $request){
        $request->validate([
            'company_name' => 'nullable',
            'email' => 'nullable',
            'logo' => 'nullable',
            'short_description' => 'nullable',
            'service_charge' => 'nullable',
        ]);

        update_static_option('company_name', $request->company_name);
        update_static_option('email', $request->email);
        update_static_option('logo', $request->logo);
        update_static_option('short_description', $request->short_description);
        update_static_option('service_charge', $request->service_charge);

        if($request->hasFile('logo')){
            update_static_option('logo',file_uploader('uploads/logo/', $request->logo, Carbon::now()->format('Y-m-d H-i-s-a') .'-'. Str::random(8)));

          }
          if($request->hasFile('offer_image')){
            update_static_option('offer_image',file_uploader('uploads/offer_image/', $request->offer_image, Carbon::now()->format('Y-m-d H-i-s-a') .'-'. Str::random(8)));

          }
          return back()->with('success','Successfully updated');

    }
}

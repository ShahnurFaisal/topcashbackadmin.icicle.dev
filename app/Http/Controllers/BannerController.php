<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use App\Models\Slider;
use Illuminate\Http\Request;

class BannerController extends Controller
{
    //banner
    public function banner(){
        $banner = Banner::latest()->get();
        return view('backend.siteConfig.banner.banner',compact('banner'));
    }
    //add banner
    public function addBanner(){
        return view('backend.siteConfig.banner.add-banner');
    }
    // store banner
    public function storeBanner(Request $request){
        $request->validate([
            'banner_position'=>'required',
            'banner_image'=>'nullable',
        ]);
        $banner = new Banner();
        $banner->banner_position = $request->banner_position;
        if ($request->file('banner_image')){
            $banner->banner_image = $this->makeImage($request);
        }
        $banner->save();
        return to_route('banner')->with('message','Banner Store Successfully');
    }
    // image
    private function makeImage($request){
        $image = $request->file('banner_image');
        $imageName = rand().'.'.$image->getClientOriginalExtension();
        $directory = 'admin/assets/banner-image/';
        $imageUrl = $directory.$imageName;
        $image->move($directory,$imageName);
        return $imageUrl;
    }
    // banner edit
    public function editBanner($id){
        $banner = banner::find($id);
        return view('backend.siteConfig.banner.edit-banner',compact('banner'));
    }
    // delete banner
    public function deleteBanner($id){
        $banner = Banner::find($id);
        if ($banner->banner_image){
            unlink($banner->banner_image);
        }
        $banner->delete();
        return back()->with('message','Banner Deleted Successfully');
    }
    // update banner
    public function updateBanner(Request $request){
        $request->validate([
            'banner_position'=>'required',
            'banner_image'=>'nullable',
        ]);
        $banner = Banner::find($request->banner_id);
        $banner->banner_position = $request->banner_position;
        if ($request->file('banner_image')){
            $banner->banner_image = $this->makeImage($request);
        }
        $banner->save();
        return to_route('banner')->with('message','Banner Store Successfully');
    }

}

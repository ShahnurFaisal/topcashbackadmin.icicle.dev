<?php

namespace App\Http\Controllers;

use App\Models\Slider;
use Illuminate\Http\Request;

class SliderController extends Controller
{
    //slider
    public function slider(){
        $slider = Slider::latest()->get();
        return view('backend.siteConfig.slider.slider',compact('slider'));
    }
    // add slider
    public function addSlider(){
        return view('backend.siteConfig.slider.add-slider');
    }
    // store slider
    public function storeSlider(Request $request){
        $request->validate([
           'position'=>'required',
           'image'=>'nullable',
        ]);
        $slider = new Slider();
        $slider->position = $request->position;
        if ($request->file('image')){
            $slider->image = $this->makeImage($request);
        }
        $slider->save();
        return to_route('slider')->with('message','Slider Store Successfully');
    }
    // image
    private function makeImage($request){
        $image = $request->file('image');
        $imageName = rand().'.'.$image->getClientOriginalExtension();
        $directory = 'admin/assets/slider-image/';
        $imageUrl = $directory.$imageName;
        $image->move($directory,$imageName);
        return $imageUrl;
    }
    // edit slider
    public function editSlider($id){
        $slider = Slider::find($id);
        return view('backend.siteConfig.slider.edit-slider',compact('slider'));
    }
    // update slider
    public function updateSlider(Request $request){
        $request->validate([
            'position'=>'required',
            'image'=>'nullable',
        ]);
        $slider = Slider::find($request->slider_id);
        $slider->position = $request->position;
        if ($request->file('image')){
            $slider->image = $this->makeImage($request);
        }
        $slider->save();
        return to_route('slider')->with('message','Slider Updated Successfully');
    }
    // delete slider
    public function deleteSlider($id){
        $slider = Slider::find($id);
        if ($slider->image){
            unlink($slider->image);
        }
        $slider->delete();
        return back()->with('message','Slider Deleted Successfully');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Module;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ModuleController extends Controller
{
    //module
    public function module(){
        $module = Module::latest()->paginate(10);
        return view('backend.module.module',compact('module'));
    }
    // add module
    public function addModule(){
        return view('backend.module.add-module');
    }
    // store module
    public function storeModule(Request $request){
        $request->validate([
            'module_name'=>'required|max:200|unique:modules'
        ]);
        $module = new Module();
        $module->module_name =$request->module_name;
        $module->slug = Str::slug($request->module_name, '-');
        $module->save();
        return redirect('/module')->with('message','Module Add Successfully');
    }
    // edit module
    public function editModule($id){
        $module = Module::find($id);
        return view('backend.module.edit-module',compact('module'));
    }
    // update module

    public function updateModule(Request $request){
        $request->validate([
            'module_name'=>'required|max:200'
        ]);
        $module = Module::find($request->module_id);
        $module->module_name =$request->module_name;
        $module->slug = Str::slug($request->module_name, '-');
        $module->save();
        return redirect('/module')->with('message','Module Updated Successfully');
    }
    // delete module
    public function deleteModule($id){
        $module = Module::find($id);
        $module->delete();
        return back()->with('message','Module Deleted Successfully');
    }
}

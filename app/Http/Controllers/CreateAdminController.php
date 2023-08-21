<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AdminCreate;
class CreateAdminController extends Controller
{
    public function adminList(){
        $list=AdminCreate::latest()->paginate(10);
        return view('backend.createAdmin.adminList',compact('list'));
    }

    public function createAdmin(){
        return view('backend.createAdmin.createAdmin');
    }
    public function adminCreate(){
        $this->validate(request(),[
            'name' => 'required',
            'email' => 'required|email',
            'mobile' => 'required',
            'password' => 'required',
            'image' => 'required|mimes:jpg,jpeg,png',
            'user_role' => 'required',
        ]);
        $imageExtension = request()->file('image')->extension();
        $imageName = "photo_".uniqid()."_".time().".".$imageExtension;
        request()->file('image')->move('images',$imageName);


        AdminCreate::create([
            'name' => request('name'),
            'email' => request('email'),
            'mobile' => request('mobile'),
            'password' => bcrypt(request('password')),
            'image' => $imageName,
            'user_role' => request('user_role')
        ]);
        return to_route('adminList');
    }
    public function showEditAdmin($id){
        $test = AdminCreate::find($id);
        return view('backend.createAdmin.editAdmin',compact('test'));
    }
    public function editAdmin($id){

        $this->validate(request(),[
            'name' => 'required',
            'email' => 'required|email',
            'mobile' => 'required',
            'password' => 'required',
            'image' => 'required|mimes:jpg,jpeg,png',
            'user_role' => 'required',
        ]);
        $imageExtension = request()->file('image')->extension();
        $imageName = "photo_".uniqid()."_".time().".".$imageExtension;
        request()->file('image')->move('images',$imageName);
        $test = AdminCreate::find($id);
        $test->update([
            'name' => request('name'),
            'email' => request('email'),
            'mobile' => request('mobile'),
            'password' => bcrypt(request('password')),
            'image' => $imageName,
            'user_role' => request('user_role')
        ]);
        return redirect()->route('adminList');

    }
    public function deleteAdmin($id){
        AdminCreate::findOrFail($id)->delete();
        return redirect()->back();
    }
}

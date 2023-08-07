<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class RoleController extends Controller
{
    //role
    public function role(){
        $role = Role::latest()->paginate(10);
        return view('backend.role_permission.role',compact('role'));
    }
    // add role blade
    public function addRole(){
        return view('backend.role_permission.add-role');
    }
    // store role
    public function storeRole(Request $request){
        $request->validate([
           'role_name'=>'required|max:200|unique:roles'
        ]);
       $role = new Role();
        $role->role_name =$request->role_name;
        $role->slug = Str::slug($request->role_name, '-');
        $role->save();
        return redirect('/role')->with('message','Role Add Successfully');
    }
    // edit role
    public function editRole($id){
        $role = Role::find($id);
        return view('backend.role_permission.edit-role',compact('role'));
    }
    // update role
    public function updateRole(Request $request){
        $request->validate([
            'role_name'=>'required|max:200'
        ]);
        $role = Role::find($request->role_id);
        $role->role_name =$request->role_name;
        $role->slug = Str::slug($request->role_name, '-');
        $role->save();
        return redirect('/role')->with('message','Role Updated Successfully');
    }
    // delete role
    public function deleteRole($id){
        $role = Role::find($id);
        $role->delete();
        return back()->with('message','Role deleted Successfully');
    }
}

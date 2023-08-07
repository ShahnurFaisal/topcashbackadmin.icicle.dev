<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use PDF;
use App\Exports\UsersExport;
use Maatwebsite\Excel\Facades\Excel;

class CustomerController extends Controller
{
    public function customer(){
        $user = User::latest()->get();
        return view('backend.customer.customer',compact('user'));
    }
    // customer edit
    public function editCustomer($id){
        $users = User::find($id);
        return view('backend.customer.edit-customer',compact('users'));
    }
    // customer update
    public function updateCustomer(Request $request){
        $request->validate([
            'name'=>'required',
            'phone'=>'required',
            'email'=>'required|email',
            'address'=>'required|max:200',
            'payment_information'=>'required',
        ]);

        $users = User::find($request->customer_id);
        $users->name= $request->name;
        $users->phone= $request->phone;
        $users->email= $request->email;
        $users->address= $request->address;
        $users->payment_information= $request->payment_information;
        $users->save();
        return to_route('customer')->with('message','Customer Update Successfully');
    }
    //delete customer 
    public function deleteCustomer($id){
        $users = User::find($id);
        $users->delete();
        return back()->with('message','Customer Deleted Successfully');
    }
    // PDF Customer
    public function pdfCustomer(){
        $user = User::latest()->get();
        $pdf = PDF::loadView('backend.customer.pdf.customer-invoice',[
            'user'=>$user
        ]);
        return $pdf->download('customer-invoice.pdf');
    }
    // Print Customer
    public function printCustomer(){
        $user = User::latest()->get();
        return view('backend.customer.print-customer',compact('user'));
    }
    // Excel customer
    public function excelCustomer(){
        //return Excel::download(new UsersExport, 'customer.csv', \Maatwebsite\Excel\Excel::CSV);

         return Excel::download(new UsersExport, 'users-data.xlsx');
    }
    // csv customer
    public function csvCustomer(){
        return Excel::download(new UsersExport, 'customer.csv', \Maatwebsite\Excel\Excel::CSV);
    }
}

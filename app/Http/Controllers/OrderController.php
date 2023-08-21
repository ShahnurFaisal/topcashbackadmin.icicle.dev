<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\User;
use PDF;

class OrderController extends Controller
{
    //order index
    public function order(){
        $order = Order::latest()->paginate(10);
        return view('backend.order.order',compact('order'));
    }
    // delete Order
    public function deleteOrder($id){
        $order = Order::find($id);
        $order->delete();
        return back()->with('message','Order Deleted Sucessfully');
    }
    // edit Order
    public function editOrder($id){
        $order = Order::find($id);
        $users = User::find($id);
        return view('backend.order.edit-order',compact('order','users'));
    }
    // Update Order
    public function updateOrder(Request $request){
        $order = Order::find($request->order_id);
        $order->quantity = $request->quantity;
        $order->order_date = $request->order_date;
        $order->total_price = $request->total_price;
        $order->save();
        return to_route('order')->with('message','Order Updated Successfully');
    }
    // pdf order
    public function pdfOrder(){
        $order = Order::latest()->get();
        $pdf = PDF::loadView('backend.order.pdf.invoice',[
            'order'=>$order,
        ]);
        return $pdf->download('invoice.pdf');
    }
}

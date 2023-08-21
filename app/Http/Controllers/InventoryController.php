<?php

namespace App\Http\Controllers;

use App\Models\Inventory;
use App\Models\Offer;
use Illuminate\Http\Request;
use PDF;

class InventoryController extends Controller
{
    public function inventory(){
        $inventory = Inventory::latest()->paginate(10);
        return view('backend.inventory.inventory',compact('inventory'));
    }
    // add Inventory
    public function addInventory(){
        $offer = Offer::latest()->get();
        return view('backend.inventory.add-inventory',compact('offer'));
    }
    // pdf download
    public function pdfInventory()
    {
        $pdf = PDF::loadView('backend.inventory.pdf.invoice');
        return $pdf->download('invoice.pdf');
    }
     // store inventory
    public function saveInventory(Request $request){
        $request->validate([
            'quantity'=>'required',
            'total_price'=>'required'
        ]);
        $inventory = new Inventory();
        $inventory->offer_id = $request->offer_id;
        $inventory->inventory_offer_percentage = $request->inventory_offer_percentage;
        $inventory->quantity = $request->quantity;
        $inventory->total_price = $request->total_price;
        $inventory->save();
        return to_route('inventory')->with('message','Inventory Added Successfully');
    }
   // edit Inventory
       public function editInventory($id){
           $inventory = Inventory::find($id);
           $Offer = Offer::latest()->get();
           return view('backend.inventory.edit-inventory',compact('inventory','Offer'));
       }
       // update inventory
    public function updateInventory(Request $request){
        $inventory = Inventory::find($request->id);
        $request->validate([
            'quantity'=>'required',
            'total_price'=>'required'
        ]);
        $inventory->offer_id = $request->offer_id;
        $inventory->inventory_product_price = $request->inventory_product_price;
        $inventory->quantity = $request->quantity;
        $inventory->total_price = $request->total_price;
        $inventory->save();
        return to_route('inventory')->with('message','Inventory Updated Successfully');
    }
    // delete inventory
    public function deleteInventory($id){
        $inventory = Inventory::find($id);
        $inventory->delete();
        return to_route('inventory')->with('message','Inventory Deleted Successfully');
    }
}

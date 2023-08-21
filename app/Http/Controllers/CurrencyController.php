<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Currency;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CurrencyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $currency = Currency::orderBy('id','DESC')->paginate(10);
        return view('backend.currency.index',compact('currency'));
    }

    /**
     * Show the form for creating a new resource.
     */
     // status
     public function currencyStatus(Request $request){
        if($request->mode == 'true'){
            DB::table('currencies')->where('id',$request->id)->update(['status'=>'active']);
        }else{
            DB::table('currencies')->where('id',$request->id)->update(['status'=>'inactive']);
        }
        return response()->json(['message'=>'Successfully Status Updated','status'=>true]);
     }

    public function addCurrency()
    {
        return view('backend.currency.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function storeCurrency(Request $request)
    {
        $this->validate($request,[
            'name' => 'required',
             'symbol' => 'required',
            'code' => 'required',
             'exchange_rate' => 'required',
         ]);
        $currency = new Currency();
        $currency->name=$request->name;
        $currency->symbol=$request->symbol;
        $currency->code=$request->code;
        $currency->exchange_rate=$request->exchange_rate;
        $currency->save();
        return redirect()->route('currency')->with('message','Successfully Currency Stored');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function editCurrency($id)
    {
        $currency = Currency::find($id);
        if($currency){
            return view('backend.currency.edit',compact('currency'));
        }else{
            return back()->with('error','Data Not found');
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function updateCurrency(Request $request,$id)
    {
        $currency = Currency::find($id);

        $this->validate($request,[
                   'name' => 'required',
                    'symbol' => 'required',
                   'code' => 'required',
                    'exchange_rate' => 'required',
                ]);
        $currency->name=$request->name;
        $currency->symbol=$request->symbol;
        $currency->code=$request->code;
        $currency->exchange_rate=$request->exchange_rate;
        $currency->save();
        return redirect()->route('currency')->with('message','Successfully Currency Updated');

        }
        public function deleteCurrency(string $id)
            {
                Currency::find($id)->delete();
                return back()->with('message','Currency deleted Successfully');
            }

        public function loadCurrency(Request $request){
            dd($request->all());
        }

    }

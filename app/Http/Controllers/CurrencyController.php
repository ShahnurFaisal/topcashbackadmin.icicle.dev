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
        $currency = Currency::orderBy('id','DESC')->get();
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

    public function create()
    {
        return view('backend.currency.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'name' => 'required',
            'symbol' => 'required',
            'code' => 'required',
            'exchange_rate' => 'required',
        ]);
        $data = $request->all();
        $status = Currency::create($data);
        if ($status) {
            return redirect()->route('currency.index')->with('message','Successfully Currency Updated');
        }else{
            return back()->with('message','Something went wrong!');
        }
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
    public function edit(string $id)
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
    public function update(Request $request, string $id)
    {
        $this->validate($request,[
            'name' => 'required',
            'symbol' => 'required',
            'code' => 'required',
            'exchange_rate' => 'required',
        ]);
        $data = $request->all();
        $status = Currency::create($data);
        if ($status) {
            return redirect()->route('currency.index')->with('message','Successfully Currency Updated');
        }else{
            return back()->with('message','Something went wrong!');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

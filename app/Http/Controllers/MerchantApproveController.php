<?php

namespace App\Http\Controllers;

use App\Models\Merchant;
use App\Models\Offer;
use App\Models\QRCode;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class MerchantApproveController extends Controller
{///show Approval
    public function showApprove(){
        $offer=Offer::latest()->get();
       $qrCode = QRCode::latest()->get();
        return view('backend.merchant.approved',compact('offer','qrCode'));
    }
    ///PostApproval
    public function approveOffer($imageId=NULL,$status=NULL){
        if (Auth::guard('admin')->check() && $imageId !=NULL && $status != NULL)
      {
        Offer::find($imageId)->update([
            'status'=>$status,
            'approved_id'=>$status == 'approved' ? Auth::guard('admin')->id() : NULL,

        ]);
        return redirect()->back();
      }else{
          return 'Invalid response';
      }
    }
}

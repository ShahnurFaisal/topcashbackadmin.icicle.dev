<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Merchant;
use App\Models\Offer;
use App\Models\QRCode;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class MerchantApproveController extends Controller
{///show Approval
    public function showApprove(){
        // $offerss=Offer::latest()->get();
    //    $qrCode = QRCode::latest()->get();

        $qrCode = QRCode::with('admins')->get();
        //qr_Show
//        $previousQRCodes = Auth::guard('admin')->user()->qrcodes;

        return view('backend.merchant.approved',compact('qrCode'));
    }
    ///PostApproval
    public function approveOffer($imageId=NULL,$status=NULL){
        if (Auth::guard('admin')->check() && $imageId !=NULL && $status != NULL)
      {
        $status=QRCode::find($imageId)->update([
            'status'=>$status,
            'approved_by'=>$status == 'approved' ? Auth::guard('admin')->id() : NULL,
            'approved_date'=>$status == 'approved' ? date('Y-m-d H-i-s') : NULL,

        ]);
        return redirect()->back();
      }else{
          return 'Invalid response';
      }
    }
    public function showApproveUpdate()
    {
        $qrCode = QRCode::with('admins')->get();
        $user = User::latest()->get();
        return view('backend.merchant.approved_update',compact('user','qrCode'));
    }
}

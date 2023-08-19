<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\QRCode;
use App\Mail\CashBackOfferQrCode;
use App\Models\Offer;
use Illuminate\Support\Facades\Mail;
use PDF;
use Illuminate\Support\Str;
use SimpleSoftwareIO\QrCode\Facades\QrCode as QrCodeGenerator; // Use an alias for the QrCode facade

class QRCodeController extends Controller
{
    public function showQRCodeGenerator()
    {
        if (!Auth::guard('admin')->check()) {
            // Handle the case when the user is not authenticated
            // For example, you can redirect them to the login page
            return redirect()->route('showLogin');
        }

        // Retrieve the authenticated user's previous QR codes
        $previousQRCodes = Auth::guard('admin')->user()->qrcodes;
        $user = User::latest()->get();
        // Return the view with the necessary data
        return view('backend.qrCode.qr_code_generator',
            [
                'previousQRCodes' => $previousQRCodes,
                'user'=>$user
            ]);

    }
    public function generateAndSendQRCode(Request $request)
    {
        // Generate a random QR code data
        $offerId = Offer::find('id');

        $randomString = Str::random(10);
        $qrCodeData = 'Random QR code data: ' . $randomString .$offerId;

        $qrCodeImage = QrCodeGenerator::size(100)->generate($qrCodeData);

        // Get the authenticated user's email
        $userEmail = Auth::guard('admin')->user()->email;
        $adminId = Auth::guard('admin')->user()->id;


        $uniqueFilename = uniqid('qr_code_');
        $qrCodeImagePath = public_path('qrcodes/'. $uniqueFilename.'.png');

        file_put_contents($qrCodeImagePath, $qrCodeImage);

        //$userEmail = Auth::guard('admin')->user()->email;

        $userEmail =$request->email;

        $userName =$request->name;
       // Mail::to($userEmail)->send(new CashBackOfferQrCode());
       $png = $qrCodeImage;
       $png = base64_encode($png);
       $qr_image = "<img src='data:image/png;base64," . $png . "'>";

        $pdf =PDF::loadView('build', [
            'qr_image' => $qr_image,
            'randomString' =>$randomString

        ])->setPaper(array(0,0,200,360));


        $data = ['name' =>$userName, 'email' =>$userEmail];

        Mail::send('mail', $data, function ($message) use ($data,$pdf)
        {
            $message->from('admin@topcashbackadmin.icicle.dev','Admin');
            $message->to($data['email'], $data['name'])

                ->subject('Cash Back Offer')
                ->attachData($pdf->output(), "qrcode.pdf");
        });


        $qrCode = QRCode::create([
            'qr_code_data' => $qrCodeData,
            'user_email' => $userEmail,
            'sent_email' => false, // Use false instead of False
            'admin_id' => $adminId,
            'status' => 'approved',

        ]);

        $qrCode->update(['sent_email' => true]);
        return response()->json([

            'message'=>'Mail send with QR code Successfully'
        ]);

    }

    // Online Generate QR code Decline

    public function generateAndSendDeclineQRCode(Request $request){
         // Generate a random QR code data
         $offerId = Offer::find('id');

         $randomString = Str::random(10);
         $qrCodeData = 'Random QR code data: ' . $randomString .$offerId;

         $qrCodeImage = QrCodeGenerator::size(100)->generate($qrCodeData);

         // Get the authenticated user's email
         $userEmail = Auth::guard('admin')->user()->email;
         $adminId = Auth::guard('admin')->user()->id;


         $uniqueFilename = uniqid('qr_code_');
         $qrCodeImagePath = public_path('qrcodes/'. $uniqueFilename.'.png');

         file_put_contents($qrCodeImagePath, $qrCodeImage);

         //$userEmail = Auth::guard('admin')->user()->email;

         $userEmail =$request->email;

         $userName =$request->name;
        // Mail::to($userEmail)->send(new CashBackOfferQrCode());
        $png = $qrCodeImage;
        $png = base64_encode($png);
        $qr_image = "<img src='data:image/png;base64," . $png . "'>";

         $pdf =PDF::loadView('decline_build', [
             'qr_image' => $qr_image,
             'randomString' =>$randomString

         ])->setPaper(array(0,0,200,360));


         $data = ['name' =>$userName, 'email' =>$userEmail];

         Mail::send('mail', $data, function ($message) use ($data,$pdf)
         {
             $message->from('admin@topcashbackadmin.icicle.dev','Admin');
             $message->to($data['email'], $data['name'])

                 ->subject('Cash Back Offer')
                 ->attachData($pdf->output(), "Decline_qrCode.pdf");
         });


         $qrCode = QRCode::create([
             'qr_code_data' => $qrCodeData,
             'user_email' => $userEmail,
             'sent_email' => false, // Use false instead of False
             'admin_id' => $adminId,
             'status' => 'approved',

         ]);

         $qrCode->update(['sent_email' => true]);
         return response()->json([

             'message'=>'QR code Decline Successfully'
         ]);
    }


}

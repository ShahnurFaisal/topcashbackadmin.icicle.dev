<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\ChildCategory;
use App\Models\Offer;
use PDF;
use Illuminate\Support\Facades\Mail;
use App\Mail\CashBackOfferQrCode;
use Illuminate\Support\Facades\Storage;
use SimpleSoftwareIO\QrCode\Facades\QrCode;


class OfferController extends Controller
{
    public function offer()
    {
        $offer = Offer::latest()->get();
        return view('backend.offer.offer', compact('offer'));
    }
    // add product
    public function addOffer()
    {
        $category = Category::latest()->get();
        $subCategory = SubCategory::latest()->get();
        $childCategory = ChildCategory::latest()->get();
        $offer = Offer::latest()->get();
        return view('backend.offer.add-offer', compact('category', 'subCategory', 'childCategory', 'offer'));
    }
    // store product
    public function saveOffer(Request $request)
    {
        $request->validate([
            'category_id' => 'required',
            'subCategory_id' => 'required',
            'offer_title' => 'required',
            'offer_amount' => 'required',
            'offer_percentage' => 'required',
            'offer_description' => 'required',
            'offer_image' => 'required|mimes:jpeg,jpg,png,gif',
            'affiliate_link' => 'required',

        ]);
        $offer = new Offer();
        $offer->category_id = $request->category_id;
        $offer->subCategory_id = $request->subCategory_id;
        $offer->offer_title = $request->offer_title;

        $offer->offer_amount = $request->offer_amount;
        $offer->offer_percentage = $request->offer_percentage;
        $offer->offer_description = $request->offer_description;
        $offer->affiliate_link = $request->affiliate_link;
        if ($request->file('offer_image')) {
            $offer->offer_image = $this->makeImage($request);
        }
        $offer->save();
        return redirect('/offer')->with('message', 'Offer Add Successfully');
    }

    // image
    private function makeImage($request)
    {
        $image = $request->file('offer_image');
        $imageName = rand() . '.' . $image->getClientOriginalExtension();
        $directory = public_path('admin/assets/offer-image/');
        $path = 'admin/assets/offer-image/';
        $imageUrl = $path . $imageName;
        $image->move($directory, $imageName);
        return $imageUrl;
    }

    public function deleteOffer($id)
    {
        $offer = Offer::findOrFail($id); // Find the offer

        $offerImage = $offer->offer_image; // Get the offer_image path

        $deleted = $offer->delete(); // Delete the offer and get the result (true or false)

        if ($deleted && $offerImage) {
            // If the offer was successfully deleted and offer_image exists, delete the file
            if (file_exists(public_path($offerImage))) {
                unlink(public_path($offerImage));
            }
        }

        return redirect()->back();
    }
    // edit product
    public function editOffer($id)
    {
        $Offer = Offer::find($id);
        $category = Category::latest()->get();
        $subCategory = SubCategory::latest()->get();
        return view('backend.offer.edit-offer', compact('category', 'subCategory', 'Offer'));
    }
    // update product
    public function updateOffer(Request $request)
    {
        $offer = Offer::find($request->offer_id);
        $request->validate([
            'category_id' => 'required',
            'subCategory_id' => 'required',
            'offer_title' => 'required',
            'offer_amount' => 'required',
            'offer_percentage' => 'required',
            'offer_description' => 'required',
            'offer_image' => 'required|mimes:jpeg,jpg,png,gif',
            'affiliate_link' => 'required',

        ]);
        $offer->category_id = $request->category_id;
        $offer->subCategory_id = $request->subCategory_id;
        $offer->offer_title = $request->offer_title;
        $offer->offer_amount = $request->offer_amount;
        $offer->offer_percentage = $request->offer_percentage;
        $offer->offer_description = $request->offer_description;
        $offer->affiliate_link = $request->affiliate_link;
        if ($request->file('offer_image')) {
            $offer->offer_image = $this->makeImage($request);
        }
        $offer->save();
        return redirect('/offer')->with('message', 'Offer Update Successfully');
    }
    //qr

    // public function handleCashBashOffer()
    // {
    //     // Generate the QR code and get the path
    //     $offerCode = 'cash-bash'; // Replace this with the actual offer code for cash bash
    //     $qrCodePath = public_path('temp_qr_codes/' . $offerCode . '.png');
    //     QrCode::generate(route('offer.cash_bash'), $qrCodePath);

    //     // Get the authenticated user's email address (assuming you have authentication set up)
    //     $userEmail = auth()->user()->email;

    //     // Send the email with the QR code attached
    //     Mail::to($userEmail)->send(new CashBackOfferQrCode($qrCodePath));

    //     // Optionally, you can delete the temporary QR code file after sending the email
    //     unlink($qrCodePath);

    //     // Redirect the user to a thank-you page or wherever appropriate
    //     return redirect()->back()->with('success', 'QR code sent to your email.');
    // }
    // pdf product
    // public function pdfProduct()
    // {
    //     $product = Product::latest()->get();
    //     $pdf = PDF::loadView('backend.product.pdf.product-invoice', [
    //         'product' => $product,
    //     ]);
    //     return $pdf->download('invoice.pdf');
    // }
}

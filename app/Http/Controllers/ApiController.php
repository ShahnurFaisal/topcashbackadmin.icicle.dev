<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Merchant;
use App\Models\SubCategory;
use App\Models\Offer;
use App\Models\User;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    //category
    public function category(){

        $category= Category::select('id','category_name')->with('subCategory')->get();
        return response()->json($category,200);
    }
    //subcategory
    public function subCategory(){
        $subCategory= SubCategory::all();
        return response()->json($subCategory,200);
    }
    //offer
    public function offer(){
        // $offer = Offer::all();
        // return response()->json($offer,200);
        $offer= Offer::select('id','category_id','subCategory_id',
        'offer_title','offer_amount','offer_percentage','offer_description',
        'affiliate_link','merchant_id','offer_image')->with('merchant','category','subCategory')->get();
        return response()->json($offer,200);
    }
    //User
    public function userRegister(){
        $user = User::all();
        return response()->json($user,200);
    }

    //Merchant
    public function merchant(){
        $merchant = Merchant::all();
        return response()->json($merchant,200);
    }
}

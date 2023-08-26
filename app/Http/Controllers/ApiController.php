<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\SubCategory;
use App\Models\Offer;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    //category
    public function category(){
        $category= Category::all();

        return response()->json($category,200);
    }
    //subcategory
    public function subCategory(){
        $subCategory= SubCategory::all();
        return response()->json($subCategory,200);
    }
    //offer
    public function offer(){
        $offer = Offer::all();
        return response()->json($offer,200);

    }
}

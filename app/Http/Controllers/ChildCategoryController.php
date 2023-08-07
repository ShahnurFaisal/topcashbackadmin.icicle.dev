<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\ChildCategory;
use PDF;

class ChildCategoryController extends Controller
{
    // child category index
    public function childCategory(){
        $category = Category::latest()->get();
        $subCategory = SubCategory::latest()->get();
        $childCategory = ChildCategory::latest()->get();
        return view('backend.childCategory.childCategory',compact('category','subCategory','childCategory'));
    }
    // store child category
    public function storeChildCategory(Request $request){
        $request->validate([
            'category_id'=>'required',
            'subCategory_id'=>'required',
            'child_category_name'=>'required',
        ]); 
        $childCategory = new ChildCategory();
        $childCategory->category_id = $request->category_id;
        $childCategory->subCategory_id = $request->subCategory_id;
        $childCategory->child_category_name = $request->child_category_name;
        $childCategory->save();
        return to_route('childCategory')->with('message','Child Category Store Sucessfully');
    }
    // edit child Category
    public function deleteChildCategory($id){
        $childCategory = ChildCategory::find($id);
        $childCategory->delete();
        return back()->with('message','Child Category Delete successfully');
    } 
    //pdf Child category
    public function pdfChildCategory(){
        $childCategory = ChildCategory::latest()->get();
        $pdf = PDF::loadView('backend.childCategory.pdf.childCategory-invoice',[
            'childCategory'=>$childCategory,
        ]);
        return $pdf->download('childCategory-invoice.pdf');
    }
}

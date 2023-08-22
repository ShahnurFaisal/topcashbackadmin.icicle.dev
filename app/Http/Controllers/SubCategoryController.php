<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\SubCategory;
use PDF;

class SubCategoryController extends Controller
{
    // index subcategory
    public function subCategory(){
        $category = Category::latest()->get();
        $subCategory = SubCategory::latest()->paginate(10);
        return view('backend.subCategory.sub-category',compact('category','subCategory'));
    }
    // store subcategory
    public function storeSubCustomer(Request $request){
        $request->validate([
            'category_id'=>'required',
            'sub_category_name'=>'required',
        ]);
        $SubCategory = new SubCategory();
        $SubCategory->category_id = $request->category_id;
        $SubCategory->sub_category_name = $request->sub_category_name;
        $SubCategory->save();
        return back()->with('message','Sub Category Store Sucessfully');
    }
    // edit sub category
    public function editSubCategory($id){
        $subCategory = SubCategory::find($id);

    }
    // delete sub category
    public function deleteSubCategory($id){
        $subCategory = SubCategory::find($id);
        $subCategory->delete();
        return back()->with('message','Sub Category Delete Successfully');
    }
    // pdf Sub Category
    public function pdfSubCategory(){
        $subCategory = SubCategory::latest()->get();
        $pdf = PDF::loadView('backend.subCategory.pdf.subCategory-invoice',[
            'subCategory'=>$subCategory,
        ]);
        return $pdf->download('subCategory-invoice.pdf');
    }
}

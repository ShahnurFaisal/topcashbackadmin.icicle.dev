<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use PDF;

class CategoryController extends Controller
{
    //index category
    public function category(){
        $category = Category::latest()->paginate(10);
        return view('backend.category.category',compact('category'));
    }
    // store category
    public function addCategory(Request $request){
        $request->validate([
            'category_name'=>'required|unique:categories,category_name'
        ]);
        $category = new Category();
        $category->category_name = $request->category_name;
        $category->save();
        return to_route('category')->with('message','Category Store Successfully');
    }
    // delete category
    public function deleteCategory($id){
        $category = Category::find($id);
        $category->delete();
        return back()->with('message','Category Deleted Successfully');
    }
    // PDF Category
    public function pdfCategory(){
        $category = Category::latest()->get();
        $pdf = PDF::loadView('backend.category.pdf.category-invoice',[
            'category'=>$category,
        ]);
        return $pdf->download('category-invoice.pdf');
    }
}

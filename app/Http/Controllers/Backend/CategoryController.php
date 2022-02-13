<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function CategoryView(){
        $categories = Category::latest()->get();
        return view('backend.category.category_view', compact('categories'));
    }

    public function CategoryStore(Request $request){
        $request->validate([
            'category_name_eng' => 'required',
            'category_name_ar' => 'required',
            'category_icon' => 'required',

        ]);

        Category::insert([
            'category_name_eng' => $request->category_name_eng,
            'category_name_ar' => $request->category_name_ar,
            'category_slug_eng' => strtolower(str_replace(' ', '-',$request->category_name_eng)),
            'category_slug_ar' => str_replace(' ', '-',$request->category_name_ar),
            'category_icon' => $request->category_icon,
        ]);

        $notification = array(
            'message' => 'Category Added Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);

    }

    public function CategoryEdit($id){
        $categories = Category::findOrFail($id);
        return view('backend.category.category_edit', compact('categories'));
    }

    public function CategoryUpdate(Request $request){
        $category_id = $request->id;

    
            Category::findOrFail($category_id)->update([
                'category_name_eng' => $request->category_name_eng,
                'category_name_ar' => $request->category_name_ar,
                'category_slug_eng' => strtolower(str_replace(' ', '-',$request->category_slug_eng)),
                'category_slug_ar' => str_replace(' ', '-',$request->category_slug_ar),
                'category_icon' => $request->category_icon,
            ]);
    
            $notification = array(
                'message' => 'Category Updated Successfully',
                'alert-type' => 'info'
            );
    
            return redirect()->route('all.categories')->with($notification);
    }

    public function CategoryDelete($id){

        Category::findOrFail($id)->delete();
        
        $notification = array(
            'message' => 'Category Deleted Successfully',
            'alert-type' => 'info'
        );

        return redirect()->back()->with($notification);
    }
}

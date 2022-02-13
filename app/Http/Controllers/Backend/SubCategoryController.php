<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SubCategory;
use App\Models\SubSubCategory;
use App\Models\Category;

class SubCategoryController extends Controller
{
    public function SubCategoryView(){
        $categories = Category::orderBy('category_name_eng','ASC')->get();
        $subcategories = SubCategory::latest()->get();
        return view('backend.category.subcategory_view', compact('subcategories','categories'));
    }

    public function SubCategoryStore(Request $request){
        $request->validate([
            'cat_id' => 'required',
            'subcat_name_eng' => 'required',
            'subcat_name_ar' => 'required',
        ]);

        SubCategory::insert([
            'cat_id' => $request->cat_id,
            'subcat_name_eng' => $request->subcat_name_eng,
            'subcat_name_ar' => $request->subcat_name_ar,
            'subcat_slug_eng' => strtolower(str_replace(' ', '-',$request->subcat_name_eng)),
            'subcat_slug_ar' => str_replace(' ', '-',$request->subcat_name_ar),
        ]);

        $notification = array(
            'message' => 'SubCategory Added Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);

    }

    public function SubCategoryEdit($id){
        $subcategories = SubCategory::findOrFail($id);
        $categories = Category::orderBy('category_name_eng','ASC')->get();
        return view('backend.category.subcategory_edit', compact('subcategories','categories'));
    }

    public function SubCategoryUpdate(Request $request){
        $subcat_id = $request->id;

    
            SubCategory::findOrFail($subcat_id)->update([
                'cat_id' => $request->cat_id,
                'subcat_name_eng' => $request->subcat_name_eng,
                'subcat_name_ar' => $request->subcat_name_ar,
                'subcat_slug_eng' => strtolower(str_replace(' ', '-',$request->subcat_name_eng)),
                'subcat_slug_ar' => str_replace(' ', '-',$request->subcat_name_ar),
            ]);
    
            $notification = array(
                'message' => 'SubCategory Updated Successfully',
                'alert-type' => 'info'
            );
    
            return redirect()->route('all.subcategories')->with($notification);
    }

    public function SubCategoryDelete($id){

        SubCategory::findOrFail($id)->delete();
        
        $notification = array(
            'message' => 'SubCategory Deleted Successfully',
            'alert-type' => 'info'
        );

        return redirect()->back()->with($notification);
    }

    //Sub-SubCategories All Functions

    public function SubSubCategoryView(){

        $categories = Category::orderBy('category_name_eng','ASC')->get();
           $subsubcategory = SubSubCategory::latest()->get();
           return view('backend.category.sub_subcategory_view',compact('subsubcategory','categories'));
   
        }

        public function GetSubCategory($cat_id){

            $subcat = SubCategory::where('cat_id',$cat_id)->orderBy('subcat_name_eng','ASC')->get();
            return json_encode($subcat);
        }

        public function GetSubSubCategory($subcategory_id){

            $subsubcat = SubSubCategory::where('subcategory_id',$subcategory_id)->orderBy('subsubcategory_name_eng','ASC')->get();
            return json_encode($subsubcat);
         }


        public function SubSubCategoryStore(Request $request){
            $request->validate([
                'cat_id' => 'required',
                'subcategory_id' => 'required',
                'subsubcategory_name_eng' => 'required',
                'subsubcategory_name_ar' => 'required',
            ]);
    
            SubSubCategory::insert([
                'cat_id' => $request->cat_id,
                'subcategory_id' => $request->subcategory_id,
                'subsubcategory_name_eng' => $request->subsubcategory_name_eng,
                'subsubcategory_name_ar' => $request->subsubcategory_name_ar,
                'subsubcategory_slug_eng' => strtolower(str_replace(' ', '-',$request->subsubcategory_name_eng)),
                'subsubcategory_slug_ar' => str_replace(' ', '-',$request->subsubcategory_name_ar),
            ]);
    
            $notification = array(
                'message' => 'Sub-SubCategory Added Successfully',
                'alert-type' => 'success'
            );
    
            return redirect()->back()->with($notification);
    
        }

        public function SubSubCategoryEdit($id){
            $categories = Category::orderBy('category_name_eng','ASC')->get();
            $subcategories = SubCategory::orderBy('subcat_name_eng','ASC')->get();
            $subsubcategories = SubSubCategory::findOrFail($id);
            return view('backend.category.sub_subcategory_edit', compact('categories','subcategories','subsubcategories'));
        }

        public function SubSubCategoryUpdate(Request $request){

            $subsubcat_id = $request->id;
    
            SubSubCategory::findOrFail($subsubcat_id)->update([
            'cat_id' => $request->cat_id,
            'subcategory_id' => $request->subcategory_id,
            'subsubcategory_name_eng' => $request->subsubcategory_name_eng,
            'subsubcategory_name_ar' => $request->subsubcategory_name_ar,
            'subsubcategory_slug_eng' => strtolower(str_replace(' ', '-',$request->subsubcategory_name_eng)),
            'subsubcategory_slug_ar' => str_replace(' ', '-',$request->subsubcategory_name_ar),
             
    
            ]);
    
            $notification = array(
                'message' => 'Sub-SubCategory Updated Successfully',
                'alert-type' => 'info'
            );
    
            return redirect()->route('all.subsubcategory')->with($notification);
    
        } 

        public function SubSubCategoryDelete($id){

            SubSubCategory::findOrFail($id)->delete();
            
            $notification = array(
                'message' => 'Sub-SubCategory Deleted Successfully',
                'alert-type' => 'info'
            );
    
            return redirect()->back()->with($notification);
        }
}
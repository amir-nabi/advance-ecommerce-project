<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Brand;
use App\Models\Category;
use App\Models\MultiImg;
use App\Models\Product;
use App\Models\SubCategory;
use App\Models\SubSubCategory;
use Illuminate\Support\Carbon;
use Image;

class ProductController extends Controller
{
    public function AddProduct(){
        $categories = Category::latest()->get();
        $brands = Brand::latest()->get();
        return view('backend.product.product_add',compact('categories','brands'));
    }

    public function ProductStore(Request $request){

        $request->validate([
            'brand_id' => 'required',
            'cat_id' => 'required',
            'subcategory_id' => 'required',
            'subsubcategory_id' => 'required',
            'product_name_eng' => 'required',
            'product_name_ar' => 'required',
            'product_qty' => 'required',
            'product_tags_eng' => 'required',
            'product_tags_ar' => 'required',
            'product_color_eng' => 'required',
            'product_color_ar' => 'required',
            'selling_price' => 'required',
            'short_desc_eng' => 'required',
            'short_desc_ar' => 'required',
            'product_thumbnail' => 'required',
        ]);
        
        
                $image = $request->file('product_thumbnail');
                $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
                Image::make($image)->resize(917,1000)->save('upload/products/thumbnail/'.$name_gen);
                $save_url = 'upload/products/thumbnail/'.$name_gen;
        
              $product_id = Product::insertGetId([
                  'brand_id' => $request->brand_id,
                  'cat_id' => $request->cat_id,
                  'subcategory_id' => $request->subcategory_id,
                  'subsubcategory_id' => $request->subsubcategory_id,
                  'product_name_eng' => $request->product_name_eng,
                  'product_name_ar' => $request->product_name_ar,
                  'product_slug_eng' =>  strtolower(str_replace(' ', '-', $request->product_name_eng)),
                  'product_slug_ar' => str_replace(' ', '-', $request->product_name_ar),
                  'product_code' => $request->product_code,
        
                  'product_qty' => $request->product_qty,
                  'product_tags_eng' => $request->product_tags_eng,
                  'product_tags_ar' => $request->product_tags_ar,
                  'product_size_eng' => $request->product_size_eng,
                  'product_size_ar' => $request->product_size_ar,
                  'product_color_eng' => $request->product_color_eng,
                  'product_color_ar' => $request->product_color_ar,
        
                  'selling_price' => $request->selling_price,
                  'discount_price' => $request->discount_price,
                  'short_desc_eng' => $request->short_desc_eng,
                  'short_desc_ar' => $request->short_desc_ar,
                  'long_desc_eng' => $request->long_desc_eng,
                  'long_desc_ar' => $request->long_desc_ar,
        
                  'hot_deals' => $request->hot_deals,
                  'featured' => $request->featured,
                  'special_price' => $request->special_price,
                  'special_deals' => $request->special_deals,
        
                  'product_thumbnail' => $save_url,
        
                  'status' => 1,
                  'created_at' => Carbon::now(),   
        
              ]);
        
        
              ////////// Multiple Image Upload Start ///////////

              $imagess = $request->file('product_thumbnail');
              if ($imagess){
                $make_name = hexdec(uniqid()).'.'.$imagess->getClientOriginalExtension();
                Image::make($imagess)->resize(917,1000)->save('upload/products/multi-image/'.$make_name);
                $uploadPath = 'upload/products/multi-image/'.$make_name;
        
                MultiImg::insert([
        
                    'product_id' => $product_id,
                    'photo_name' => $uploadPath,
                    'created_at' => Carbon::now(), 
        
                ]);
        
              }
        
              $images = $request->file('multi_img');
              if ($images){
              foreach ($images as $img) {
                  $make_name = hexdec(uniqid()).'.'.$img->getClientOriginalExtension();
                Image::make($img)->resize(917,1000)->save('upload/products/multi-image/'.$make_name);
                $uploadPath = 'upload/products/multi-image/'.$make_name;
        
                MultiImg::insert([
        
                    'product_id' => $product_id,
                    'photo_name' => $uploadPath,
                    'created_at' => Carbon::now(), 
        
                ]);
        
              }
            }
        
              ////////// Een Multiple Image Upload Start ///////////
        
        
               $notification = array(
                    'message' => 'Product Inserted Successfully',
                    'alert-type' => 'success'
                );
        
                return redirect()->route('manage-product')->with($notification);
        
    }


    public function ProductManage(){
        $products = Product::latest()->get();
        return view('backend.product.product_view',compact('products'));
    }

    public function ProductInfo($id){

        $multiImgs = MultiImg::where('product_id',$id)->get();
		$categories = Category::latest()->get();
		$brands = Brand::latest()->get();
		$subcategory = SubCategory::latest()->get();
		$subsubcategory = SubSubCategory::latest()->get();
		$products = Product::findOrFail($id);
		return view('backend.product.product_info',compact('categories','brands','subcategory','subsubcategory','products','multiImgs'));

	}

    public function ProductEdit($id){

        $multiImgs = MultiImg::where('product_id',$id)->get();
		$categories = Category::latest()->get();
		$brands = Brand::latest()->get();
		$subcategory = SubCategory::latest()->get();
		$subsubcategory = SubSubCategory::latest()->get();
		$products = Product::findOrFail($id);
		return view('backend.product.product_edit',compact('categories','brands','subcategory','subsubcategory','products','multiImgs'));

	}

    public function ProductUpdate(Request $request){

		$product_id = $request->id;

         Product::findOrFail($product_id)->update([
      	'brand_id' => $request->brand_id,
      	'cat_id' => $request->cat_id,
      	'subcategory_id' => $request->subcategory_id,
      	'subsubcategory_id' => $request->subsubcategory_id,
      	'product_name_eng' => $request->product_name_eng,
      	'product_name_ar' => $request->product_name_ar,
      	'product_slug_eng' =>  strtolower(str_replace(' ', '-', $request->product_name_eng)),
      	'product_slug_ar' => str_replace(' ', '-', $request->product_name_ar),
      	'product_code' => $request->product_code,

      	'product_qty' => $request->product_qty,
      	'product_tags_eng' => $request->product_tags_eng,
      	'product_tags_ar' => $request->product_tags_ar,
      	'product_size_eng' => $request->product_size_eng,
      	'product_size_ar' => $request->product_size_ar,
      	'product_color_eng' => $request->product_color_eng,
      	'product_color_ar' => $request->product_color_ar,

      	'selling_price' => $request->selling_price,
      	'discount_price' => $request->discount_price,
      	'short_desc_eng' => $request->short_desc_eng,
      	'short_desc_ar' => $request->short_desc_ar,
      	'long_desc_eng' => $request->long_desc_eng,
      	'long_desc_ar' => $request->long_desc_ar,

      	'hot_deals' => $request->hot_deals,
      	'featured' => $request->featured,
      	'special_price' => $request->special_price,
      	'special_deals' => $request->special_deals,      	 
      	'status' => 1,
      	'created_at' => Carbon::now(),   

      ]);

          $notification = array(
			'message' => 'Product Data Updated Successfully',
			'alert-type' => 'info'
		);

		return redirect()->route('manage-product')->with($notification);
	}

    public function MultiImageUpdate(Request $request){
		$imgs = $request->multi_img;

		foreach ($imgs as $id => $img) {
	    $imgDel = MultiImg::findOrFail($id);
	    unlink($imgDel->photo_name);
	     
    	$make_name = hexdec(uniqid()).'.'.$img->getClientOriginalExtension();
    	Image::make($img)->resize(917,1000)->save('upload/products/multi-image/'.$make_name);
    	$uploadPath = 'upload/products/multi-image/'.$make_name;

    	MultiImg::where('id',$id)->update([
    		'photo_name' => $uploadPath,
    		'updated_at' => Carbon::now(),

    	]);

	 } // end foreach

       $notification = array(
			'message' => 'Product Multiple Images Updated Successfully',
			'alert-type' => 'info'
		);

		return redirect()->back()->with($notification);

	}

    public function MultiImageDelete($id){
        $oldimg = MultiImg::findOrFail($id);
        unlink($oldimg->photo_name);
        MultiImg::findOrFail($id)->delete();

        $notification = array(
           'message' => 'Product Image Deleted Successfully',
           'alert-type' => 'success'
       );

       return redirect()->back()->with($notification);

    } 

    public function ThumbnailImageUpdate(Request $request){
        $pro_id = $request->id;
        $oldImage = $request->old_img;
        unlink($oldImage);
   
       $image = $request->file('product_thumbnail');
           $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
           Image::make($image)->resize(917,1000)->save('upload/products/thumbnail/'.$name_gen);
           $save_url = 'upload/products/thumbnail/'.$name_gen;
   
           Product::findOrFail($pro_id)->update([
               'product_thumbnail' => $save_url,
               'updated_at' => Carbon::now(),
   
           ]);
   
            $notification = array(
               'message' => 'Product Main Image Updated Successfully',
               'alert-type' => 'info'
           );
   
           return redirect()->back()->with($notification);
   
        } 

        public function ProductDelete($id){
            $product = Product::findOrFail($id);
            unlink($product->product_thumbnail);
            Product::findOrFail($id)->delete();
   
            $images = MultiImg::where('product_id',$id)->get();
            foreach ($images as $img) {
                unlink($img->photo_name);
                MultiImg::where('product_id',$id)->delete();
            }
   
            $notification = array(
               'message' => 'Product Deleted Successfully',
               'alert-type' => 'success'
           );
   
           return redirect()->back()->with($notification);
   
        }

        public function ProductInactive($id){
            Product::findOrFail($id)->update(['status' => 0]);
            $notification = array(
               'message' => 'Product Inactive',
               'alert-type' => 'success'
           );
   
           return redirect()->back()->with($notification);
        }
   
   
     public function ProductActive($id){
         Product::findOrFail($id)->update(['status' => 1]);
            $notification = array(
               'message' => 'Product Active',
               'alert-type' => 'success'
           );
   
           return redirect()->back()->with($notification);
   
        }
}

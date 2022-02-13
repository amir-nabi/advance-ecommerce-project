<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Brand;
use Image;

class BrandController extends Controller
{
    public function BrandView(){
        $brands = Brand::latest()->get();
        return view('backend.brand.brand_view', compact('brands'));
    }

    public function BrandStore(Request $request){
        $request->validate([
            'brand_name_eng' => 'required',
            'brand_name_fr' => 'required',
            'brand_image' => 'required',

        ]);

        $image = $request->file('brand_image');
        $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        Image::make($image)->resize(166,110)->save('upload/brands/'.$name_gen);
        $save_url = 'upload/brands/'.$name_gen;

        Brand::insert([
            'brand_name_eng' => $request->brand_name_eng,
            'brand_name_fr' => $request->brand_name_fr,
            'brand_slug_eng' => strtolower(str_replace(' ', '-',$request->brand_name_eng)),
            'brand_slug_fr' => str_replace(' ', '-',$request->brand_name_fr),
            'brand_image' => $save_url,
        ]);

        $notification = array(
            'message' => 'Brand Added Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);

    }

    public function BrandEdit($id){
        $brands = Brand::findOrFail($id);
        return view('backend.brand.brand_edit', compact('brands'));
    }

    public function BrandUpdate(Request $request){
        $brand_id = $request->id;
        $old_img = $request->old_image;

        if($request->file('brand_image')){
            unlink($old_img);
            $image = $request->file('brand_image');
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(166,110)->save('upload/brands/'.$name_gen);
            $save_url = 'upload/brands/'.$name_gen;
    
            Brand::findOrFail($brand_id)->update([
                'brand_name_eng' => $request->brand_name_eng,
                'brand_name_fr' => $request->brand_name_fr,
                'brand_slug_eng' => strtolower(str_replace(' ', '-',$request->brand_name_eng)),
                'brand_slug_fr' => str_replace(' ', '-',$request->brand_name_fr),
                'brand_image' => $save_url,
            ]);
    
            $notification = array(
                'message' => 'Brand Updated Successfully',
                'alert-type' => 'info'
            );
    
            return redirect()->route('all.brands')->with($notification);
    
        }else{

            Brand::findOrFail($brand_id)->update([
                'brand_name_eng' => $request->brand_name_eng,
                'brand_name_fr' => $request->brand_name_fr,
                'brand_slug_eng' => strtolower(str_replace(' ', '-',$request->brand_name_eng)),
                'brand_slug_fr' => str_replace(' ', '-',$request->brand_name_fr),
            ]);
    
            $notification = array(
                'message' => 'Brand Updated Successfully',
                'alert-type' => 'info'
            );
    
            return redirect()->route('all.brands')->with($notification);
    
        }

    }

    public function BrandDelete($id){
        $brands = Brand::findOrFail($id);
        $img = $brands->brand_image;
        unlink($img);

        Brand::findOrFail($id)->delete();
        
        $notification = array(
            'message' => 'Brand Deleted Successfully',
            'alert-type' => 'info'
        );

        return redirect()->back()->with($notification);
    }
}

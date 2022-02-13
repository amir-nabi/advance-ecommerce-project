<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Image;

class SliderController extends Controller
{
    public function SliderView(){
        $sliders = Slider::latest()->get();
        return view('backend.slider.slider_view', compact('sliders'));
    }

    public function SliderStore(Request $request){
        $request->validate([
            'slider_img' => 'required',
        ]);

        $image = $request->file('slider_img');
        $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        Image::make($image)->resize(870,370)->save('upload/sliders/'.$name_gen);
        $save_url = 'upload/sliders/'.$name_gen;

        Slider::insert([
            'title' => $request->title,
            'description' => $request->description,
            'slider_img' => $save_url,
        ]);

        $notification = array(
            'message' => 'Slider Added Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);

    }

    public function SliderEdit($id){
        $sliders = Slider::findOrFail($id);
        return view('backend.slider.slider_edit', compact('sliders'));
    }

    public function SliderUpdate(Request $request){
        $slider_id = $request->id;
        $old_img = $request->old_image;

        if($request->file('slider_img')){
            unlink($old_img);
            $image = $request->file('slider_img');
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(300,300)->save('upload/sliders/'.$name_gen);
            $save_url = 'upload/sliders/'.$name_gen;
    
            Slider::findOrFail($slider_id)->update([
                'title' => $request->title,
                'description' => $request->description,
                'slider_img' => $save_url,
            ]);
    
            $notification = array(
                'message' => 'Slider Updated Successfully',
                'alert-type' => 'info'
            );
    
            return redirect()->route('manage.sliders')->with($notification);
    
        }else{

            Slider::findOrFail($slider_id)->update([
                'title' => $request->title,
                'description' => $request->description,
            ]);
    
            $notification = array(
                'message' => 'Slider Updated Successfully',
                'alert-type' => 'info'
            );
    
            return redirect()->route('manage.sliders')->with($notification);
    
        }

    }

    public function SliderDelete($id){
        $sliders = Slider::findOrFail($id);
        $img = $sliders->slider_img;
        unlink($img);

        Slider::findOrFail($id)->delete();
        
        $notification = array(
            'message' => 'Slider Deleted Successfully',
            'alert-type' => 'info'
        );

        return redirect()->back()->with($notification);
    }

    public function SliderInactive($id){
        Slider::findOrFail($id)->update(['status' => 0]);
        $notification = array(
           'message' => 'Slider Inactive',
           'alert-type' => 'success'
       );

       return redirect()->back()->with($notification);
    }


 public function SliderActive($id){
    Slider::findOrFail($id)->update(['status' => 1]);
        $notification = array(
           'message' => 'Slider Active',
           'alert-type' => 'success'
       );

       return redirect()->back()->with($notification);

    }
}

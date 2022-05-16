<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Models\Category;
use App\Models\MultiImg;
use App\Models\Product;
use App\Models\Slider;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class IndexController extends Controller
{
    public function index(){
        $categories = Category::orderBy('category_name_eng','ASC')->get();
        $featuredProduct = Product::where('featured',1)->orderBy('id','DESC')->limit(10)->get();
        $hotdeal = Product::where('hot_deals',1)->where('discount_price','!=',NULL)->orderBy('id','DESC')->limit(4)->get();
        $products = Product::where('status',1)->orderBy('id','ASC')->limit(10)->get();
        $sliders = Slider::where('status',1)->orderBy('id','DESC')->limit(3)->get();
        $specialdeal = Product::where('special_deals',1)->orderBy('id','DESC')->limit(6)->get();
        $specialoffres = Product::where('special_price',1)->orderBy('id','DESC')->limit(6)->get();
        return view('frontend.index',compact('categories','sliders','products','featuredProduct','specialdeal','specialoffres','hotdeal'));
    }

    public function UserLogout(){
        Auth::logout();
        return Redirect()->route('login');
    }

    public function UserProfile(){
        $id = Auth::user()->id;
        $user = User::find($id);
        return view('frontend.profile.user_profile', compact('user'));
    }

    public function UserProfileStore(Request $request){
        $data = User::find(Auth::user()->id);
        $data->name = $request->name;
        $data->email = $request->email;
        $data->phone = $request->phone;
        if ($request->file('profile_photo_path')){
            $file = $request->file('profile_photo_path');
            @unlink(public_path('upload/user_images/'.$data->profile_photo_path));
            $filename = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('upload/user_images'),$filename);
            $data['profile_photo_path'] = $filename;
        }
        $data->save();

        $notification = array(
            'message' => 'User Profile Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('user.profile')->with($notification);
    }

    public function ChangePassword(){
        return view('frontend.profile.change_password');
    }

    public function UpdatePassword(Request $request){
        $validateData = $request->validate([
            'oldpassword' => 'required',
            'password' => 'required|confirmed'
        ]);

        $hashedPassword = Auth::user()->password;
        if(Hash::check($request->oldpassword, $hashedPassword)){
            $user = User::find(Auth::id());
            $user->password = Hash::make($request->password);
            $user->save();
            Auth::logout();
            return redirect()->route('user.logout');
        }else{
            return redirect()->back();
        }
    }



	///// Advance Search Options 

	public function SearchProduct(Request $request){

		$request->validate(["search" => "required"]);

		$item = $request->search;		 
        
		$products = Product::where('product_name_eng','LIKE',"%$item%")->select('product_name_eng','product_thumbnail','selling_price','id','product_slug_eng')->limit(5)->get();
		return view('frontend.product.search_product',compact('products'));



	} 

    public function ProductDetails($id,$slug){
        $products = Product::findOrFail($id);
        
		$color_en = $products->product_color_eng;
		$product_color_en = explode(',', $color_en);

		$color_ar = $products->product_color_ar;
		$product_color_ar = explode(',', $color_ar);

		$size_en = $products->product_size_eng;
		$product_size_en = explode(',', $size_en);

		$size_ar = $products->product_size_ar;
		$product_size_ar = explode(',', $size_ar);
        $multiImg = MultiImg::where('product_id',$id)->get();
        $cat_id = $products->cat_id;
		$relatedProduct = Product::where('cat_id',$cat_id)->where('id','!=',$id)->orderBy('id','DESC')->get();
	 	return view('frontend.product.product_details',compact('products','multiImg','product_color_en','product_color_ar','product_size_en','product_size_ar','relatedProduct'));    
    }

    public function TagWiseProduct($tag){
		$products = Product::where('status',1)->where('product_tags_eng',$tag)->orderBy('id','DESC')->paginate(3);
        $categories = Category::orderBy('category_name_eng','ASC')->get();
		return view('frontend.tags.tag_view',compact('products','categories'));
	}

    public function SubCatWiseProduct($subcat_id,$slug){
		$products = Product::where('status',1)->where('subcategory_id',$subcat_id)->orderBy('id','DESC')->paginate(6);
		$categories = Category::orderBy('category_name_eng','ASC')->get();
		return view('frontend.product.subcategory_view',compact('products','categories'));

	}

    public function SubSubCatWiseProduct($subsubcat_id,$slug){
		$products = Product::where('status',1)->where('subsubcategory_id',$subsubcat_id)->orderBy('id','DESC')->paginate(6);
		$categories = Category::orderBy('category_name_eng','ASC')->get();
		return view('frontend.product.sub_subcategory_view',compact('products','categories'));

	}

    public function ProductViewAjax($id){
		$product = Product::with('category','brand')->findOrFail($id);

		$color = $product->product_color_eng;
		$product_color = explode(',', $color);

		$size = $product->product_size_eng;
		$product_size = explode(',', $size);

		return response()->json(array(
			'product' => $product,
			'color' => $product_color,
			'size' => $product_size,

		));
}
}
<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FrontendController extends Controller
{
    public function index(){

        $feature_product=Product::where('trending','1')->take(15)->get();
        $trending_category=Category::where('popular','1')->take(15)->get();
        return view('frontend.index',compact('feature_product','trending_category'));
    }

    public function category(){
        $category=Category::where('status','0')->get();
        return view('frontend.category', compact('category'));
    }

    public function viewcategory($slug){

        if(Category::where('slug',$slug)->exists()){
            $category=Category::where('slug',$slug)->first();
            $products=Product::where('cate_id','5')->where('status','0')->get();

            return view('frontend.products.index',compact('category','products'));
        }
        else{
            return redirect('/')->with('status',"Slug doesn't exist");
        }
    }
}

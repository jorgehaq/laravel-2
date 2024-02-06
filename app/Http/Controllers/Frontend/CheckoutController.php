<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
    public function index(){

        $old_cartitems=Cart::where('user_id',Auth::id())->get();

        foreach($old_cartitems as $item){
            if(!Product::where('id',$item->prod_id)->where('qty','>=',$item->prod_qty)->exists()){

                $removed_item=Cart::where('user_id',Auth::id())->where('prod_id',$item->prod_id)->first();
                $removed_item->delete();
            }
        }

        $cartitems=Cart::where('user_id',Auth::id())->get();

        return view('frontend.checkout', compact('cartitems'));
    }

    public function placeorder(Request $request){

        
    }
}

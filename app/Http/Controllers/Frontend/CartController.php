<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CartController extends Controller
{
    public function addProductCart(Request $request)
    {

        $product_id=$request->input('product_id');
        $product_qty=$request->input('product_qty');
        if(Auth::check()){

            $prod_check=Product::where('id',$product_id)->first();

            if($prod_check)
            {
                if(Cart::where('prod_id',$product_id)->where('user_id',Auth::id())->exists())
                {
                    return response()->json(['status'=>$prod_check->name.' Already Added to Cart']);
                }
                else{

                    $cart_item=new Cart();

                    $cart_item->user_id=Auth::id();
                    $cart_item->prod_id=$product_id;
                    $cart_item->prod_qty=$product_qty;

                    $cart_item->save();

                    return response()->json(['status'=>$prod_check->name.' Added to Cart']);
                }
            }
        }
        else
        {
            return response()->json(['status'=>"Login to Continue"]);
        }

    }

    public function viewcart() {

        $cartItems=Cart::where('user_id',Auth::id())->get();

        return view('frontend.cart',compact('cartItems'));

    }

    public function deleteProductCart(Request $request) {

        if(Auth::check())
        {
            $prod_id=$request->input('prod_id');
            if(Cart::where('prod_id',$prod_id)->where('user_id',Auth::id())->exists()){

                $cartItems=Cart::where('prod_id',$prod_id)->where('user_id',Auth::id())->first();
                $cartItems->delete();

                return response()->json(['status'=>"Product Removed from Cart"]);
            }

        }
        else
        {
            return response()->json(['status'=> "Login to Continue"]);
        }


    }

    public function updateCart(Request $request){


        $prod_id=$request->input('prod_id');
        $prod_qty=$request->input('prod_qty');

        if(Auth::check()){


            if(Cart::where('prod_id',$prod_id)->where('user_id',Auth::id())->exists()){

                $cart=Cart::where('prod_id',$prod_id)->where('user_id',Auth::id())->first();
                $cart->prod_qty=$prod_qty;
                $cart->update();

                return response()->json(['status'=>"Quantity updated successfully"]);
            }


        }
        else {
            return response()->json(['status'=>"Log in first in the app."]);
        }
    }

}

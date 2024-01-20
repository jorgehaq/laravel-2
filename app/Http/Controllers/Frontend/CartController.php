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
}
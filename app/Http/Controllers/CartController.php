<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Product;
use Illuminate\Types\Relations\Car;

class CartController extends Controller
{
    //
    public function addProductToCart($productId){
        // $product = Product::findOrFail($productId);
        $user= auth()->user()->id;
        $cart = Cart::where('product_id', $productId)->where('user_id', $user)->first();
        // dd($user);
        if($cart){
            $cart->quantity+=1;
            $cart->save();
        }else{
            $newCart = new Cart();
            $newCart->product_id = $productId;
            $newCart->user_id = $user;
            $newCart->quantity = 1;
            $newCart->save();
        }
        // $cart = Cart::with('products')->where('user_id',$user)->get();
        // dd($cart);
        return redirect()->route('product.cart');
        // return response()->json(['success' => 'request is successfull do it'], 201);
    }

    public function checkOutPage(){
        $user = auth()->user()->id;
        $cart = Cart::with('product')->where('user_id', $user)->get();
        return view('pages.checkout', ['carts' => $cart]);
    }
}

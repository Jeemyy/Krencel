<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreOrderRequest;
use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Order;
use App\Models\Orderdetail;
use App\Models\Category;
use App\Models\Review;

class OrderController extends Controller
{
    //
    public function storeNewOrder(StoreOrderRequest $request){
        $user = auth()->user()->id;
        $validated = $request->validated();
        // $cart = Cart::with('product')->where('user_id', $user)->get();

        $newOrder = new Order();
        $newOrder->name = $validated['name'];
        $newOrder->email = $validated['email'];
        $newOrder->phone = $validated['phone'];
        $newOrder->address = $validated['address'];
        $newOrder->user_id = $user;
        $newOrder->save();

        $newCart = Cart::where('user_id', $user)->get();
        foreach($newCart as $item){
            $orderDetail = new Orderdetail();
            $orderDetail->product_id = $item->product_id;
            $orderDetail->order_id = $newOrder->id;
            $orderDetail->price = $item->product->price;
            $orderDetail->quantity = $item->quantity;
            $orderDetail->save();
        }

        Cart::where('user_id', $user)->delete();
        $category = Category::all();
        $review = Review::all();
        return view('welcome', [
            "categories" => $category,
            "reviews" => $review,
        ]);
    }
}

<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Review;


class KrencelController extends Controller
{
    //
    public function welcome(){
        $category = Category::all();
        $reviews = Review::all();
        return view('welcome' , [
            'categories' => $category ,
            'reviews' => $reviews
        ]);
    }
    public function getProducts($catid = null)
    {
        $categories = Category::all();
        if ($catid) {
            $products = Product::where('category_id', $catid)->get();
            $currentCategory = Category::find($catid);
        } else {
            // $products = Product::all(); // select * from products
            $products = PRoduct::paginate(4);
            $currentCategory = null;
        }
        return view('pages.product', [
            'products' => $products,
            'categories' => $categories,
            'currentCategory' => $currentCategory,
        ]);
    }
}

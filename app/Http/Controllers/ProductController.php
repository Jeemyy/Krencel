<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
class ProductController extends Controller
{
    public function getAddProduct(){
        $categories = Category::all();
        return view('pages.addproduct', ['categories' => $categories]);
    }
    public function storeProduct(Request $request){
        $request->validate([
            'name' => 'required|max:50',
            'price' => 'required',
            'category' => 'required',
            'description' => 'required',
            'photo' => 'image|mimes:jpg,png,jpeg',

        ]);
        if($request->id){
            $addProduct = Product::find($request->id);
            $addProduct->name = $request->name;
            $addProduct->price = $request->price;
            $addProduct->description = $request->description;
            $imageName = time().".".$request->photo->extension();
            $path = $request->photo->move('upload_products' , $imageName);
            $addProduct->imagepath = $path;
            $addProduct->category_id = $request->category;
            $addProduct->save();
        }
        else{
            $addProduct = new Product();
            $addProduct->name = $request->name;
            $addProduct->price = $request->price;
            $addProduct->description = $request->description;
            $imageName = time().".".$request->photo->extension();
            $path = $request->photo->move('upload_products' , $imageName);
            $addProduct->imagepath = $path;
            $addProduct->category_id = $request->category;
            $addProduct->save();
        }
        return redirect('product');
    }

    public function editProduct($productid = null){
        if($productid){
            $categories = Category::all();
            $product = Product::find($productid);
            return view('pages.editproduct' , ['categories' => $categories , 'product' => $product]);
        }else{
            return redirect('product');
        }
    }

    // public function updateProduct(Request $request){
    //     if($request->id){
    //         $addProduct = Product::find($request->id);
    //         $addProduct->name = $request->name;
    //         $addProduct->price = $request->price;
    //         $addProduct->description = $request->description;
    //         $imageName = time().".".$request->photo->extension();
    //         $path = $request->photo->move('upload_products' , $imageName);
    //         $addProduct->imagepath = $path;
    //         $addProduct->category_id = $request->category;
    //         $addProduct->save();
    //         return redirect('/');
    //     }
    // }

    public function deleteProduct($productid = null){
        $product = Product::find($productid);
        // dd($product);
        $product->delete();
        return redirect('product');
    }


    public function getProductTable(){

        $products = Product::all();
        return view('pages.productTable', ['products' => $products]);
    }
}

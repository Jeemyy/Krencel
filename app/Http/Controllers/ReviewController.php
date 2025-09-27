<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Review;
use App\Models\Category;

class ReviewController extends Controller
{
    //
    public function getReview(){
        return view('pages.review');
    }
    public function storeReview(Request $request){
        $request->validate([
            'name' => 'required|max:50',
            'phone' => 'required',
            'subject' => 'required',
            'message' => 'required'
        ]);
        $getReview = new Review();
        $getReview->name = $request->name;
        $getReview->phone = $request->phone;
        $getReview->subject = $request->subject;
        $getReview->message = $request->message;
        $imageName = time().".".$request->photo->extension();
        $path = $request->photo->move('uploads' , $imageName);
        $getReview->imagepath = $path;

        $getReview->save();
        return to_route('welcome');

    }
}

@extends('layouts.master')
@section('content')
@if (Auth::check())
<section class="book_section layout_padding">
    <div class="container">
      <div class="heading_container">
        <h2>
          Add A New Product
        </h2>
      </div>
      <div class="row">
        <div class="col-md-6">
          <div class="form_container">
            <form action="{{route('product.store')}}" method="post" enctype="multipart/form-data">
                @csrf
              <div>
                <input type="text" name="name" class="form-control" placeholder="Product Name...">
                <span style="color: red">
                    @error('name')
                        {{$message}}
                    @enderror
                </span>
              </div>
              <div>
                <input type="number" name="price" class="form-control" placeholder="Price...">
                <span style="color: red">
                    @error('name')
                        {{$message}}
                    @enderror
                </span>
              </div>
             <div style="margin-bottom: 5rem">
                <select class="form-select" name="category">
                <option selected>Select Product's Category...</option>
                @foreach ($categories as $item)
                <option value="{{$item->id}}">{{$item->name}}</option>
                @endforeach
                </select>
                <span style="color: red">
                    @error('name')
                        {{$message}}
                    @enderror
                </span>
              </div>
              <div>
               <textarea name="description" class="form-control" placeholder="Description..." id="" cols="30" rows="10"></textarea>
                <span style="color: red">
                    @error('name')
                        {{$message}}
                    @enderror
                </span>
              </div>
              <div>
                <label for="">Select Product's Photo...</label>
               <input type="file" name="photo" class="form-control" >
              </div>
              <div class="btn_box">
                <input type="submit" name="submit" value="Add Product" class="btn btn-warning fw-semibold fs-4" style="color: #fff; border-radius: 25px; width: 15rem">
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>
@else
<div class="container mt-5 mb-5" style="display: flex; justify-content: center; align-items: center">
    <div class="card" style="width: 20rem; height: 25rem; display: flex; justify-content: center; align-items: center">
  <img src="{{asset('images/alert.jpg') }}" class="card-img-top" alt="..." style="width: 200px">
  <div class="card-body">
    <h5 class="card-title">Record Login</h5>
    <p class="card-text">You shoud record your email and password to add product with permission</p>
    <a href="{{route('login')}}" class="btn btn-primary">Login</a>
  </div>
</div>
</div>
@endif
@endsection

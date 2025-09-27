@extends('layouts.master')
@section('content')
<section class="book_section layout_padding">
    <div class="container">
      <div class="heading_container">
        <h2>
          Edit Prodict
        </h2>
      </div>
      <div class="row">
        <div class="col-md-6">
          <div class="form_container">
            <form action="{{route('product.store')}}" method="post" enctype="multipart/form-data">
                @csrf
              <div>
                <input type="hidden" name="id" value="{{$product->id}}">
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
               <img src="{{asset($product->imagepath)}}" alt="" class="mb-3" style="max-width: 250px !important;">
              </div>
              <div class="btn_box">
                <input type="submit" name="submit" value="Update Product" class="btn btn-warning fw-semibold fs-4" style="color: #fff; border-radius: 25px; width: 15rem">
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection

@extends('layouts.master')

@section('content')
<section class="food_section layout_padding-bottom">
  <div class="container mt-5">

    {{-- Section Heading --}}
    <div class="heading_container heading_center">
        @if ($currentCategory)
            <h2>{{$currentCategory->name}} Category</h2>
        @else
            <h2>Category</h2>
        @endif
    </div>

    {{-- Categories Filter --}}

    {{-- Products Grid --}}
    <div class="filters-content">
      <div class="row grid">
        @foreach ($products as $product)
          <div class="col-sm-6 col-lg-4 all {{ $product->category_id }}">
            <div class="box">
              <div class="img-box">
                <img src="{{ asset($product->imagepath) }}" alt="{{ $product->name }}">
              </div>
              <div class="detail-box">
                <h5>{{ $product->name }}</h5>
                <p>{{ $product->description }}</p>
                <div class="">
                  <h6>{{ $product->price }}$</h6>
                    <a href="{{route('add.cart',$product->id)}}" type="button" class="btn btn-warning">Buy</a>
                    <a href="{{route('product.delete',$product->id)}}" type="button" class="btn btn-danger">Delete</a>
                    <a href="{{route('product.edit',$product->id)}}" type="button" class="btn btn-primary">Update</a>
                </div>
              </div>
            </div>
          </div>
        @endforeach
      </div>
    </div>

  </div>
</section>

{{$products->links()}}
@endsection

<style>
    svg{
        width: 50px;
    }
    nav{
        text-align: center;
        margin-bottom: 20px;
    }
    .flex{
        display: ;
    }
</style>

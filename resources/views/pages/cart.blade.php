@extends('layouts.master')
@section('content')
    <div class="container mt-5 mb-10" style="display: flex; flex-direction: row;justify-content: space-between">
        <table class="table" style="width: 50%; height: 100%;">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Product</th>
                    <th scope="col"></th>
                    <th scope="col">Category</th>
                    <th scope="col"></th>
                    <th scope="col">Quality</th>
                    <th scope="col"></th>
                    <th scope="col">Price</th>
                </tr>
            </thead>
            <tbody class="table-group-divider">
                @foreach ($carts as $item)
                    <tr>
                        <th scope="row"><a href="" style="text-decoration: none">X</a></th>
                        <td>
                            <img src="{{ asset($item->product->imagepath) }}" alt="" style="width: 100px">
                            <p>{{ $item->product->name }}</p>
                        </td>
                        <td></td>
                        <td>{{ $item->product->category->name }}</td>
                        <td></td>
                        <td>{{ $item->quantity }}</td>
                        <td></td>
                        <td>{{ $item->product->price }}</td>

                    </tr>
                @endforeach
            </tbody>
        </table>
        <table class="table" style="width: 30%; height: 100%; margin-left: 10rem">
            <thead>
                <tr>
                    <th scope="col"></th>
                    <th scope="col">Total Price</th>
                    <th scope="col"></th>
                    <th scope="col"></th>
                    <th scope="col"></th>
                    <th scope="col"></th>
                    <th scope="col"></th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody class="table-group-divider">
                <tr>
                    <th scope="row"></th>
                    <td>{{ $carts->sum(function ($cart) {
                        return $cart->product->price * $cart->quantity;
                    }) }}$</td>
                    <td></td>
                    <td></td>
                    <td><a href="{{route('checkout')}}" class="btn btn-primary">CheckOut</a></td>
                    <td></td>
                    <td><a href="" class="btn btn-primary">Previous</a></td>
                    <td></td>

                </tr>
            </tbody>
        </table>

    </div>
@endsection

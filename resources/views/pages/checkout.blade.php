@extends('layouts.master')
@section('content')
    <div class="container mb-5 mt-5">
        <p style="font-size: 20px; font-weight: 700; margin-left: 10rem">Complete Order</p>
        <div class="accordion" id="accordionPanelsStayOpenExample" style="width: 80%; margin: auto">
            <div class="accordion-item">
                <h2 class="accordion-header">
                    <button class="accordion-button" type="button" data-bs-toggle="collapse"
                        data-bs-target="#panelsStayOpen-collapseOne" aria-expanded="true"
                        aria-controls="panelsStayOpen-collapseOne">
                        User Data
                    </button>
                </h2>
                <div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse show">
                    <div class="accordion-body">
                        <form action="{{route('store.order')}}" method="POST" id="form-order" onsubmit="">
                            @csrf
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Username: </label>
                                <input type="text" class="form-control" id="exampleInputEmail1"
                                    aria-describedby="emailHelp" name="name">
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputPassword1" class="form-label">E-mail</label>
                                <input type="email" class="form-control" id="exampleInputPassword1" name="email">
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputPassword1" class="form-label">Phone Number</label>
                                <input type="text" class="form-control" id="exampleInputPassword1" name="phone">
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputPassword1" class="form-label">Address</label>
                                <input type="text" class="form-control" id="exampleInputPassword1" name="address">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                        data-bs-target="#panelsStayOpen-collapseTwo" aria-expanded="false"
                        aria-controls="panelsStayOpen-collapseTwo">
                        Order
                    </button>
                </h2>
                <div id="panelsStayOpen-collapseTwo" class="accordion-collapse collapse">
                    <div class="accordion-body">
                        <table class="table" style="">
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
                                            <img src="{{ asset($item->product->imagepath) }}" alt=""
                                                style="width: 100px">
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

                    </div>
                </div>
            </div>
        </div>
        <a href="" id="orderSubmit" class="btn btn-success mt-3" style="display: flex; justify-content: center; align-items: center; width: 20%;margin: auto">Complete Order</a>
    </div>
@endsection

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const orderButton = document.getElementById('orderSubmit');

        orderButton.addEventListener('click', function (event) {
            event.preventDefault();
            document.getElementById('form-order').submit();
        });
    });
</script>

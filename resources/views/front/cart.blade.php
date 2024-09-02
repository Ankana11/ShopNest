@extends('front.layouts.app')

@section('main')
     <!-- Single Page Header start -->
     <div class="container-fluid page-header py-5">
        <h1 class="text-center text-white display-6">Cart</h1>
        <ol class="breadcrumb justify-content-center mb-0">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
           
            <li class="breadcrumb-item active text-white">Cart</li>
        </ol>
    </div>
    <!-- Single Page Header End -->

    <!-- Cart Page Start -->
    <div class="container-fluid py-5">
        <div class="container py-5">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                      <tr>
                        <th scope="col">Image</th>
                        <th scope="col">Name</th>
                        <th scope="col">Price</th>
                        <th scope="col">Quantity</th>
                        <th scope="col">Total</th>
                        <th scope="col">Handle</th>
                      </tr>
                    </thead>
                    <tbody>
                        @if(session('cart'))
                            @foreach(session('cart') as $item)
                            <tr>
                                <th scope="row">
                                    <div class="d-flex align-items-center">
                                        @if(isset($item['image']))
                                            <img src="{{ $item['image'] }}" class="img-fluid me-5 rounded-circle" style="width: 80px; height: 80px;" alt="">
                                        @else
                                            <img src="path-to-default-image.jpg" class="img-fluid me-5 rounded-circle" style="width: 80px; height: 80px;" alt="">
                                        @endif
                                    </div>
                                </th>
                                <td>
                                    <p class="mb-0 mt-4">{{ $item['name'] }}</p>
                                </td>
                                <td>
                                    <p class="mb-0 mt-4">Rs.{{ $item['price'] }}</p>
                                </td>
                                <td>
                                    <div class="input-group quantity mt-4" style="width: 100px;">
                                        <div class="input-group-btn">
                                            <button class="btn btn-sm btn-minus rounded-circle bg-light border">
                                            <i class="fa fa-minus"></i>
                                            </button>
                                        </div>
                                        <input type="text" class="form-control form-control-sm text-center border-0" value="{{ $item['quantity'] }}">
                                        <div class="input-group-btn">
                                            <button class="btn btn-sm btn-plus rounded-circle bg-light border">
                                                <i class="fa fa-plus"></i>
                                            </button>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <p class="mb-0 mt-4">Rs.{{ $item['price'] * $item['quantity'] }}</p>
                                </td>
                                <td>
                                    <form action="" method="POST">
                                        @csrf
                                        <button type="submit" class="btn btn-md rounded-circle bg-light border mt-4">
                                            <i class="fa fa-times text-danger"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="6" class="text-center">Your cart is empty</td>
                            </tr>
                        @endif
                    </tbody>
                    
                </table>
            </div>
            <div class="mt-5">
                <a href="" class="btn border-secondary rounded-pill px-4 py-3 text-primary">Continue Shopping</a>
            </div>
            @if(session('cart'))
            <div class="row g-4 justify-content-end">
                <div class="col-8"></div>
                <div class="col-sm-8 col-md-7 col-lg-6 col-xl-4">
                    <div class="bg-light rounded">
                        <div class="p-4">
                            <h1 class="display-6 mb-4">Cart <span class="fw-normal">Total</span></h1>
                            <div class="d-flex justify-content-between mb-4">
                                <h5 class="mb-0 me-4">Subtotal:</h5>
                                <p class="mb-0">Rs.{{ $total = collect(session('cart'))->sum(function($item) { return $item['price'] * $item['quantity']; }) }}</p>
                            </div>
                            <div class="d-flex justify-content-between">
                                <h5 class="mb-0 me-4">Shipping</h5>
                                <div class="">
                                    <p class="mb-0">Flat rate: Rs.100.00</p>
                                </div>
                            </div>
                            <p class="mb-0 text-end">Shipping to your address.</p>
                        </div>
                        <div class="py-4 mb-4 border-top border-bottom d-flex justify-content-between">
                            <h5 class="mb-0 ps-4 me-4">Total</h5>
                            <p class="mb-0 pe-4">Rs.{{ $total + 100 }}</p>
                        </div>
                        <button class="btn border-secondary rounded-pill px-4 py-3 text-primary text-uppercase mb-4 ms-4" type="button">Proceed Checkout</button>
                    </div>
                </div>
            </div>
            @endif
        </div>
    </div>
    <!-- Cart Page End -->
@endsection

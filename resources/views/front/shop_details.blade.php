@extends('front.layouts.app')

@section('main')
      <!-- Single Page Header start -->
      <div class="container-fluid page-header py-5">
        <h1 class="text-center text-white display-6">Shop Detail</h1>
        <ol class="breadcrumb justify-content-center mb-0">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
         
            <li class="breadcrumb-item active text-white">Shop Detail</li>
        </ol>
    </div>
    <!-- Single Page Header End -->


  <!-- Single Product Start -->
<div class="container-fluid py-5 mt-5">
    <div class="container py-5">
        <div class="row g-4 mb-5">
            <div class="col-lg-8 col-xl-9">
                <div class="row g-4">
                    <div class="col-lg-6">
                        <div class="border rounded">
                            <a href="#">
                                <img src="{{ asset($inventry->image) }}" class="img-fluid rounded" alt="Image" name="image">
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <h4 class="fw-bold mb-3">{{ $inventry->name }}</h4>
                        <p class="mb-3">Category: Cloth</p>
                        <h5 class="fw-bold mb-3">Rs.{{ $inventry->price }}/-</h5>
                        <p class="mb-4">{{ $inventry->description }}</p>

                        <form action="{{ route('add_to_cart') }}" method="POST">
                            @csrf
                            <input type="hidden" name="id" value="{{ $inventry->id }}">
                            <input type="hidden" name="name" value="{{ $inventry->name }}">
                            <input type="hidden" name="price" value="{{ $inventry->price }}">
                            <input type="hidden" name="image" value="{{ asset($inventry->image) }}">
                            <div class="input-group quantity mb-5" style="width: 100px;">
                                <div class="input-group-btn">
                                    <button class="btn btn-sm btn-minus rounded-circle bg-light border" type="button">
                                        <i class="fa fa-minus"></i>
                                    </button>
                                </div>
                                <input type="text" name="quantity" class="form-control form-control-sm text-center border-0" value="1">
                                <div class="input-group-btn">
                                    <button class="btn btn-sm btn-plus rounded-circle bg-light border" type="button">
                                        <i class="fa fa-plus"></i>
                                    </button>
                                </div>
                            </div>
                            <button type="submit" class="btn border border-secondary rounded-pill px-4 py-2 mb-4 text-primary">
                                <i class="fa fa-shopping-bag me-2 text-primary"></i> Add to cart
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Single Product End -->

@endsection
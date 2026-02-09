@extends('master')
@section('content')
    <!-- Hero -->
    <section class="hero-banner d-flex align-items-center text-center">
        <div class="container">
            <h1 class="display-4 fw-bold">Best Online Shopping Experience</h1>
            <p class="lead mt-3">Discover amazing products at unbeatable prices</p>
            <a href="#products" class="btn btn-primary btn-lg mt-3">Shop Now</a>
        </div>
    </section>

    <!-- Categories -->
    <section id="categories" class="py-5">
        <div class="container">
            <h2 class="text-center fw-bold mb-4">Shop by Category</h2>
            <div class="row g-4">
                <div class="col-md-4">
                    <div class="card category-card">
                        <a href="{{ url('/category') }}"><img
                                src="https://images.unsplash.com/photo-1512436991641-6745cdb1723f" class="card-img-top"></a>
                        <div class="card-body text-center">
                            <a href="{{ url('/category') }}" class="nav-link text-decoration-none">
                                <h5>Fashion</h5>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card category-card">
                        <a href="{{ url('/category') }}"><img
                                src="https://images.unsplash.com/photo-1511707171634-5f897ff02aa9" class="card-img-top"></a>
                        <div class="card-body text-center">
                            <a href="{{ url('/category') }}" class="nav-link text-decoration-none">
                                <h5>Electronics</h5>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card category-card">
                        <a href="{{ url('/category') }}"><img
                                src="https://images.unsplash.com/photo-1503602642458-232111445657" class="card-img-top"></a>
                        <div class="card-body text-center">
                            <a href="{{ url('/category') }}" class="nav-link text-decoration-none">
                                <h5>Accessories</h5>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Products -->
    <section id="products" class="py-5 bg-light">
        <div class="container">
            <h2 class="text-center fw-bold mb-4">Featured Products</h2>
            <div class="row g-4">

                <!-- Product -->
              @foreach ($products as $product)

                  <div class="col-md-3">
                    <div class="card product-card h-100 text-center ">
                        <a href="{{ url('/test/'.$product->id) }}"><img
                                src="{{asset('backend/images/product/'.$product->image)}}" class="card-img-top"></a>
                        <div class="card-body">
                            <a href="{{ url('/test/'.$product->id) }}" class="nav-link text-decoration-none">
                                <h6>{{ $product->name }}</h6>
                            </a>
                            @if ($product->discount_price != null)
                                  <p class="mb-1">
                                <del class="text-muted">${{ $product->regular_price }}</del>
                                <span class="badge bg-danger ms-1">{{ $product->discount_percentage }}% OFF</span>
                            </p>
                            <p class="fw-bold text-primary">${{ $product->discount_price }}</p>
                            @else
                            <p class="fw-bold text-primary">${{ $product->regular_price }}</p>
                            @endif
                          
                            <button class="btn btn-outline-primary btn-sm"><a class="text-decoration-none" href="{{ url('/add-to-cart/'.$product->id) }}">Add to Cart</a></button>
                        </div>
                    </div>
                </div>
  
              @endforeach

            </div>
        </div>
    </section>
@endsection

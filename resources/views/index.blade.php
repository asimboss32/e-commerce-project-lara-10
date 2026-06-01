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
    <section id="categories" class="py-5">
        <div class="container">
            <h2 class="text-center fw-bold mb-4">Shop by Category</h2>

            <div class="category-slider d-flex overflow-auto">

                @foreach ($categoriesGlobal as $category)
                    <div class="category-item">
                        <div class="card category-card">
                            <a href="{{ url('/category/' . $category->id) }}">
                                <img src="{{ asset('backend/images/category/' . $category->image) }}" class="card-img-top">
                            </a>
                            <div class="card-body text-center p-2">
                                <a href="{{ url('/category/' . $category->id) }}" class="text-decoration-none text-dark">
                                    <h6 class="mb-0">{{ $category->name }}</h6>
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </section>

    <!-- Products -->
    <section id="products" class="py-4 bg-light">
        <div class="container">
            <h4 class="text-center fw-bold mb-4">Featured Products</h4>

            <div class="row g-3">

                @foreach ($products as $product)
                    <div class="col-6 col-md-4 col-lg-3">
                        <div class="card product-card border-0 shadow-sm h-100 text-center">

                            <!-- Product Image -->
                            <a href="{{ url('/test/' . $product->id) }}">
                                <img src="{{ asset('backend/images/product/' . $product->image) }}"
                                    class="card-img-top img-fluid product-img" alt="{{ $product->name }}">
                            </a>

                            <div class="card-body p-2">

                                <!-- Product Name -->
                                <a href="{{ url('/test/' . $product->id) }}" class="text-dark text-decoration-none">
                                    <h6 class="mb-1 small fw-semibold">
                                        {{ Str::limit($product->name, 35) }}
                                    </h6>
                                </a>

                                <!-- Price Section -->
                                @if ($product->discount_price != null)
                                    <p class="mb-1 small">
                                        <del class="text-muted">
                                            ${{ $product->regular_price }}
                                        </del>
                                        <span class="badge bg-danger ms-1">
                                            {{ $product->discount_percentage }}% OFF
                                        </span>
                                    </p>
                                    <p class="fw-bold text-primary mb-2 small">
                                        ${{ $product->discount_price }}
                                    </p>
                                @else
                                    <p class="fw-bold text-primary mb-2 small">
                                        ${{ $product->regular_price }}
                                    </p>
                                @endif

                                <!-- Button -->
                                <a href="{{ url('/add-to-cart/' . $product->id) }}" class="btn btn-sm btn-primary w-100">
                                    Add to Cart
                                </a>

                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </section>
@endsection

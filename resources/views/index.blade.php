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
                <div class="col-md-3">
                    <div class="card product-card h-100 text-center ">
                        <a href="{{ url('/details') }}"><img
                                src="https://images.unsplash.com/photo-1526170375885-4d8ecf77b99f" class="card-img-top"></a>
                        <div class="card-body">
                            <a href="{{ url('/details') }}" class="nav-link text-decoration-none">
                                <h6>Smart Watch</h6>
                            </a>
                            <p class="mb-1">
                                <del class="text-muted">$129</del>
                                <span class="badge bg-danger ms-1">23% OFF</span>
                            </p>
                            <p class="fw-bold text-primary">$99</p>
                            <button class="btn btn-outline-primary btn-sm">Add to Cart</button>
                        </div>
                    </div>
                </div>

                <!-- Product -->
                <div class="col-md-3">
                    <div class="card product-card h-100 text-center">
                        <a href="{{ url('/details') }}"><img
                                src="https://images.unsplash.com/photo-1505740420928-5e560c06d30e" class="card-img-top"></a>
                        <div class="card-body">
                            <a href="{{ url('/details') }}" class="nav-link text-decoration-none">
                                <h6>Headphone</h6>
                            </a>
                            <p class="mb-1">
                                <del class="text-muted">$99</del>
                                <span class="badge bg-danger ms-1">20% OFF</span>
                            </p>
                            <p class="fw-bold text-primary">$79</p>
                            <button class="btn btn-outline-primary btn-sm">Add to Cart</button>
                        </div>
                    </div>
                </div>

                <!-- Product -->
                <div class="col-md-3">
                    <div class="card product-card h-100 text-center">
                        <a href="{{ url('/details') }}"><img
                                src="https://images.unsplash.com/photo-1542291026-7eec264c27ff" class="card-img-top"></a>
                        <div class="card-body">
                            <a href="{{ url('/details') }}" class="nav-link text-decoration-none">
                                <h6>Running Shoes</h6>
                            </a>
                            <p class="mb-1">
                                <del class="text-muted">$150</del>
                                <span class="badge bg-danger ms-1">20% OFF</span>
                            </p>
                            <p class="fw-bold text-primary">$120</p>
                            <button class="btn btn-outline-primary btn-sm">Add to Cart</button>
                        </div>
                    </div>
                </div>

                <!-- Product -->
                <div class="col-md-3">
                    <div class="card product-card h-100 text-center">
                        <a href="{{ url('/details') }}"><img
                                src="https://images.unsplash.com/photo-1523275335684-37898b6baf30" class="card-img-top"></a>
                        <div class="card-body">
                            <a href="{{ url('/details') }}" class="nav-link text-decoration-none">
                                <h6>Digital Watch</h6>
                            </a>
                            <p class="mb-1">
                                <del class="text-muted">$79</del>
                                <span class="badge bg-danger ms-1">25% OFF</span>
                            </p>
                            <p class="fw-bold text-primary">$59</p>
                            <button class="btn btn-outline-primary btn-sm">Add to Cart</button>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
@endsection

@extends('master')
@section('content')
    <!-- Page Header -->
    <section class="py-4 bg-light">
        <div class="container">
            <h2 class="fw-bold">Shop Products</h2>
            <p class="text-muted mb-0">Browse all available products</p>
        </div>
    </section>

    <!-- Shop Layout -->
    <section class="py-5">
        <div class="container">
            <div class="row g-4">

                <!-- Filters -->
                <div class="col-lg-3">
                    <div class="filter-box p-3">
                        <h5 class="fw-bold">Categories</h5>
                        <ul class="list-unstyled">
                            <li><input type="checkbox"> Fashion</li>
                            <li><input type="checkbox"> Electronics</li>
                            <li><input type="checkbox"> Accessories</li>
                        </ul>
                        <hr>
                        <h5 class="fw-bold">Price</h5>
                        <input type="range" class="form-range">
                        <p class="small">$0 - $500</p>
                        <hr>
                        <button class="btn btn-primary w-100">Apply Filter</button>
                    </div>
                </div>

                <!-- Products -->
                <div class="col-lg-9">
                    <div class="row g-4">

                        <div class="col-md-4">
                            <div class="card product-card h-100">
                                <a href="{{ url('/details') }}"><img
                                        src="https://images.unsplash.com/photo-1526170375885-4d8ecf77b99f"
                                        class="card-img-top"></a>
                                <div class="card-body text-center">
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

                        <div class="col-md-4">
                            <div class="card product-card h-100">
                                <a href="{{ url('/details') }}"><img
                                        src="https://images.unsplash.com/photo-1505740420928-5e560c06d30e"
                                        class="card-img-top"></a>
                                <div class="card-body text-center">
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

                        <div class="col-md-4">
                            <div class="card product-card h-100">
                                <a href="{{ url('/details') }}"><img
                                        src="https://images.unsplash.com/photo-1542291026-7eec264c27ff"
                                        class="card-img-top"></a>
                                <div class="card-body text-center">
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

                        <div class="col-md-4">
                            <div class="card product-card h-100">
                                <a href="{{ url('/details') }}"><img
                                        src="https://images.unsplash.com/photo-1523275335684-37898b6baf30"
                                        class="card-img-top"></a>
                                <div class="card-body text-center">
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

                    <!-- Pagination -->
                    <nav class="mt-4">
                        <ul class="pagination justify-content-center">
                            <li class="page-item disabled"><a class="page-link">Previous</a></li>
                            <li class="page-item active"><a class="page-link">1</a></li>
                            <li class="page-item"><a class="page-link">2</a></li>
                            <li class="page-item"><a class="page-link">Next</a></li>
                        </ul>
                    </nav>

                </div>
            </div>
        </div>
    </section>
@endsection

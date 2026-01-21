@extends('master')
@section('content')
     <!-- Category Banner -->
<div class="row g-4">

    <!-- Product 1 -->
    <div class="col-md-4">
        <div class="card product-card h-100">
            <a href="product-details.html">
                <img 
                    src="https://images.unsplash.com/photo-1542291026-7eec264c27ff"
                    class="card-img-top"
                    alt="Running Shoes"
                >
            </a>
            <div class="card-body text-center">
                <a href="product-details.html" class="nav-link text-decoration-none">
                    <h6>Running Shoes</h6>
                </a>
                <p class="mb-1">
                    <del class="text-muted">$79</del>
                    <span class="badge bg-danger ms-1">25% OFF</span>
                </p>
                <p class="fw-bold text-primary">$59</p>
                <button class="btn btn-outline-primary btn-sm">
                    Add to Cart
                </button>
            </div>
        </div>
    </div>

    <!-- Product 2 -->
    <div class="col-md-4">
        <div class="card product-card h-100">
            <a href="product-details.html">
                <img 
                    src="https://images.unsplash.com/photo-1523275335684-37898b6baf30"
                    class="card-img-top"
                    alt="Digital Watch"
                >
            </a>
            <div class="card-body text-center">
                <a href="{{ url('/details') }}" class="nav-link text-decoration-none">
                    <h6>Digital Watch</h6>
                </a>
                <p class="mb-1">
                    <del class="text-muted">$79</del>
                    <span class="badge bg-danger ms-1">25% OFF</span>
                </p>
                <p class="fw-bold text-primary">$59</p>
                <button class="btn btn-outline-primary btn-sm">
                    Add to Cart
                </button>
            </div>
        </div>
    </div>

    <!-- Product 3 -->
    <div class="col-md-4">
        <div class="card product-card h-100">
            <a href="{{ url('/details') }}">
                <img 
                    src="https://images.unsplash.com/photo-1505740420928-5e560c06d30e"
                    class="card-img-top"
                    alt="Headphone"
                >
            </a>
            <div class="card-body text-center">
                <a href="{{ url('/details') }}" class="nav-link text-decoration-none">
                    <h6>Headphone</h6>
                </a>
                <p class="mb-1">
                    <del class="text-muted">$79</del>
                    <span class="badge bg-danger ms-1">25% OFF</span>
                </p>
                <p class="fw-bold text-primary">$59</p>
                <button class="btn btn-outline-primary btn-sm">
                    Add to Cart
                </button>
            </div>
        </div>
    </div>

</div>

<!-- Pagination -->
<nav class="mt-4">
    <ul class="pagination justify-content-center">
        <li class="page-item disabled">
            <a class="page-link">Previous</a>
        </li>
        <li class="page-item active">
            <a class="page-link">1</a>
        </li>
        <li class="page-item">
            <a class="page-link">2</a>
        </li>
        <li class="page-item">
            <a class="page-link">Next</a>
        </li>
    </ul>
</nav>

</section>

@endsection
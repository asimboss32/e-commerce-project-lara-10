@extends('master')
@section('content')
  <!-- Product Section -->
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

                      @foreach ($products as $product)
                            <div class="col-md-4">
                            <div class="card product-card h-100">
                                <a href="{{ url('/test/'.$product->id) }}"><img
                                        src="{{asset('backend/images/product/'.$product->image)}}"
                                        class="card-img-top"></a>
                                <div class="card-body text-center">
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
                                    <button class="btn btn-outline-primary btn-sm">Add to Cart</button>
                                </div>
                            </div>
                        </div>
                      @endforeach

                       

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

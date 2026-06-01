@extends('master')
@section('content')
    <!-- Page Header -->
    <section class="py-3 bg-light">
        <div class="container">
            <h4 class="fw-bold mb-1">Shop Products</h4>
            <p class="text-muted small mb-0">Browse all available products</p>
        </div>
    </section>

    <!-- Shop Layout -->
    <section class="py-4">
        <div class="container">
            <div class="row">

                <!-- Filters -->
                <div class="col-lg-3 mb-4">
                    <div class="filter-box p-3 shadow-sm bg-white rounded">

                        <h6 class="fw-bold mb-3">Categories</h6>

                        <form action="/product" method="GET">
                            <ul class="list-unstyled">

                                @foreach ($categoriesGlobal as $category)
                                    <li class="mb-2">
                                        <label class="d-flex align-items-center small">
                                            <input type="radio" name="cat_id" value="{{ $category->id }}" class="me-2"
                                                onchange="this.form.submit()">
                                            {{ $category->name }}
                                        </label>
                                    </li>
                                @endforeach

                            </ul>
                        </form>

                        <hr>

                        <h6 class="fw-bold mb-3">Price Range</h6>

                        <input type="range" class="form-range" min="0" max="500">

                        <div class="d-flex justify-content-between small text-muted">
                            <span>$0</span>
                            <span>$500</span>
                        </div>

                    </div>
                </div>

                <!-- Products -->
                <div class="col-lg-9">
                    <div class="row g-3">

                        @foreach ($products as $product)
                            <div class="col-6 col-md-4 col-lg-4">
                                <div class="card product-card border-0 shadow-sm h-100">

                                    <a href="{{ url('/test/' . $product->id) }}">
                                        <img src="{{ asset('backend/images/product/' . $product->image) }}"
                                            class="card-img-top product-img" alt="{{ $product->name }}">
                                    </a>

                                    <div class="card-body p-2 text-center">

                                        <a href="{{ url('/test/' . $product->id) }}" class="text-decoration-none text-dark">
                                            <h6 class="small fw-semibold mb-1">
                                                {{ \Illuminate\Support\Str::limit($product->name, 30) }}
                                            </h6>
                                        </a>

                                        @if ($product->discount_price != null)
                                            <p class="mb-1 small">
                                                <del class="text-muted">
                                                    ${{ $product->regular_price }}
                                                </del>
                                                <span class="badge bg-danger ms-1">
                                                    {{ $product->discount_percentage }}% OFF
                                                </span>
                                            </p>

                                            <p class="fw-bold text-primary small mb-2">
                                                ${{ $product->discount_price }}
                                            </p>
                                        @else
                                            <p class="fw-bold text-primary small mb-2">
                                                ${{ $product->regular_price }}
                                            </p>
                                        @endif

                                        <a href="{{ url('/add-to-cart/' . $product->id) }}"
                                            class="btn btn-sm btn-primary w-100">
                                            Add to Cart
                                        </a>

                                    </div>
                                </div>
                            </div>
                        @endforeach

                    </div>
                </div>

            </div>
        </div>
    </section>


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

@push('script')
    <script>
        function submitFilterForm() {
            document.getElementById('collapseOn').submit();
        }
    </script>
@endpush

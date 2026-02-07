@extends('master')
@section('content')
     <!-- Category Banner -->
<div class="row g-4">

    <!-- Product 1 -->
 @foreach ($products as $product)
      <div class="col-md-3">
        <div class="card product-card h-100">
            <a href="{{url('/test/'.$product->id)}}">
                <img 
                    src="{{asset('backend/images/product/'.$product->image)}}"
                    class="card-img-top"
                    alt="Running Shoes"
                >
            </a>
            <div class="card-body text-center">
                <a href="{{url('/test/'.$product->id)}}" class="nav-link text-decoration-none">
                    <h6>{{ $product->name }}</h6>
                </a>
                <p class="mb-1">
                    <del class="text-muted">${{ $product->regular_price }}</del>
                    <span class="badge bg-danger ms-1">{{ $product->discount_percentage }}% OFF</span>
                </p>
                <p class="fw-bold text-primary">${{ $product->discount_price }}</p>
                <button class="btn btn-outline-primary btn-sm">
                    Add to Cart
                </button>
            </div>
        </div>
    </div>  
 @endforeach


    

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
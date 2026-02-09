@extends('master')
@section('content')
    <!-- Product Section -->
<section class="py-5">
    <div class="container">
        <div class="row g-4">

            <!-- Images -->
            <div class="col-lg-6">

                <div id="productSlider" class="carousel slide mb-3" data-bs-ride="carousel">
                    <div class="carousel-inner">

                      @foreach ($products->galleryImages as $image)
                            <div class="carousel-item active">
                            <div class="zoom-box">
                                <img src="{{ asset('backend/images/galleryImage/'.$image->image) }}"
                                     class="d-block w-100 product-img-main">
                            </div>
                        </div>
                      @endforeach

                    </div>
                </div>

                <!-- Thumbnails -->
                <div class="d-flex gap-2">
                    @foreach ($products->galleryImages as $image)
                        <img src="{{ asset('backend/images/galleryImage/'.$image->image) }}"
                             class="thumb-img active" onclick="slideTo({{ $loop->index }},this)">
                    @endforeach
                </div>

            </div>

            <!-- Info -->
            <div class="col-lg-6">
                <h2 class="fw-bold">{{ $products->name }}</h2>

                <div class="rating mb-2">
                    <i class="bi bi-star-fill"></i>
                    <i class="bi bi-star-fill"></i>
                    <i class="bi bi-star-fill"></i>
                    <i class="bi bi-star-fill"></i>
                    <i class="bi bi-star"></i>
                    <span class="text-muted ms-2">(124 reviews)</span>
                </div>

                <p>
                    <span class="text-muted fs-5"><del>${{ $products->regular_price }}</del></span>
                    <span class="price ms-2">${{ $products->discount_price }}</span>
                    <span class="badge bg-success ms-2">{{ $products->discount_percentage }}% OFF</span>
                </p>

                <p class="text-muted">{!! $products->description !!}</p>

             <form action="{{ url('/add-to-cart-details/'.$products->id) }}" method="POST">
                @csrf
                   <!-- Size -->
                <div class="mb-3">
                    <label class="fw-bold">Size</label>
                    <div class="d-flex gap-2 mt-1">
                        @foreach ($products->sizes as $size)
                            <div class="border size-btn"> <input type="radio" name="size" value="{{ $size->size }}"class="category-item-radio"> {{ $size->size }}</div>
                        @endforeach

                        
                    </div>
                </div>

                <!-- Color -->
                <div class="mb-3">
                    <label class="fw-bold">Color</label>
                    <div class="d-flex gap-2 mt-1">
                         @foreach ($products->colors as $color)
                                        <div class="product-details-select-item-outer">
                                            <input type="radio" name="color" id="color-{{ $color->id }}" value="{{$color->color_name}}" class="category-item-radio">
                                            <label for="color-{{ $color->id }}" class="category-item-label">
                                                {{$color->color_name}}
                                            </label>
                                        </div>
                                        @endforeach
                    </div>
                </div>

                <!-- Quantity -->
                <div class="d-flex align-items-center gap-3 my-3">
                    <a class="btn btn-outline-secondary" onclick="qty(-1)">-</a>
                    <input type="text" name="quantity"  class="form-control w-25 text-center" id="quantity" value="1">
                    <a class="btn btn-outline-secondary" onclick="qty(1)">+</a>
                </div>

                <button class="btn btn-primary btn-lg" type="submit" value="ad_to_cart" name="action">
                    <i class="bi bi-cart-plus"></i> Add to Cart
                </button>
                <button class="btn btn-primary btn-lg" type="submit" name="action" value="buy_now">
                     
                    <i class="bi bi-cart-plus"></i> Quick Buy
                </button>
             </form>

            </div>
        </div>
    </div>
</section>

<!-- Reviews -->
<section class="py-4 bg-light">
    <div class="container">
        <h4 class="fw-bold mb-3">Customer Reviews</h4>

        <div class="border rounded p-3 bg-white">
            <strong>Rahim</strong>
            <div class="rating">
                <i class="bi bi-star-fill"></i>
                <i class="bi bi-star-fill"></i>
                <i class="bi bi-star-fill"></i>
                <i class="bi bi-star-fill"></i>
                <i class="bi bi-star"></i>
            </div>
            <p class="text-muted mb-0">Very comfortable shoes.</p>
        </div>
    </div>
</section>

<!-- Related Products -->
<section class="py-5">
    <div class="container">
        <h4 class="fw-bold mb-4">Related Products</h4>

        <div class="row g-4">
            <div class="col-md-3">
                <div class="card h-100">
                    <img src="https://images.unsplash.com/photo-1523275335684-37898b6baf30" class="card-img-top">
                    <div class="card-body text-center">
                        <h6>Smart Watch</h6>
                        <p class="fw-bold text-primary">$89</p>
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="card h-100">
                    <img src="https://images.unsplash.com/photo-1505740420928-5e560c06d30e" class="card-img-top">
                    <div class="card-body text-center">
                        <h6>Headphone</h6>
                        <p class="fw-bold text-primary">$79</p>
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="card h-100">
                    <img src="https://images.unsplash.com/photo-1585386959984-a4155224a1a1" class="card-img-top">
                    <div class="card-body text-center">
                        <h6>Sports Bag</h6>
                        <p class="fw-bold text-primary">$49</p>
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="card h-100">
                    <img src="https://images.unsplash.com/photo-1512436991641-6745cdb1723f" class="card-img-top">
                    <div class="card-body text-center">
                        <h6>Jacket</h6>
                        <p class="fw-bold text-primary">$99</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section> 
@endsection
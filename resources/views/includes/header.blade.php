
 <nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top">
        <div class="container">
            <a class="navbar-brand fw-bold" href="{{ url('/') }}">MyShop</a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navMenu">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navMenu">
                <ul class="navbar-nav me-3">
                    <li class="nav-item">
                        <a class="nav-link active" href="{{ url('/') }}">Home</a>
                    </li>

                    <!-- Categories Hover Dropdown -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">
                            Categories
                        </a>
                        <ul class="dropdown-menu">
                            @foreach ($categoriesGlobal as $category)
                                <li><a class="dropdown-item" href={{ url('/category/'.$category->id) }}>{{ $category->name }}</a></li>
                                @endforeach
                        </ul>
                            
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/product') }}">Products</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/contact') }}">Contact</a>
                    </li>
                </ul>

                <form action="{{ url('/search-products') }}" method="GET" class="d-flex mx-auto" style="max-width:400px;">
                    @csrf
                    <input class="form-control me-2" type="search" name="search" placeholder="Search products">
                    <button class="btn btn-outline-light">Search</button>
                </form>

                <!-- Cart -->
                <div class="dropdown ms-auto">
                    <a class="btn btn-outline-light dropdown-toggle" data-bs-toggle="dropdown">
                        <i class="bi bi-cart"></i> Cart ({{ $cartProducts->count() }})
                    </a>
                    <div class="dropdown-menu dropdown-menu-end p-3" style="min-width:300px;">
                        @php
                            $totalCartPrice = 0;
                        @endphp
                       @foreach ($cartProducts as $cartProduct)
                       @php
                           $totalCartPrice = $totalCartPrice + $cartProduct->quantity*$cartProduct->price;
                       @endphp
                            <div class="d-flex align-items-center mb-2">
                            <img src="{{ asset('backend/images/product/'.$cartProduct->product->image) }}" width="50"
                                class="rounded me-2">
                            <div class="flex-grow-1">
                                <p class="mb-0">{{ $cartProduct->product->name }}</p>
                                <small>${{ $cartProduct->price }}</small>
                            </div>
                           <a href="{{ url('/remove-from-cart/'.$cartProduct->id) }}" class="btn btn-sm btn-danger">Remove</a>
                        </div>
                       @endforeach
                        <hr>
                        <p class="fw-bold">Total: ${{ $totalCartPrice }}</p>
                        <div class="d-grid gap-2">
                            <a href="{{ url('/cart') }}" class="btn btn-outline-primary btn-sm">View Cart</a>
                            <a href="{{ url('/checkout') }}" class="btn btn-primary btn-sm">Checkout</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </nav>
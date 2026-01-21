@extends('master')
@section('content')
  <section class="py-5">
        <div class="container">
            <h2 class="fw-bold mb-4">Your Cart</h2>
            <div class="row">
                <div class="col-md-8">
                    <ul class="list-group mb-3" id="cart-items">
                        <li class="list-group-item d-flex align-items-center justify-content-between">
                            <img src="https://images.unsplash.com/photo-1526170375885-4d8ecf77b99f"
                                class="product-cart-img me-3">
                            <div class="flex-grow-1">
                                <p class="mb-1">Smart Watch</p>
                                <small>Size: M | Color: Black</small>
                                <div class="d-flex align-items-center gap-2 mt-1 qty-box">
                                    <button class="btn btn-sm btn-outline-secondary"
                                        onclick="updateQty(this,-1)">-</button>
                                    <input type="text" class="form-control form-control-sm qty-input" value="1"
                                        readonly>
                                    <button class="btn btn-sm btn-outline-secondary"
                                        onclick="updateQty(this,1)">+</button>
                                    <span class="remove-btn ms-2" onclick="removeItem(this)">×</span>
                                </div>
                            </div>
                            <strong class="ms-2 item-price">$99</strong>
                        </li>
                    </ul>
                    <a href="{{ url('/checkout') }}" class="btn btn-primary">Proceed to Checkout</a>
                </div>

                <div class="col-md-4">
                    <div class="card shadow-sm">
                        <div class="card-body">
                            <h5 class="fw-bold mb-3">Summary</h5>
                            <ul class="list-group mb-3">
                                <li class="list-group-item d-flex justify-content-between">
                                    <span>Sub Total</span>
                                    <strong id="subtotal">$99</strong>
                                </li>
                                <li class="list-group-item d-flex justify-content-between">
                                    <span>Delivery Charge</span>
                                    <strong id="delivery-charge">$10</strong>
                                </li>
                                <li class="list-group-item d-flex justify-content-between fw-bold">
                                    <span>Total</span>
                                    <strong id="total">$109</strong>
                                </li>
                            </ul>
                            <a href="{{ url('/checkout') }}" class="btn btn-primary w-100">Checkout</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>  
@endsection
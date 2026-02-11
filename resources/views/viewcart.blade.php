@extends('master')
@section('content')
  <section class="py-5">
        <div class="container">
            <h2 class="fw-bold mb-4">Your Cart</h2>
            <div class="row">
                <div class="col-md-8">
                    <?php
                        
                        $subtotal = 0;
                        ?>
                  @foreach ($cartProducts as $cartProduct)
                  <?php 
                          $subtotal = $subtotal+ $cartProduct->quantity*$cartProduct->price
                          ?>
                        <ul class="list-group mb-3" id="cart-items">
                        <li class="list-group-item d-flex align-items-center justify-content-between">
                            <img src="{{ asset('backend/images/product/'.$cartProduct->product->image) }}"
                                class="product-cart-img me-3">
                            <div class="flex-grow-1">
                                <p class="mb-1">{{ $cartProduct->product->name }}</p>
                                <small>Size: {{ $cartProduct->size }} | Color: {{ $cartProduct->color }}</small>
                                <div class="d-flex align-items-center gap-2 mt-1 qty-box">
                                    
                                    <input type="text" class="form-control form-control-sm qty-input" value="{{ $cartProduct->quantity }}"
                                        readonly>
                                    
                                    <a href="{{ url('/remove-from-cart/'.$cartProduct->id) }}" class="btn btn-sm btn-danger">Remove</a>
                                </div>
                            </div>
                            <strong class="ms-2 item-price">${{ $cartProduct->quantity * $cartProduct->price }}</strong>
                        </li>
                        
                    </ul>
                  @endforeach
                    
                    <a href="{{ url('/checkout') }}" class="btn btn-primary">Proceed to Checkout</a>
                </div>

                <div class="col-md-4">
                    <div class="card shadow-sm">
                        <div class="card-body">
                            <h5 class="fw-bold mb-3">Summary</h5>
                            <ul class="list-group mb-3">
                                <li class="list-group-item d-flex justify-content-between">
                                    <span>Sub Total</span>
                                    <strong id="subtotal">${{$subtotal}}</strong>
                                </li>
                                <li class="list-group-item d-flex justify-content-between">
                                    <span>Delivery Charge</span>
                                    <strong id="delivery-charge">$100</strong>
                                </li>
                                <li class="list-group-item d-flex justify-content-between fw-bold">
                                    <span>Total</span>
                                    <strong id="total">${{$subtotal+100}}</strong>
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
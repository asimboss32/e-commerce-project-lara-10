@extends('master')
@section('content')
   <section class="py-5">
        <div class="container">
            <div class="row g-4">
                <!-- Billing Details -->
                <div class="col-md-7">
                    <div class="card shadow-sm">
                        <div class="card-body">
                            <h5 class="fw-bold mb-3">Billing Details</h5>
                            <form>
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">First Name</label>
                                        <input type="text" class="form-control" required>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Last Name</label>
                                        <input type="text" class="form-control" required>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Email</label>
                                    <input type="email" class="form-control" required>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Phone</label>
                                    <input type="text" class="form-control" required>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Address</label>
                                    <textarea class="form-control" rows="3" required></textarea>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>

                <!-- Order Summary -->
                <div class="col-md-5">
                    <div class="card shadow-sm">
                        <div class="card-body">
                            <h5 class="fw-bold mb-3">Order Summary</h5>
                            <ul class="list-group mb-3" id="order-items">
                                <li class="list-group-item d-flex align-items-center justify-content-between">
                                    <img src="https://images.unsplash.com/photo-1526170375885-4d8ecf77b99f"
                                        class="product-cart-img me-2">
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

                            <h6 class="fw-bold">Payment Method</h6>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="payment" checked>
                                <label class="form-check-label">Cash on Delivery</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="payment">
                                <label class="form-check-label">Credit / Debit Card</label>
                            </div>
                            <div class="form-check mb-3">
                                <input class="form-check-input" type="radio" name="payment">
                                <label class="form-check-label">PayPal</label>
                            </div>

                            <button class="btn btn-primary w-100">Place Order</button>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section> 
@endsection
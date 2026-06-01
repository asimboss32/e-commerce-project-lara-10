@extends('backend.master')

@section('content')
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>All Orders</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">All Orders</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">All Orders List</h3>
                        </div>
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Sl</th>
                                        <th>Invoice Number</th>
                                        <th>Product</th>
                                        <th>Customer Info</th>
                                        <th>Courier Name</th>
                                        <th>Current Status</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($orders as $order)
                                    <tr>
                                        <td>{{ $loop->index + 1 }}</td>
                                        <td>{{ $order->invoice_no }}</td>
                                        <td>
                                            @foreach ($order->orderDetails as $detail)
                                                <img src="{{ asset('backend/images/product/' . ($detail->product->image ?? 'default.png')) }}"
                                                     alt="Product Image" height="100" width="100"><br>
                                                {{ $detail->quantity }} x {{ $detail->product->name ?? 'N/A' }}<br>
                                            @endforeach
                                        </td>
                                        <td>
                                            Name: {{ $order->customer_name }} <br>
                                            Phone: {{ $order->customer_phone }} <br>
                                            Address: {{ $order->customer_address }} <br>
                                            Price: {{ $order->price }} <br>
                                        </td>
                                        <td>{{ $order->courier_name ?? 'Not Selected' }}</td>
                                        <td>
                                            @php
                                                $statusClass = [
                                                    'pending' => 'badge-warning',
                                                    'confirmed' => 'badge-success',
                                                    'delivered' => 'badge-info',
                                                    'cancelled' => 'badge-danger',
                                                ][$order->status] ?? 'badge-secondary';
                                            @endphp
                                            <span class="badge {{ $statusClass }}">{{ ucfirst($order->status) }}</span>
                                        </td>
                                        <td>
                                            <a href="{{ url('admin/order/update-status/pending/'.$order->id) }}" class="btn btn-warning">Pending</a>
                                            <a href="{{ url('admin/order/update-status/confirmed/'.$order->id) }}" class="btn btn-success">Confirm</a>
                                            <a href="{{ url('admin/order/update-status/delivered/'.$order->id) }}" class="btn btn-info">Delivered</a>
                                            <a href="{{ url('admin/order/update-status/cancelled/'.$order->id) }}" class="btn btn-danger">Cancel</a>
                                        </td>
                                        <td>
                                            <a href="{{ url('admin/order/edit/'.$order->id) }}" class="btn btn-primary">Edit</a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection

@push('script')
<script>
    $(function () {
        $("#example1").DataTable({
            responsive: true,
            lengthChange: false,
            autoWidth: false,
            buttons: ["copy", "csv", "excel", "pdf", "print", "colvis"]
        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    });
</script>
@endpush

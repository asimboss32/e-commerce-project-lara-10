@extends('backend.master')

@section('content')
    <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Order Details</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Order Details</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <form action="{{url('admin/order/update/'.$order->id)}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-md-6">
              <div class="card card-primary">
                <div class="card-header">
                  <h3 class="card-title">Customer Details</h3>
    
                  <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                      <i class="fas fa-minus"></i>
                    </button>
                  </div>
                </div>
                <div class="card-body">
                  <div class="form-group">
                    <label for="invoiceid">Invoice Number</label>
                    <input type="text" id="invoiceid" name="invoice_no" class="form-control" value="{{$order->invoice_no}}" readonly>
                  </div>
                  <div class="form-group">
                    <label for="inputDescription">Customer Name</label>
                    <input type="text" id="" name="customer_name" class="form-control" value="{{$order->customer_name}}" required>
                  </div>
                  <div class="form-group">
                    <label for="inputDescription">Customer Phone</label>
                    <input type="text" id="" name="customer_phone" class="form-control" value="{{$order->customer_phone}}" required>
                  </div>
                  <div class="form-group">
                    <label for="inputDescription">Customer Address</label>
                    <textarea id="inputDescription" name="customer_address" class="form-control" rows="4" required>{{$order->customer_address}}</textarea>
                  </div>
                  <div class="form-group">
                    <label for="inputDescription">Delivery Charge</label>
                    <input type="text" id="area" name="delivery_charge" class="form-control" value="{{$order->delivery_charge}}" required>
                  </div>
                  <div class="form-group">
                    <label for="inputStatus">Select Courier</label>
                    <select id="inputStatus" name="courier_name" class="form-control custom-select">
                      @if ($order->courier_name == null)
                        <option disabled selected>Select one</option>
                        <option value="steadfast">Steadfast</option>
                        <option value="pathao">Pathao</option>
                        <option value="others">Others</option>

                        @elseif ($order->courier_name == "steadfast")
                          <option value="steadfast" selected>Steadfast</option>
                          <option value="pathao">Pathao</option>
                          <option value="others">Others</option>

                        @elseif ($order->courier_name == "pathao")
                          <option value="pathao" selected>Pathao</option>
                          <option value="steadfast">Steadfast</option>
                          <option value="others">Others</option>
                        @else
                          <option value="others" selected>Others</option>
                          <option value="pathao">Pathao</option>
                          <option value="steadfast">Steadfast</option>
                      @endif

                    </select>
                  </div>
                </div>
                <!-- /.card-body -->
              </div>
              <!-- /.card -->
            </div>
            <div class="col-md-6">
              <div class="card card-secondary">
                <div class="card-header">
                  <h3 class="card-title">Product Details</h3>
    
                  <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                      <i class="fas fa-minus"></i>
                    </button>
                  </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            @foreach ($order->orderDetails as $details)
                            <img src="{{asset('backend/images/product/'.$details->product->image)}}" height="100" width="100">
                            {{$details->qty}} X {{$details->product->name}} | Unit Price: {{$details->price}} | Color: {{$details->color??'N.A'}} | Size: {{$details->size??'N.A'}}<br><br>
                            @endforeach
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="inputDescription">Order Price</label>
                                <input type="text" id="" name="price" class="form-control" value="{{$order->price}}" required>
                            </div>
                        </div>
                    </div>
                    <input type="submit" value="Update Order" class="btn btn-success float-right">
                </div>
                <!-- /.card-body -->
              </div>
              
            </div>
          </div>
      </form>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection

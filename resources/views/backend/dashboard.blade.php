@extends('backend.master')

@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Info boxes -->
        <div class="row">
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box">
              <span class="info-box-icon bg-info elevation-1"><i class="fas fa-cog"></i></span>

            {{-- <a href="{{url('admin/all-order/list')}}" class="text-white"> --}}
              <div class="info-box-content">
                  <span class="info-box-text">Total Orders</span>
                  <span class="info-box-number">
                    {{-- {{$totalOrders}} --}}
                  </span>
              </div>
            </a>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-thumbs-up"></i></span>

              {{-- <a href="{{url('admin/status-wise-order/pending')}}" class="text-white"> --}}
                <div class="info-box-content">
                <span class="info-box-text">Pending Orders</span>
                {{-- <span class="info-box-number">{{$pendingOrders}}</span> --}}
              </div>
              </a>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->

          <!-- fix for small devices only -->
          <div class="clearfix hidden-md-up"></div>

          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-success elevation-1"><i class="fas fa-shopping-cart"></i></span>

              {{-- <a href="{{url('admin/status-wise-order/confirmed')}}" class="text-white"> --}}
                <div class="info-box-content">
                <span class="info-box-text">Confirmed Orders</span>
                {{-- <span class="info-box-number">{{$confirmedOrders}}</span> --}}
              </div>
              </a>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-users"></i></span>

              {{-- <a href="{{url('admin/status-wise-order/delivered')}}" class="text-white"> --}}
                <div class="info-box-content">
                <span class="info-box-text">Delivered Orders</span>
                {{-- <span class="info-box-number">{{$deliveredOrders}}</span> --}}
              </div>
              </a>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>

          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-users"></i></span>

              {{-- <a href="{{url('admin/status-wise-order/cancelled')}}" class="text-white"> --}}
                <div class="info-box-content">
                <span class="info-box-text">Cancelled Orders</span>
                {{-- <span class="info-box-number">{{$cancelledOrders}}</span> --}}
              </div>
              </a>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div><!--/. container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection 
@extends('backend.master')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Edit Product</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Edit Product</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <!-- left column -->
                    <div class="col-md-12">
                        <!-- general form elements -->
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Add New Product</h3>
                            </div>
                            <form action="{{ url('/product/update/'.$product->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="name">Product Name*</label>
                                        <input type="text" class="form-control" value="{{$product->name}}" name="name" id="name"
                                            placeholder="Enter product name" >
                                    </div>
                                    <div class="form-group">
                                        <label for="name">Product Code</label>
                                        <input type="text" class="form-control" value="{{$product->sku_code}}" name="sku_code" id="sku_code"
                                            placeholder="Enter product code">
                                    </div>
                                    <div class="form-group">
                                        <label for="name">Select Category*</label>
                                        <select name="cat_id" class="form-control">
                                            <option selected disabled>Select Category</option>
                                            @foreach ($categories as $category)
                                                <option value="{{ $category->id }}" @if ($category->id == $product->cat_id) 
                                                    selected
                                                @endif>{{ $category->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group" id="color_fields">
                                        <label for="name">Product Color (Optional)</label>
                                        @foreach ($product->colors as $color)
                                            <input type="text" class="form-control" value="{{$color->color_name}}" name="color[]" id="color"
                                            placeholder="Enter product color">
                                        @endforeach
                                    </div>
                                    <button type="button" class="btn btn-primary" id="add_color">Add More</button>

                                    <div class="form-group" id="size_fields">
                                        <label for="name">Product Size (Optional)</label>
                                        @foreach ( $product->sizes as $singleSize)
                                            <input type="text" class="form-control" value="{{$singleSize->size}}" name="size[]" id="size"
                                            placeholder="Enter product size">
                                            
                                        @endforeach
                                    </div>
                                    <button type="button" class="btn btn-primary" id="add_size">Add More</button>
                                    <div class="form-group">
                                        <label for="name">Product quantity</label>
                                        <input type="number" class="form-control" value="{{$product->quantity}}" name="qty" id="qty"
                                            placeholder="Enter product quantity" >
                                    </div>

                                    <div class="form-group">
                                        <label for="name">Product Buying price</label>
                                        <input type="number" class="form-control" value="{{$product->buying_price}}" name="buying_price" id="buying_price"
                                            placeholder="Enter buying price" >
                                    </div>
                                    <div class="form-group">
                                        <label for="name">Product regular price*</label>
                                        <input type="number" class="form-control" value="{{$product->regular_price}}" name="regular_price" id="regular_price"
                                            placeholder="Enter regular price" >
                                    </div>
                                    <div class="form-group">
                                        <label for="name">Product discount price</label>
                                        <input type="number" class="form-control" value="{{$product->discount_price}}" name="discount_price" id="discount_price"
                                            placeholder="Enter discount price">
                                    </div>
                                    <div class="form-group">
                                        <label for="name">Product discount Percentage</label>
                                        <input type="number" class="form-control" value="{{$product->discount_percentage}}" name="discount_percentage"
                                            id="discount_percentage" placeholder="Enter discount percentage">
                                    </div>
                                    <div class="form-group">
                                        <label for="name">Product Description*</label>
                                        <textarea id="summernote" name="description" class="form-control" >{{$product->description}}</textarea>
                                    </div>


                                    <div class="form-group">
                                        <label for="exampleInputFile">Product Image</label>
                                        <div class="input-group">
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" name="image"
                                                    id="image" accept="image/">
                                                <label class="custom-file-label" for="image">Choose file</label>
                                            </div>
                                            <div class="input-group-append">
                                                <span class="input-group-text">Upload</span>
                                            </div>
                                        </div>
                                         <img src="{{asset('backend/images/product/'.$product->image)}}" height="100" width="100">
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleInputFile">Gallery Image</label>
                                        <div class="input-group">
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" name="galleryImage[]" 
                                                    multiple id="galleryImage" accept="image/" >
                                                <label class="custom-file-label" for="image">Choose file</label>
                                            </div>
                                            <div class="input-group-append">
                                                <span class="input-group-text">Upload</span>
                                            </div>
                                        </div>
                                        @foreach ( $product->galleryImages as $galleryImage )
                                            <img src="{{asset('backend/images/galleryImage/'.$galleryImage->image)}}" height="100" width="100">
                                            
                                        @endforeach
                                    </div>
                                </div>
                                <!-- /.card-body -->

                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

@push('script')
    <script>
        $(function() {
            image.init();
        });
    </script>

    <script>
        $(function() {
            // Summernote
            $('#summernote').summernote()

            // CodeMirror
            CodeMirror.fromTextArea(document.getElementById("codeMirrorDemo"), {
                mode: "htmlmixed",
                theme: "monokai"
            });
        })
    </script>

    <script>
        $(function() {
            // Summernote
            $('#summernote2').summernote()

            // CodeMirror
            CodeMirror.fromTextArea(document.getElementById("codeMirrorDemo"), {
                mode: "htmlmixed",
                theme: "monokai"
            });
        })
    </script>

    {{-- Add color --}}

    <script>
        $(document).ready(function() {
            $("#add_color").click(function() {
                $("#color_fields").append(
                    '<input type="text" class="form-control" name="color[]" id="color" placeholder="Enter product color">'
                )
            })
        })
    </script>

    {{-- Add size --}}

    <script>
        $(document).ready(function() {
            $("#add_size").click(function() {
                $("#size_fields").append(
                    '<input type="text" class="form-control" name="size[]" id="size" placeholder="Enter product size">'
                )
            })
        })
    </script>
@endpush

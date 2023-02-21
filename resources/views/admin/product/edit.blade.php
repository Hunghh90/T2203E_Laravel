@extends('admin.layout')
@section('custom_css')
    <link rel="stylesheet" href="/admin/plugins/select2/css/select2.min.css">
    <link rel="stylesheet" href="/admin/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
@endsection
@section('custom_js')
    <script src="/admin/plugins/select2/js/select2.full.min.js"></script>
    <script type="text/javascript">
        $('.select2').select2()
    </script>
@endsection
@section('title','Edit')
@section('content_header')
    <div class="col-sm-6">
        <h1 class="m-0 text-dark">Edit Product</h1>
    </div><!-- /.col -->
    <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Dashboard v1</li>
        </ol>
    </div><!-- /.col -->
@endsection
@section('main_content')
    <div>
        <!-- general form elements -->
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Create</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form action="{{url("/admin/product/edit",["product"=>$product->id])}}" method="post" role="form" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                    @include("admin.html.form.input",[
                        "label"=>"Product Name",
                        "key"=>"name",
                        "type"=>"text",
                        "required" => true,
                        "value"=>$product->name
                    ])
                    @include("admin.html.form.input",[
                        "label"=>"Product Price",
                        "key"=>"price",
                        "type"=>"number",
                        "required" => true,
                        "value"=>$product->price
                    ])
                    @include("admin.html.form.input",[
                       "label"=>"Thumbnail",
                       "key"=>"thumbnail",
                       "type"=>"file",
                        "required" => false,
                        "value"=>$product->thumbnail
                   ])
                    <div class="form-group">
                        <label for="exampleInputEmail1">Description</label>
                        <textarea class="@error("depcription")is-invalid @enderror form-control" name="depcription" >{{$product->depcription}}</textarea>
                        @error("depcription")
                        <p class = "text-danger">{{$message}}</p>
                        @enderror
                    </div>

                    @include("admin.html.form.input",[
                       "label"=>"Qty",
                       "key"=>"qty",
                       "type"=>"number",
                        "required" => true,
                        "value"=>$product->qty
                   ])
                    <div class="form-group">
                        <label>Category_id</label>
                        <select  class="@error("category_id")is-invalid @enderror select2 form-control" name="category_id" required>
                        @foreach($categories as $item)
                            <option @if($product->category_id==$item->id) selected @endif value="{{$item->id}}">{{$item->name}}</option>
                        @endforeach
                        @error("category_id")
                        <p class="text-danger">{{$message}}</p>
                        @enderror
                        </select>
                    </div>
                        </div>

                <!-- /.card-body -->

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
        <!-- /.card -->



    </div>
@endsection






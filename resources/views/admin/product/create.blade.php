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
@section('title','Create')
@section('content_header')
    <div class="col-sm-6">
        <h1 class="m-0 text-dark">Create Product</h1>
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
            <form action="{{url("/admin/product/create")}}" method="post" role="form" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                    @include("admin.html.form.input",[
                        "label"=>"Product Name",
                        "key"=>"name",
                        "type"=>"text",
                        "required" => true
                    ])
                    @include("admin.html.form.input",[
                        "label"=>"Product Price",
                        "key"=>"price",
                        "type"=>"number",
                        "required" => true
                    ])
                    @include("admin.html.form.input",[
                       "label"=>"Thumbnail",
                       "key"=>"thumbnail",
                       "type"=>"file",
                        "required" => true
                   ])
                    <div class="form-group">
                        <label for="exampleInputEmail1">Description</label>
                        <textarea class="@error("depcription")is-invalid @enderror form-control" name="depcription" ></textarea>
                        @error("depcription")
                        <p class = "text-danger">{{$message}}</p>
                        @enderror
                    </div>

                    @include("admin.html.form.input",[
                       "label"=>"Qty",
                       "key"=>"qty",
                       "type"=>"number",
                        "required" => true
                   ])
                    <div class="form-group">
                        <label>Category</label>
                        <select name="category_id" class="form-control select2" required>
                            @foreach($categories as $item)
                                <option @if(old("category_id")== $item->id) selected @endif  value="{{$item->id}}">{{$item->name}}</option>
                            @endforeach
                        </select>
                        @error("category_id")
                        <p class="text-danger">{{$message}}</p>
                        @enderror
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

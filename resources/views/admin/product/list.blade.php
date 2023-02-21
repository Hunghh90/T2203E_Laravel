@extends('admin.layout')
@section('title','Product')
@section('content_header')
    <div class="col-sm-6">
        <h1 class="m-0 text-dark">List Product</h1>

    </div><!-- /.col -->

    <div class="col-md-6">
        <a href="admin/product/create" class="btn btn-primary">Create</a>
    </div>



@endsection
@section('custom_js')
    <script src="/admin/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
@endsection
@section('main_content')
    <div >
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">List Product</h3>
                <div class="card-tools">
                <form method="get" action="{{url("admin/product/list")}}">
                    <div class="card card-secondary">
                        <div class="card-header">
                            <h3 class="card-title">Bootstrap Switch</h3>
                        </div>
                        <div class="card-body">
                            <input type="checkbox" name="my-checkbox" checked data-bootstrap-switch>
                            <input type="checkbox" name="my-checkbox" checked data-bootstrap-switch data-off-color="danger" data-on-color="success">
                        </div>
                    </div>
                    <div class="input-group input-group-sm float-left mr-3" style="width: 150px;">
                        <select class="form-control float-right" name="category_id">
                            <option value="0">Choose categories...</option>
                            @foreach($categories as $item)
                                <option @if(app("request")->input("category_id")==$item->id) selected @endif value="{{$item->id}}">{{$item->name}}</option>
                            @endforeach
                        </select>
                    </div>
                        <div class="input-group input-group-sm" style="width: 150px;">
                            <input value="{{app("request")->input("search")}}" type="text" name="search" class="form-control float-right" placeholder="Search">

                            <div class="input-group-append">
                                <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
                            </div>
                        </div>




                </form>
                    </div>
            </div>
        </div>

            <!-- /.card-header -->
            <div class="card-body p-0">
                <table class="table">
                    <thead>
                    <tr>
                        <th Id="width: 10px">#</th>
                        <th>Name</th>
                        <th>Thumbnail</th>
                        <th>Price</th>
                        <th>Qty</th>
                        <th>Category</th>
                        <th style="width: 40px">status</th>
                        <th>Action</th>
                        <th>Delete</th>
                    </tr>
                    </thead>
                    <tbody>
                   @foreach($data as $item)
                    <tr>
                        <td>{{$item->id}}</td>
                        <td>{{$item->name}}</td>
                        <td><img width="100" src="{{$item->thumbnail}}"/></td>
                        <td>{{$item->price}}</td>
                        <td>{{$item->qty}}</td>
                        <td>{{$item->Category->name}}</td>
                        <td>
                            @if($item->status)
                                <span class="badge bg-success">Active</span>
                            @else
                                <span class="badge bg-danger">Inactive</span>
                            @endif
                        </td>
                        <td>
                            <a href="{{url("admin/product/edit",["product"=>$item->id])}}" class="btn btn-primary">Edit</a>

                        </td>
                        <td>
                            <form action="{{url("admin/product/delete",["product"=>$item->id])}}" method="post">
                                @csrf
                                <button type="submit" onclick="return confirm('chac chan xoa');" class="btn btn-danger">Delete</button>
                            </form>
                        </td>

                    </tr>
                   @endforeach
                    </tbody>
                </table>
            </div>
            <!-- /.card-body -->
            <div class="card-tools">
                {!! $data->appends(app("request")->input())->links("pagination::bootstrap-4") !!}
            </div>
@endsection

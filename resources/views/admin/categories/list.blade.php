@extends('admin.layout')
@section('title','Product')
@section('content_header')
    <div class="col-sm-6">
        <h1 class="m-0 text-dark">List Categories</h1>
    </div><!-- /.col -->
    <div class="col-md-6">
        <a href="admin/product/create" class="btn btn-primary">Create</a>
    </div>
    <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Dashboard v1</li>
        </ol>
    </div><!-- /.col -->
@endsection
@section('main_content')
    <div >
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">List Product</h3>

                <div class="card-tools">
                    {{--                    <ul class="pagination pagination-sm float-right">--}}
                    {{--                        <li class="page-item"><a class="page-link" href="#">&laquo;</a></li>--}}
                    {{--                        <li class="page-item"><a class="page-link" href="#">1</a></li>--}}
                    {{--                        <li class="page-item"><a class="page-link" href="#">2</a></li>--}}
                    {{--                        <li class="page-item"><a class="page-link" href="#">3</a></li>--}}
                    {{--                        <li class="page-item"><a class="page-link" href="#">&raquo;</a></li>--}}
                    {{--                    </ul>--}}
                    {!! $data->links("pagination::bootstrap-4") !!}
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
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($data as $item)
                        <tr>
                            <td>{{$item->id}}</td>
                            <td>{{$item->name}}</td>
                            <td><img width="100" src="{{$item->thumbnail}}"></td>
                            <td>{{$item->price}}</td>
                            <td>{{$item->qty}}</td>
                            <td>{{$item->category_id}}</td>
                            <td>
                                @if($item->status)
                                    <span class="badge bg-success">Active</span>
                                @else
                                    <span class="badge bg-danger">Inactive</span>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <!-- /.card-body -->

@endsection

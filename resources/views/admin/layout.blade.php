<!doctype html>
<html>
<head>
    <base href="{{url("/")}}"/>
    @include('admin.html.header')
    @include('admin.html.css')
    @yield('custom_css')
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">
    <img src="resources/img/user1-128x128.jpg" alt="User Avatar" class="img-size-50 mr-3 img-circle">
    @include('admin.html.nav.nav')
    @include('admin.html.sidebar.sidebar')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    @yield('content_header')
                </div>

                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
               @yield("main_content")
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->

    </div>
    @include('admin.html.footer')


    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
</div>
@include('admin.html.notifition')
@include('admin.html.jquery')
@yield('custom_js')
</body>
</html>

<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>{{config('app.name')}}</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="{{ asset('lte\plugins/fontawesome-free/css/all.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('lte\dist/css/adminlte.min.css')}}">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script><script>
        @if(Session::has('success'))
            toastr.success("{{ Session::get('success') }}");
        @endif

        @if(Session::has('info'))
            toastr.info("{{ Session::get('info') }}");
        @endif
    </script>
</head>
<body class="hold-transition sidebar-mini sidebar-closed layout-fixed layout-navbar-fixed">
  {{-- sidebar-mini control-sidebar-slide-open sidebar-closed sidebar-collapse layout-fixed layout-navbar-fixed --}}

{{-- navbar --}}
@include('admin/header')
{{-- /.navbar --}}

{{-- sidebar --}}
@include('admin/sidebar')
{{-- /.sidebar --}}

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          {{-- <div class="col-sm-6">

          </div><!-- /.col --> --}}
          <div class="col-sm-12">
            <ol class="breadcrumb float-sm-right">
              {{-- <li class="breadcrumb-item"><a href="/admin">Home</a></li> --}}
              {{-- <li class="breadcrumb-item active">Starter Page</li> --}}
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">

        @yield('content')

      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
    <div class="p-3">
      <h5>Title</h5>
      <p>Sidebar content</p>
    </div>
  </aside>
  <!-- /.control-sidebar -->

{{-- footer --}}
@include('admin/footer')
{{-- /.footer --}}

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<script src="{{ asset('lte\plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('lte\plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('lte\dist/js/adminlte.min.js')}}"></script>
</body>
</html>

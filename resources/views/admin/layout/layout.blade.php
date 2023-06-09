<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="csrf-token" content="{{ csrf_token ()}}">
  <title>Skydash Admin</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="{{ asset('admin/vendors/feather/feather.css')}}">
  <link rel="stylesheet" href="{{ asset('admin/vendors/ti-icons/css/themify-icons.css')}}">
  <link rel="stylesheet" href="{{ asset('admin/vendors/css/vendor.bundle.base.css')}}">
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <link rel="stylesheet" href="{{ url('admin/vendors/mdi/css/materialdesignicons.min.css')}}">

  <link rel="stylesheet" href="{{ asset('admin/vendors/datatables.net-bs4/dataTables.bootstrap4.css')}}">
  <link rel="stylesheet" href="{{ asset('admin/vendors/ti-icons/css/themify-icons.css')}}">
  <link rel="stylesheet" type="text/css" href="{{ asset('admin/js/select.dataTables.min.css')}}">
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="{{ asset('admin/css/vertical-layout-light/style.css')}}">
  <!-- endinject -->
  <link rel="shortcut icon" href="{{ asset('admin/images/favicon.png') }}" />


{{-- Custom Admin js --}}
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script type="" src="{{ url('admin/js/custom.js') }}"></script>
{{-- for datatable  --}}
<link rel="stylesheet" href="{{ url('admin/css/bootstrap.css') }}">
<link rel="stylesheet" href="{{ asset('admin/css/dataTables.bootstrap4.min.css') }}">
{{-- for sweet alert --}}
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>
  <div class="container-scroller">
@include('admin.layout.header')
<div class="container-fluid page-body-wrapper">
@include('admin.layout.sidebar')

@yield('contents') 
{{-- @include('admin.dashboard') --}}


</div>
</div>
      
      <!-- partial -->
      <!-- partial:partials/_sidebar.html -->

     
      <!-- partial -->
     @include('admin.layout.footer')
     {{-- @include(admin.layout.footer); --}}
        <!-- content-wrapper ends -->
        <!-- partial:partials/_footer.html -->
      </body>

      </html>
      
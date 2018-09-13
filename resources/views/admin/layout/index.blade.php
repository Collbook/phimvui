<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>FGC-MOVIES | Dashboard</title>
    <base href="{{ asset(' ') }}">
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    
    <link rel="stylesheet" href="assets/backend/bower_components/bootstrap/dist/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="assets/backend/bower_components/font-awesome/css/font-awesome.min.css">
    
    <!-- Ionicons -->
    <link rel="stylesheet" href="assets/backend/bower_components/Ionicons/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="assets/backend/dist/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
    folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="assets/backend/dist/css/skins/_all-skins.min.css">
    <!-- Morris chart -->
    {{-- <link rel="stylesheet" href="assets/backend/bower_components/morris.js/morris.css"> --}}
    <!-- jvectormap -->
    {{-- <link rel="stylesheet" href="assets/backend/bower_components/jvectormap/jquery-jvectormap.css"> --}}
    <!-- Date Picker -->
    {{-- <link rel="stylesheet" href="assets/backend/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css"> --}}
    <!-- Daterange picker -->
    {{-- <link rel="stylesheet" href="assets/backend/bower_components/bootstrap-daterangepicker/daterangepicker.css"> --}}
    <!-- bootstrap wysihtml5 - text editor -->
    {{-- <link rel="stylesheet" href="assets/backend/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css"> --}}
    
    <link rel="stylesheet" href="assets/backend/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
    @yield('body.css')
    
    <!-- Google Font -->
    <link rel="stylesheet" href="css/admin/fonts-googleapis.css">
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

    @include('admin.layout.header')
    <!-- Left side column. contains the logo and sidebar -->
    @include('admin.layout.aside')
    
    <!-- Content Wrapper. Contains page content -->
    
    
    @yield('body.content')
    
    
    <!-- /.content-wrapper -->
    
    <!-- Footer -->
    @include('admin.layout.footer')
    <!-- / Footer -->
    
    @include('admin.layout.ctr_aside')

</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->

<script src="assets/backend/bower_components/jquery/dist/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="assets/backend/bower_components/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
    $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.7 -->

<script src="assets/backend/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- DataTables -->
<script src="assets/backend/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="assets/backend/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<!-- datepicker -->
{{-- <script src="assets/backend/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script> --}}
<!-- AdminLTE App -->
<script src="assets/backend/dist/js/adminlte.min.js"></script>
<script src="js/xacnhanxoa.js"></script>
<script src="js/mess.js"></script>
@yield('body.script')
</body>
</html>

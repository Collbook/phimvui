@extends('admin.layout.index')


@section('body.content')
    @section('body.css')
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="{{ asset('assets/backend/bower_components/bootstrap/dist/css/bootstrap.min.css') }}">
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('assets/backend/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') }}">
    @endsection
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>Thông tin quản trị viên/ </h1>
            <ol class="breadcrumb">
                <li><a href="{{ route('admin.dashboard') }}"><i class="fa fa-dashboard"></i> Trang chủ</a></li>
                <li><a href="{{ route('admin.admin.index') }}">Quản trị nhân viên</a></li>
                <li class="active">Thông tin</li>
            </ol>
        </section>

      <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-md-12">
                    <div class="box box-info">
                        <div class="box-body pad">
                            <?php foreach ($admin as $admin): ?>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-lg-3">
                                            <img src="{{ asset('storage/admins/' . $admin->id . '/' . $admin->avatar) }}" alt="{{ $admin->avatar }}" width="100%">
                                        </div>
                                        <div class="col-lg-2">
                                            <h6><strong>Tên đăng nhập</strong></h6>
                                            <h6><strong>Cấp bậc</strong></h6>
                                            <h6><strong>Số lượng phim đã đăng</strong></h6>
                                            <h6><strong>Trạng thái</strong></h6>
                                            <h6><strong>Email</strong></h6>
                                            <h6><strong>Họ tên</strong></h6>
                                            <h6><strong>Sinh nhật</strong></h6>
                                            <h6><strong>Ngày tham gia</strong></h6>
                                        </div>
                                        <div class="col-lg-7">
                                            <h6>{{ $admin->username }}</h6>
                                            <h6>
                                            <?php if ($admin->level == 1): ?>
                                            <?php echo 'Admin' ?>
                                            <?php elseif ($admin->level == 2): ?>
                                                <?php echo 'Mode' ?>
                                            <?php else: ?>
                                                <?php echo 'Member' ?>
                                            <?php endif ?>
                                            </h6>
                                            <h6>{{ $admin->films->count() }}</h6>
                                            <h6>
                                            <?php if ($admin->status == 1): ?>
                                                <span class="label label-info">Hoạt động</span>
                                            <?php else: ?>
                                                <span class="label label-warning">Đang khóa</span>
                                            <?php endif ?>
                                            </h6>
                                            <h6>{{ $admin->email }}</h6>
                                            <h6>{{ $admin->fullname }}</h6>
                                            <h6>{{ $admin->birthday }}</h6>
                                            <h6>{{ $admin->created_at }}</h6>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-12">
                                    <div class="box">
                                        <div class="box-header">
                                            <h4 class="box-title">Danh sách các phim đã đăng</h4>
                                        </div>
                                        <!-- /.box-header -->
                                        <div class="box-body">
                                            <table id="example1" class="table table-bordered table-striped">
                                                <thead>
                                                    <tr>
                                                        <th>STT</th>
                                                        <th>Tên phim</th>
                                                        <th>Hình đại diện</th>
                                                        <th>Thể loại</th>
                                                        <th>Ngày đăng</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                <?php $i = 0 ?>
                                                <?php foreach ($admin->films as $film): ?>
                                                <?php $i ++ ?>
                                                    <tr>
                                                        <td>{{ $i }}</td>
                                                        <td><a href="{{ route('admin.phim.show', [$film->slug]) }}">{{ $film->title_vi }}</a></td>
                                                        <td><a href="{{ route('admin.phim.show', [$film->slug]) }}"><img src='{{ asset("upload/phim/$film->img_thumbnail") }}' width="60"></a></td>
                                                        <td>
                                                        <?php if ($film->film_type == 1): ?>
                                                            Phim lẻ
                                                        <?php else: ?>
                                                            Phim bộ
                                                        <?php endif ?>
                                                        </td>
                                                        <td>{{ $film->created_at }}</td>
                                                    </tr>
                                                <?php endforeach ?>
                                                </tbody>
                                                <tfoot>
                                                    <tr>
                                                        <th>STT</th>
                                                        <th>Tên phim</th>
                                                        <th>Hình đại diện</th>
                                                        <th>Thể loại</th>
                                                        <th>Ngày đăng</th>
                                                    </tr>
                                                </tfoot>
                                            </table>
                                        </div>
                                        <!-- /.box-body -->
                                    </div>
                                </div>
                            </div>
                            <?php endforeach ?>
                            
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    @section('body.script')

    <!-- page script -->
    <script>
      $(function () {
        $('#example1').DataTable()
        $('#example2').DataTable({
          'paging'      : true,
          'lengthChange': false,
          'searching'   : false,
          'ordering'    : true,
          'info'        : true,
          'autoWidth'   : false
        })
      })
    </script>

    @endsection

@endsection
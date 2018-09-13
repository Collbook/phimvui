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
            <h1>Thông tin khách đăng nhập</h1>
            <ol class="breadcrumb">
                <li><a href="{{ route('admin.dashboard') }}"><i class="fa fa-dashboard"></i> Trang chủ</a></li>
                <li><a href="{{ route('admin.customer.index') }}">Quản trị khách đăng nhập</a></li>
                <li class="active">Thông tin</li>
            </ol>
        </section>

      <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-md-12">
                    <div class="box box-info">
                        <div class="box-body pad">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-lg-3">
                                            <img src="{{ asset('storage/customers/' . $customer->id . '/' . $customer->avatar) }}" alt="Avatar" width="90%">
                                        </div>
                                        <div class="col-lg-2">
                                            <h6><strong>Tên đăng nhập</strong></h6>
                                            <h6><strong>Trạng thái</strong></h6>
                                            <h6><strong>Email</strong></h6>
                                            <h6><strong>Họ tên</strong></h6>
                                            <h6><strong>Sinh nhật</strong></h6>
                                            <h6><strong>Ngày tham gia</strong></h6>
                                        </div>
                                        <div class="col-lg-7">
                                            <h6>{{ $customer->username }}</h6>
                                            <h6>
                                            <?php if ($customer->status == 1): ?>
                                                <span class="label label-info">Hoạt động</span>
                                            <?php else: ?>
                                                <span class="label label-warning">Đang khóa</span>
                                            <?php endif ?>
                                            </h6>
                                            <h6>{{ $customer->email }}</h6>
                                            <h6>{{ $customer->fullname }}</h6>
                                            <h6>{{ $customer->birthday }}</h6>
                                            <h6>{{ $customer->created_at }}</h6>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-12">
                                    <div class="box">
                                        <div class="box-header">
                                            <h4 class="box-title">Danh sách các bình luận đã đăng</h4>
                                        </div>
                                        <!-- /.box-header -->
                                        <div class="box-body">
                                            <table id="example1" class="table table-bordered table-striped">
                                                <thead>
                                                    <tr>
                                                        <th>STT</th>
                                                        <th width="120">Tên phim</th>
                                                        <th>Hình đại diện</th>
                                                        <th>Nội dung</th>
                                                        <th>Ngày đăng</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                <?php $i = 0 ?>
                                                <?php foreach ($customer->comments as $comment): ?>
                                                <?php $i ++ ?>
                                                    <tr>
                                                        <td>{{ $i }}</td>
                                                        <td>
                                                            <a href="{{ route('admin.phim.show', [$comment->films->slug]) }}">{{ $comment->films->title_vi }}</a>
                                                        </td>
                                                        <td>
                                                            <a href="{{ route('admin.phim.show', [$comment->films->slug]) }}">
                                                                @if(!empty($comment->films->img_thumbnail) && file_exists(public_path(get_thumbnail("assets/frontend/images/".$comment->films->img_thumbnail))))
                                                                    <img src="{{ asset("assets/frontend/images/".get_thumbnail($comment->films->img_thumbnail)) }}" alt="Image" width="60px">
                                                                @else
                                                                    <img src="{{ asset("img/no_image_thumb.jpg") }}" alt="Image" width="60px" height="60px">
                                                                @endif
                                                            </a>
                                                        </td>
                                                        <td>{{ $comment->content }}</td>
                                                        <td>{{ $comment->created_at }}</td>
                                                    </tr>
                                                <?php endforeach ?>
                                                </tbody>
                                                <tfoot>
                                                    <tr>
                                                        <th>STT</th>
                                                        <th>Tên phim</th>
                                                        <th>Hình đại diện</th>
                                                        <th>Nội dung</th>
                                                        <th>Ngày đăng</th>
                                                    </tr>
                                                </tfoot>
                                            </table>
                                        </div>
                                        <!-- /.box-body -->
                                    </div>
                                </div>
                            </div>
                            
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
            });
        })
    </script>

    @endsection

@endsection
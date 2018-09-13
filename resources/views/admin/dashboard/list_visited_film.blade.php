@extends('admin.layout.index')


@section('body.content')
    @section('body.css')
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('assets/backend/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') }}">
    <!-- DatePicker -->
    <link rel="stylesheet" href="{{ asset('css/admin/jquery-ui.css') }}">

    {{-- CSS for this page --}}
    <link rel="stylesheet" href="{{ asset('css/admin/admin-user-detail.css') }}">
    
    @endsection

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>Lượt xem phim</h1>
            <ol class="breadcrumb">
                <li><a href="{{ route('admin.dashboard') }}"><i class="fa fa-dashboard"></i> Trang chủ</a></li>
                <li class="active">Chi tiết lượt xem phim</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-lg-12">
                    <hr>
                    <!-- Content Wrapper. Contains page content -->
                    <div  id="ajax-table-new-film">
                        <!-- /.box-header -->
                        <div class="box-body" style="background: #fff">
                            <table id="example1" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Tên phim</th>
                                        <th>Năm sản xuất</th>
                                        <th>Avatar</th>
                                        <th>Người đăng</th>
                                        <th>Ngày đăng</th>
                                        <th>Lượt xem</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php foreach ($films as $film): ?>
                                    <tr>
                                        <td>
                                            {{ $film->id }}
                                        </td>
                                        <td>
                                            <a href="{{ route('admin.phim.show', [$film->slug]) }}">{{ $film->title_vi }}</a>
                                        </td>

                                        <td>{{ $film->published_year }}</td>

                                        <td>
                                        @if(!empty($film->img_thumbnail) && file_exists(public_path(get_thumbnail("assets/frontend/images/".$film->img_thumbnail))))
                                            <img src="{{ asset("assets/frontend/images/".get_thumbnail($film->img_thumbnail)) }}" alt="Image" width="60px">
                                        @else
                                            <img src="{{ asset("img/no_image_thumb.jpg") }}" alt="Image" width="60px" height="60px">
                                        @endif
                                        </td>
                                        
                                        <td>
                                            <a href="{{ route('admin.admin.show', [$film->admins->username]) }}">{{ $film->admins->username }}</a>
                                        </td>
                                        <td>{{ $film->created_at }}</td>
                                        <td>{{ $film->view_count }}</td>
                                    </tr>
                                <?php endforeach ?>
                                    
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>Id</th>
                                        <th>Tên phim</th>
                                        <th>Năm sản xuất</th>
                                        <th>Avatar</th>
                                        <th>Người đăng</th>
                                        <th>Ngày đăng</th>
                                        <th>Lượt xem</th>
                                    </tr>
                                </tfoot>
                            </table>   
                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!-- ./wrapper -->
                </div>
            </div>
        </section>
    </div>

    @section('body.script')


    {{-- DatePicker --}}
    <script src="{{ asset('js/admin/jquery-ui.js') }}"></script>
    <!-- page script -->
    <script src="{{ asset('js/admin/admin-user-detail.js') }}"></script>
    <script src="{{ asset('js/admin/dashboard/dashboard.js') }}"></script>
    <script src="{{ asset('js/admin/dashboard/dashboard-pickdate.js') }}"></script>

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
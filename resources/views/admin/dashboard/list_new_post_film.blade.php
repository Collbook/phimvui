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
            <h1>Danh sách phim mới</h1>
            <ol class="breadcrumb">
                <li><a href="{{ route('admin.dashboard') }}"><i class="fa fa-dashboard"></i> Trang chủ</a></li>
                <li class="active">Danh sách phim mới</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row m-2" style="background-color: #fff;">
                <div class="col-lg-3">
                    <form class="form-inline" id="showDate" action="{{ route('admin.dashboard.new.registerGet') }}">
                        {{ csrf_field() }}
                        <div class="form-group" style="padding-left: 10px; padding-top: 10px;">
                            <span>Hiển thị</span>
                            <select name="date" class="form-control input-sm show-date" style="width: 85px">
                                <option value="1">1 ngày</option>
                                <option value="7">1 tuần</option>
                                <option value="30">1 tháng</option>
                                <option value="365">1 năm</option>
                            </select>
                        </div>
                    </form>
                </div>

                <div class="col-lg-12">
                    <hr>
                    <!-- Content Wrapper. Contains page content -->
                    <div  id="ajax-table-new-film">
                        @if (session('status_checkbox'))
                            <div class="box-header">
                                <span class="bg-danger click-to-hidden center-block" style="padding: 10px;">{{ session('status_checkbox') }}</span>
                            </div>
                        @endif
                        <!-- /.box-header -->
                        <div class="box-body">
                            <form action="{{ route('admin.phim.multi.checkbox.postfilm') }}" method="GET" id="multi-action">
                                {{ csrf_field() }}
                                <table id="example1" class="table table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>Lựa chọn</th>
                                            <th>Tên phim</th>
                                            <th>Năm sản xuất</th>
                                            <th>Avatar</th>
                                            <th>Người đăng</th>
                                            <th>Ngày đăng</th>
                                            <th>Hành động</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php foreach ($films as $film): ?>
                                        <tr>
                                            <td>
                                                <label class="container1">
                                                    <input type="checkbox" class="check-comment" name="id[]" value="{{ $film->id }}"> 
                                                    <span class="checkmark"></span>
                                                </label>
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
                                            <td>
                                            <?php if ($film->status == 0): ?>
                                                <a href="#" data-toggle="modal" data-target="#approveModal{{ $film->id }}"><span class="btn btn-warning btn-sm button-action">Duyệt</span></a><br>
                                            <?php endif ?>
                                                <a href="{{ route('admin.phim.show', [$film->slug]) }}"><span class="btn btn-info btn-sm button-action">Xem</span></a><br>
                                                <a href="#" data-toggle="modal" data-target="#deleteModal{{ $film->id }}"><span class="btn btn-danger btn-sm button-action">Xóa</span></a>
                                            </td>
                                        </tr>
                                    <?php endforeach ?>
                                        
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>Lựa chọn</th>
                                            <th>Tên phim</th>
                                            <th>Năm sản xuất</th>
                                            <th>Avatar</th>
                                            <th>Người đăng</th>
                                            <th>Ngày đăng</th>
                                            <th>Hành động</th>
                                        </tr>
                                    </tfoot>
                                </table>
                                
                                <button type="submit" name="action" value="approve" class="btn btn-sm btn-success checkbox-selected" disabled style="margin-right: 30px">Duyệt phim</button>
                                <button type="submit" name="action" value="delete" class="btn btn-sm btn-danger checkbox-selected" disabled>Xóa phim</button>
                            </form>    
                        </div>
                        <!-- /.box-body -->

                        
                    </div>
                    <!-- ./wrapper -->
                </div>
            </div>
        </section>
        
        <?php foreach ($films as $film): ?>
        <!-- Modal Approve Films -->
        <div class="modal fade" id="approveModal{{ $film->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel{{ $film->id }}" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div style="padding: 15px;">
                        <h4 class="modal-title">Bạn chắc chắn duyệt bộ phim này <strong>{{ $film->title_vi }}</strong>?</h4>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <br>
                    <div class="modal-footer">
                        <button class="btn btn-default" data-dismiss="modal">Hủy</button>
                        <a href="{{ route('admin.phim.approve', [$film->id]) }}" id="approve{{ $film->id }}"><span class="btn btn-success">Duyệt phim</span></a>
                    </div>
                </div>
            </div>
        </div>


        {{-- Modal for delete Film --}}
        <div class="modal fade" id="deleteModal{{ $film->id }}" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div style="padding: 15px;">
                        <h4 class="modal-title">Bạn chắc chắn xóa bộ phim <strong>{{ $film->title_vi }}</strong>?</h4>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <br>
                    <div class="modal-footer">
                        <button class="btn btn-default" data-dismiss="modal">Hủy</button>
                        <a href="{{ route('admin.phim.destroy', [$film->id]) }}" id="deletefilm{{ $film->id }}"><span class="btn btn-danger">Xóa phim</span></a>
                    </div>
                </div>
            </div>
        </div>

        <?php endforeach ?>
    </div>

    @section('body.script')


    {{-- DatePicker --}}
    <script src="{{ asset('js/admin/jquery-ui.js') }}"></script>
    <!-- page script -->
    <script src="{{ asset('js/admin/admin-user-detail.js') }}"></script>
    <script src="{{ asset('js/admin/dashboard/dashboard.js') }}"></script>
    <script src="{{ asset('js/admin/dashboard/dashboard-pickdate.js') }}"></script>

    @include('admin.dashboard.newfilm-js')
    @endsection

@endsection
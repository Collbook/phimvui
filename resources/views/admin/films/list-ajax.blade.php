<meta name="csrf-token" content="{{ csrf_token() }}">
<link rel="stylesheet" href="{{ asset('css/admin/jquery-ui.css') }}">
<link rel="stylesheet" href="{{ asset('css/admin/admin-user-detail.css') }}">
    <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <h1>Danh sách phim</h1>
                <ol class="breadcrumb">
                    <li><a href="{{ route('admin.dashboard') }}"><i class="fa fa-dashboard"></i> Home</a></li>
                    <li class="active">Danh sách phim</li>
                </ol>
            </section>
            <!-- Main content -->
            <section class="content">
                <div class="row">
                    <div class="col-sm-12">
                        <label class="active-slide-success mess-success-hide bg-primary">cập nhật slide thành công!</label>
                    </div>
                </div>
                <div id="multi-active-slide">
                    <a href="{{route('admin.phim.add')}}">
                        <button class="btn btn-primary"><i class="fa fa-plus" aria-hidden="true"></i>Thêm Phim</button>
                    </a>

                        <button name="submit"
                                class="btn btn-success checkbox-selected" id="active-slide"
                                data-toggle="modal"
                                data-target="#multiActiveSlideCheckBox" disabled><i class="fa fa-picture-o"
                                                                                    aria-hidden="true"></i>
                           Cập nhật slide
                        </button>

                    <div class="row">
                        <div class="col-xs-12">
                            <div class="box">
                                <div class="box-body">
                                    <div id="example1_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <table id="example1" class="table table-bordered table-striped dataTable"
                                                       role="grid" aria-describedby="example1_info">
                                                    <thead>
                                                    <tr role="row">
                                                        <th class="sorting" tabindex="0" style="width: 30px;"
                                                            aria-controls="example1" rowspan="1" colspan="1"
                                                            aria-label="Browser: activate to sort column ascending"
                                                            style="width: 150px;">Tùy Chọn
                                                        </th>
                                                        <th class="sorting_asc" tabindex="0" aria-controls="example1"
                                                            rowspan="1" colspan="1" aria-sort="ascending"
                                                            aria-label="Rendering engine: activate to sort column descending"
                                                            style="width: 177px;">Tên Phim
                                                        </th>
                                                        <th class="sorting" tabindex="0" aria-controls="example1"
                                                            rowspan="1"
                                                            colspan="1"
                                                            aria-label="Browser: activate to sort column ascending"
                                                            style="width: 150px;">Năm Sản Xuất
                                                        </th>
                                                        <th class="sorting" tabindex="0" aria-controls="example1"
                                                            rowspan="1"
                                                            colspan="1"
                                                            aria-label="Platform(s): activate to sort column ascending"
                                                            style="width: 206px;">Trạng Thái
                                                        </th>
                                                        <th class="sorting" tabindex="0" aria-controls="example1"
                                                            rowspan="1"
                                                            colspan="1"
                                                            aria-label="Engine version: activate to sort column ascending"
                                                            style="width: 150px;">Lượt Xem
                                                        </th>
                                                        <th class="sorting" tabindex="0" aria-controls="example1"
                                                            rowspan="1"
                                                            colspan="1"
                                                            aria-label="CSS grade: activate to sort column ascending"
                                                            style="width: 112px;">Ảnh Đại Diện
                                                        </th>
                                                        <th class="sorting" tabindex="0" aria-controls="example1"
                                                            rowspan="1"
                                                            colspan="1"
                                                            aria-label="Engine version: activate to sort column ascending"
                                                            style="width: 153px;">Người Đăng
                                                        </th>
                                                        <th class="sorting" tabindex="0" aria-controls="example1"
                                                            rowspan="1"
                                                            colspan="1"
                                                            aria-label="CSS grade: activate to sort column ascending"
                                                            style="width: 150px;">Chức Năng
                                                        </th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    @foreach($films as $film)
                                                        <tr role="row" class="odd">
                                                            <td>
                                                                <label class="container1">
                                                                    <input type="checkbox" class="check-comment"
                                                                           name="ids[]"
                                                                           value="{{$film->id}}" {{ $film->active_slide ==1 ? 'checked' : '' }}>
                                                                    <span class="checkmark"></span>
                                                                </label>
                                                            </td>
                                                            <td class="sorting_1">{{$film->title_vi}}</td>
                                                            <td>{{$film->published_year}}</td>
                                                            <td>
                                                                @if($film->status)
                                                                    {{'Hiển Thị'}}
                                                                @else
                                                                    {{'Không Hiển Thị'}}
                                                                @endif
                                                            </td>
                                                            <td>{{$film ->view_count}}</td>
                                                            <td>
                                                                @if(!empty($film->img_thumbnail) && file_exists(public_path(get_thumbnail("upload/phim/".$film->img_thumbnail))))
                                                                    <img src="{{ asset("upload/phim/".get_thumbnail($film->img_thumbnail)) }}"
                                                                         alt="Image" width="60px">
                                                                @else
                                                                    <img src="{{ asset("img/no_image_thumb.jpg") }}"
                                                                         alt="Image" width="60px" height="60px">
                                                                @endif
                                                            </td>
                                                            <td>{{  $film ->admins ->username}}</td>
                                                            <td>
                                                                <a href="#myModal{{$film->id}}" class="btn btn-danger"
                                                                   data-toggle="modal" id="myModal"><i class="fa fa-trash-o"
                                                                                                       aria-hidden="true"></i></a>
                                                                <a href="{{route('admin.phim.edit',['id' => $film ->id])}}"
                                                                   class="btn btn-warning"><i class="fa fa-pencil"
                                                                                              aria-hidden="true"></i></a>
                                                                <a href="{{route('admin.phim.show',['slug'=>$film->slug])}}"
                                                                   class="btn btn-info"><i class="fa fa-info-circle"
                                                                                           aria-hidden="true"></i></a>

                                                            </td>
                                                        </tr><!-- Modal HTML -->
                                                        <div id="myModal{{$film->id}}" class="modal fade">
                                                            <div class="modal-dialog modal-confirm">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <div class="icon-box">
                                                                            <i class="fa fa-exclamation"></i>
                                                                        </div>
                                                                        <h4 class="modal-title">Bạn có Chắc Chắn Muốn
                                                                            Xóa?</h4>
                                                                        <button type="button" class="close"
                                                                                data-dismiss="modal"
                                                                                aria-hidden="true">&times;
                                                                        </button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <p>Nếu đồng ý xóa sẽ không thể khôi phục lại bản ghi
                                                                            này!</p>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" id="delete-btn"
                                                                                class="btn btn-info" data-dismiss="modal">
                                                                            Hủy
                                                                        </button>
                                                                        <button type="button" class="btn btn-danger"><a
                                                                                    style="color: white"
                                                                                    href="{{route('admin.phim.delete',['id'=>$film->id])}}">Đồng
                                                                                ý</a></button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!--end model-->
                                                    @endforeach
                                                    </tbody>
                                                    <tfoot>
                                                    <tr>
                                                        <th rowspan="1" colspan="1">Tên Phim</th>
                                                        <th rowspan="1" colspan="1">Năm Sản Xuất</th>
                                                        <th rowspan="1" colspan="1">Trạng Thái</th>
                                                        <th rowspan="1" colspan="1">Lượt Xem</th>
                                                        <th rowspan="1" colspan="1">Ảnh Đại Diện</th>
                                                        <th rowspan="1" colspan="1">Người Đăng</th>
                                                        <th rowspan="1" colspan="1">Chức Năng</th>
                                                    </tr>
                                                    </tfoot>
                                                </table>

                                            </div>
                                        </div>
                                    </div>
                                    {{-- Modal active slide --}}
                                    <div class="modal fade" id="multiActiveSlideCheckBox" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h3 class="modal-title" style="padding-left: 30px;">Đặt Làm Slide</h3>
                                                </div>
                                                <br>
                                                <form action="{{ route('admin.phim.multi.slide') }}" method="POST" role="form" id="multiActiveSlide">
                                                    {{ csrf_field() }}
                                                    <div class="modal-footer">
                                                        <button class="btn btn-default" data-dismiss="modal">Hủy</button>
                                                        <button class="btn btn-danger" id="button" type="submit">Cập nhật slide</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /.box-body -->
                        </div>
                    </div>
                </div>
            </section>
        </div>
<script>
    $(document).ready(function() {
        $("#multi-active-slide input:checkbox").on('click', function(event) {
            var checkbox_selected_count = $("#multi-active-slide input:checkbox:checked").length;
             console.log(checkbox_selected_count);
            if (checkbox_selected_count > 0 || checkbox_selected_count == 0) {
                $('#multi-active-slide button[name=submit]').removeClass('checkbox-selected');
                $('#multi-active-slide button[name=submit]').removeAttr('disabled');
            } else {
                $('#multi-active-slide button[name=submit]').addClass('checkbox-selected');
                $('#multi-active-slide button[name=submit]').attr('disabled', 'disabled');
            }
        });
    });

</script>
@include('admin.films.js')
<script>
    $(function () {
        $('#example1').DataTable()
        $('#example2').DataTable({
            'paging': true,
            'lengthChange': false,
            'searching': false,
            'ordering': true,
            'info': true,
            'autoWidth': false
        })
    })
</script>



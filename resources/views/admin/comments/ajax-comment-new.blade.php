    {{-- CSS for this page --}}
    <link rel="stylesheet" href="{{ asset('css/admin/admin-user-detail.css') }}">

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>Danh sách bình luận chưa duyệt</h1>
            <ol class="breadcrumb">
                <li><a href="{{ route('admin.dashboard') }}"><i class="fa fa-dashboard"></i> Trang chủ</a></li>
                <li class="active">Danh sách bình luận chưa duyệt</li>
            </ol>
        </section>
        
        <!-- Main content -->
        <section class="content">
            <div class="row m-2" style="background-color: #fff;">
                <div class="col-lg-12">
                    <!-- Content Wrapper. Contains page content -->
                    <div>
                        <div class="box-header">
                            @if (session('status_checkbox'))
                                <span class="bg-danger click-to-hidden center-block" style="padding: 10px;">{{ session('status_checkbox') }}</span>
                            @endif
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <form action="{{ route('admin.comment.multi.checkbox') }}" method="GET" id="multi-action-cmt">
                                {{ csrf_field() }}
                                <table id="example1" class="table table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th width="50">Lựa chọn</th>
                                            <th>Phim liên quan</th>
                                            <th>Khách đăng nhập</th>
                                            <th>Nội dung</th>
                                            <th>Ngày tạo</th>
                                            <th>Hành động</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php foreach ($comments as $comment): ?>
                                        <tr>
                                            <td>
                                                <label class="container1">
                                                    <input type="checkbox" class=" check-comment" name="id[]" value="{{ $comment->id }}"> 
                                                    <span class="checkmark"></span>
                                                </label>
                                                
                                            </td>

                                            <td>
                                                <a href="{{ route('admin.phim.show', [$comment->films->slug]) }}">{{ $comment->films->title_vi }}</a>
                                            </td>

                                            <td>
                                                <a href="{{ route('admin.customer.show', [$comment->customers->username]) }}">{{ $comment->customers->username }}</a>
                                            </td>

                                            <td>{{ $comment->content }}</td>

                                            <td>{{ $comment->created_at }}</td>
                                            <td>
                                            <?php if ($comment->status == 0): ?>
                                                <a href="#" data-toggle="modal" data-target="#approveModal{{ $comment->id }}"><span class="btn btn-warning btn-sm button-action">Duyệt</span></a><br>
                                            <?php endif ?>
                                                <a href="#" data-toggle="modal" data-target="#showModal{{ $comment->id }}"><span class="btn btn-info btn-sm button-action">Xem</span></a><br>
                                                <a href="#" data-toggle="modal" data-target="#deleteModal{{ $comment->id }}"><span class="btn btn-danger btn-sm button-action">Xóa</span></a>
                                            </td>
                                        </tr>

                                    <?php endforeach ?>
                                        
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th width="50">Lựa chọn</th>
                                            <th>Phim liên quan</th>
                                            <th>Khách đăng nhập</th>
                                            <th>Nội dung</th>
                                            <th>Ngày tạo</th>
                                            <th>Hành động</th>
                                        </tr>
                                    </tfoot>
                                </table>

                                <button type="submit" name="action" value="approve" class="btn btn-sm btn-success checkbox-selected" disabled style="margin-right: 30px; width: 80px;">Duyệt</button>
                                <button type="submit" name="action" value="delete" class="btn btn-sm btn-danger checkbox-selected" disabled style="width: 80px;">Xóa</button>
                            </form>  
                        </div>
                        <br>
                        <!-- /.box-body -->
                    </div>
                    <!-- ./wrapper -->
                </div>
            </div>
        </section>
    </div>

    <!-- Modal Events -->
    <?php foreach ($comments as $comment): ?>
    <!-- Modal Approve Comment -->
    <div class="modal fade" id="approveModal{{ $comment->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel{{ $comment->id }}" aria-hidden="true" class="approveModal">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div style="padding: 15px;">
                    <h4 class="modal-title">Bạn chắc chắn duyệt bình luận này?</h4>
                </div>
                <br>
                <div class="modal-footer">
                    <button class="btn btn-default" data-dismiss="modal">Hủy</button>
                    <a href="{{ route('admin.comment.approve', [$comment->id]) }}" class="approveComment{{ $comment->id }}"><span class="btn btn-success">Duyệt</span></a>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal View Comment -->
    <div class="modal fade" id="showModal{{ $comment->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel{{ $comment->id }}" aria-hidden="true" class="showModal">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="header-cm">
                    <h4 class="modal-title">Nội dung bình luận</h4>
                </div>
                <br>
                <div class="modal-content">
                    <div class="row">
                        <div class="col-md-3">
                            <h5 class="text-center text-danger"><a href="{{ route('admin.phim.show', [$comment->films->slug]) }}" target="_blank">{{ $comment->films->title_vi }}</a></h5>

                            <a href="{{ route('admin.phim.show', [$comment->films->slug]) }}"><img src="{{ asset("upload/phim/" . $comment->films->img_thumbnail) }}" width="100" class="center-block" target="_blank"></a>
                        </div>

                        <div class="col-md-9">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <th width="200px">Khách bình luận</th>
                                        <td><a href="#" target="_blank">{{ $comment->customers->username }}</a></td>
                                    </tr>

                                    <tr>
                                        <th>Trạng thái</th>
                                        <td>
                                        <?php if ($comment->status == 1): ?>
                                            <span class="label label-info">Đã duyệt</span>
                                        <?php else: ?>
                                            <span class="label label-warning">Chưa duyệt</span>
                                        <?php endif ?>
                                        </td>
                                    </tr>

                                    <tr>
                                        <th>Ngày tạo</th>
                                        <td>{{ $comment->created_at }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="col-lg-12 content-cm">
                            <h5 style="padding-left: 10px;"><strong>Nội dung</strong></h5>
                            <div class="content-comment">
                                <p>{{ $comment->content }}</p>
                            </div>
                            <div>
                            </div>
                        </div>
                        <div class="button-cm">
                            <?php if ($comment->status == 0): ?>
                            <a href="{{ route('admin.comment.approve', [$comment->id]) }}" class="approveComment{{ $comment->id }}"><span class="btn btn-success">Duyệt</span></a>
                            <?php endif ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Modal for delete Comments --}}
    <div class="modal fade" id="deleteModal{{ $comment->id }}" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div style="padding: 15px;">
                    <h4 class="modal-title">Bạn chắc chắn xóa nội dung bình luận này?</h4>
                </div>
                <br>
                <div class="modal-footer">
                    <button class="btn btn-default" data-dismiss="modal">Hủy</button>
                    <a href="{{ route('admin.comment.destroy', [$comment->id]) }}" id="deleteComment{{ $comment->id }}"><span class="btn btn-danger">Xóa</span></a>
                </div>
            </div>
        </div>
    </div>

    <?php endforeach ?>

    <!-- page script -->
    <script src="{{ asset('js/admin/admin-user-detail.js') }}"></script>
    @include('admin.comments.js-new-comment')
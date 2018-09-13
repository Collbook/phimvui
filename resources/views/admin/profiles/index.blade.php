@extends('admin.layout.index')


@section('body.content')
    @section('body.css')
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('assets/backend/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') }}">
    <!-- DatePicker -->
    <link rel="stylesheet" href="{{ asset('css/admin/jquery-ui.css') }}">

    {{-- CSS for this page --}}
    <link rel="stylesheet" href="{{ asset('css/admin/admin-user-detail.css') }}">
    <link rel="stylesheet" href="{{ asset('css/admin/profile.css') }}" class="css">
    @endsection
    
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>Hồ sơ cá nhân</h1>
            <ol class="breadcrumb">
                <li><a href="{{ route('admin.dashboard') }}"><i class="fa fa-dashboard"></i> Trang chủ</a></li>
                <li class="active">Hồ sơ</li>
            </ol>
        </section>

        <div class="row">
            <div class="col-md-9 col-lg-offset-3">
            @if (session('status-error'))
                <div class="alert alert-danger" style="margin-left: 8px; margin-right: 15px; margin-top: 10px; margin-bottom: 0px; padding: 5px">
                    <span class="text-white">{{ session('status-error') }}</span>
                </div>
            @endif

            @if (session('status-success'))
                <div class="alert alert-success" style="margin-left: 8px; margin-right: 15px; margin-top: 10px; margin-bottom: 0px; padding: 5px">
                    <span class="text-white">{{ session('status-success') }}</span>
                </div>
            @endif
            </div>
        </div>

        <!-- Main content -->
        <section class="content">

            <div class="row">
                <div class="col-md-3 profile-detail">
                    <!-- Profile Image -->
                    <div class="box box-primary">
                        <div class="box-body box-profile">
                            <img class="img-responsive center-block img-avatar" src="{{ asset('storage/admins/' . Auth::guard('admin')->id() . '/' . Auth::guard('admin')->user()->avatar) }}" alt="User profile picture" width="80%" data-toggle="modal" data-target="#myModal">
                            <button id="click-to-change-img" type="button" class="btn btn-link btn-block" data-toggle="modal" data-target="#myModal">Thay đổi Avatar</button>
                            <ul class="list-group list-group-unbordered">
                                <li class="list-group-item">
                                    <b>Số lượng phim đã đăng</b> <a class="pull-right" style="padding-right: 20px;">{{ Auth::guard('admin')->user()->films->count() }}</a>
                                </li>
                            </ul>
                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!-- /.box -->

                    <!-- About Me Box -->
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title">Thông tin cá nhân</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <strong><i class="fa fa-user margin-r-5"></i> Họ tên</strong>
                            <p class="text-muted">{{ Auth::guard('admin')->user()->fullname }}</p>
                            <hr>
                            <strong><i class="fa fa-envelope margin-r-5"></i> Email</strong>
                            <p class="text-muted">{{ Auth::guard('admin')->user()->email }}</p>
                            <hr>
                            <strong><i class="fa fa-calendar margin-r-5"></i> Sinh nhật</strong>
                            <p>{{ Auth::guard('admin')->user()->birthday }}</p>
                            <hr>
                        </div>
                        <!-- /.box-body -->
                    </div>

                    <!-- About Me Box -->
                    <div class="box box-primary">
                        <!-- /.box-header -->
                        <div class="box-body">
                            <a href="#" class="text-danger" data-toggle="modal" data-target="#deleteProfile"><i class="fa fa-times-circle-o" aria-hidden="true"></i> Xóa tài khoản</a>
                            <hr>
                        </div>

                        
                        <!-- /.box-body -->
                    </div>
                    <!-- /.box -->
                </div>
                <!-- /.col -->
                <div id="myModal" class="modal fade" role="dialog">
                    <div class="modal-dialog">
                        <!-- Modal content-->
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title text-center">Tải ảnh đại diện</h4>
                            </div>
                            <div class="modal-body">
                                <form action="{{ route('admin.profile.change.avatar') }}" method="POST" role="form" enctype="multipart/form-data" id="formUpload">
                                    {{ csrf_field() }}
                                    <div class="avatar-content">
                                        <div class="box-preview-img img-responsive"></div>
                                    </div>
                                    <div class="avatar-form">
                                        <div class="form-group select-img">
                                            <input type="file" multiple="multiple" class="form-control" id="image" name="avatar" onchange="previewImg(event);" required>
                                        </div>
                                    </div>
                                    <div class="avatar-submit panel-footer text-center">
                                        <input type="reset" value="Cancel" class="btn btn-warning btn-sm btn-reset">
                                        <button type="submit" class="btn btn-primary btn-sm av-submit">Xác nhận</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="col-md-9">
                    <div class="nav-tabs-custom">
                        <ul class="nav nav-tabs">
                            <li class="active"><a href="#list-film" data-toggle="tab">Danh sách phim</a></li>
                            <li><a href="#timeline" data-toggle="tab">Timeline</a></li>
                            <li><a href="#editprofile" data-toggle="tab">Sửa hồ sơ</a></li>
                            <li><a href="#changeemail" data-toggle="tab">Thay đổi Email</a></li>
                            <li><a href="#changepassword" data-toggle="tab">Thay đổi mật khẩu</a></li>
                        </ul>
                        <div class="tab-content">
                            <div class="active tab-pane" id="list-film">
                            <!-- Post -->
                                <div class="box">
                                    <div class="box-header">
                                        <h3 class="box-title">Danh sách phim</h3>
                                    </div>
                                    <!-- /.box-header -->
                                    <div class="box-body">
                                        <table id="example1" class="table table-bordered table-striped">
                                            <thead>
                                                <tr>
                                                    <th>STT</th>
                                                    <th>Tiêu đề</th>
                                                    <th>Hình ảnh</th>
                                                    <th>Thể loại</th>
                                                    <th>Ngày đăng</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            <?php $i = 0 ?>
                                            <?php foreach (Auth::guard('admin')->user()->films as $film): ?>
                                            <?php $i ++ ?>
                                                <tr>
                                                    <td>{{ $i }}</td>
                                                    <td><a href="{{ route('admin.phim.show', [$film->slug]) }}">{{ $film->title_vi }}</a></td>
                                                    <td>
                                                        @if(!empty($film->img_thumbnail) && file_exists(public_path(get_thumbnail("assets/frontend/images/".$film->img_thumbnail))))
                                                            <img src="{{ asset("assets/frontend/images/".get_thumbnail($film->img_thumbnail)) }}" alt="Image" width="60px">
                                                        @else
                                                            <img src="{{ asset("img/no_image_thumb.jpg") }}" alt="Image" width="60px" height="60px">
                                                        @endif
                                                    </td>
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
                                                    <th>Tiêu đề</th>
                                                    <th>Hình ảnh</th>
                                                    <th>Thể loại</th>
                                                    <th>Ngày đăng</th>
                                                </tr>
                                            </tfoot>
                                        </table>
                                    </div>
                                    <!-- /.box-body -->
                                </div>
                            </div>
                            <!-- /.tab-pane -->

                            <div class="tab-pane" id="timeline">
                                <!-- The timeline -->
                                <ul class="timeline timeline-inverse">
                                    <!-- timeline time label -->
                                    <?php foreach (Auth::guard('admin')->user()->films as $film): ?>
                                    <li class="time-label">
                                        <span class="bg-red"> 
                                            {{ $film->created_at->format('d-m-Y') }}
                                        </span>
                                    </li>
                                    <!-- /.timeline-label -->
                                    <!-- timeline item -->
                                    <li>
                                        <i class="fa fa-film bg-blue"></i>
                                        <div class="timeline-item">
                                            <span class="time"><i class="fa fa-clock-o"></i> {{ $film->created_at->toTimeString() }}</span>

                                            <h3 class="timeline-header"><a href="{{ route('admin.profile.index') }}">Bạn</a> tải lên 1 bộ phim</h3>

                                            <div class="timeline-body">
                                                {{ $film->title_vi }}
                                            </div>
                                            <div class="timeline-footer">
                                                <a href="{{ route('admin.phim.show', [$film->slug]) }}" class="btn btn-primary btn-xs">Xem</a>
                                            </div>
                                        </div>
                                    </li>
                                    <?php endforeach ?>
                                    <!-- END timeline item -->
                                </ul>
                            </div>
                            <!-- /.tab-pane -->

                            <div class="tab-pane" id="editprofile">
                                <form class="form-horizontal" method="POST" action="{{ route('admin.profile.update') }}" id="updateForm">
                                    {{ csrf_field() }}
                                    <div class="form-group">
                                        <label for="inputUserName" class="col-sm-2 control-label">Tên đăng nhập</label>
                                        <div class="col-sm-10">
                                            <input type="text" name="username" class="form-control" id="inputUserName" placeholder="User Name" value="{{ Auth::guard('admin')->user()->username }}">
                                            <label class="error not-check-user hide-error">Tên này đã tồn tại!</label>
                                            <label class="text-primary check-user hide-error">Bạn có thể dùng tên này!</label>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="inputFullName" class="col-sm-2 control-label">Họ tên</label>

                                        <div class="col-sm-10">
                                            <input type="text" name="fullname" class="form-control" id="inputFullName" placeholder="Full Name" value="{{ Auth::guard('admin')->user()->fullname }}">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="inputBirthday" class="col-sm-2 control-label">Sinh nhật</label>

                                        <div class="col-sm-10">
                                            <input type="date" name="birthday" class="form-control" id="inputBirthday" placeholder="Your Birthday" value="{{ Auth::guard('admin')->user()->birthday }}">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="inputPassword" class="col-sm-2 control-label">Mật khẩu</label>

                                        <div class="col-sm-10">
                                            <input type="password" name="password" class="form-control" id="inputPassword" placeholder="Input Your Password">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="col-sm-offset-2 col-sm-10">
                                            <button type="submit" class="btn btn-primary" id="update-profile">Cập nhật</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <!-- /.tab-pane -->

                            {{-- Change Email --}}
                            <div class="tab-pane" id="changeemail">
                                <form class="form-horizontal" method="POST" action="{{ route('admin.profile.change.email') }}" id="changeEmailForm">
                                    {{ csrf_field() }}

                                    <div class="form-group">
                                        <label for="inputNewEmail" class="col-sm-2 control-label">Email mới</label>

                                        <div class="col-sm-10">
                                            <input type="email" name="new_email" class="form-control" id="inputNewEmail" placeholder="New Email" required>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="inputPassword1" class="col-sm-2 control-label">Mật khẩu</label>

                                        <div class="col-sm-10">
                                            <input type="password" name="password" class="form-control" id="inputPassword1" placeholder="Input Your Password" required>
                                        </div>
                                    </div>
                                  
                                    <div class="form-group">
                                        <div class="col-sm-offset-3 col-sm-9">
                                            <button type="submit" class="btn btn-primary" id="change-email">Cập nhật</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            
                            {{-- Change Password --}}
                            <div class="tab-pane" id="changepassword">
                                <form class="form-horizontal" method="POST" action="{{ route('admin.profile.changepassword') }}" id="changepasswordForm">
                                    {{ csrf_field() }}
                                    <div class="form-group">
                                        <label for="inputOldPassword" class="col-sm-3 control-label">Mật khẩu cũ</label>

                                        <div class="col-sm-9">
                                            <input type="password" name="old_password" class="form-control" id="inputOldPassword" placeholder="Old Password">
                                            <label class="text-danger check-pass hide-error">Mật khẩu của bạn không đúng. Vui lòng thử lại!</label>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="inputNewPassword" class="col-sm-3 control-label">Mật khẩu mới</label>

                                        <div class="col-sm-9">
                                            <input type="password" name="new_password" class="form-control" id="inputNewPassword" placeholder="New Password">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="inputConfirmPassword" class="col-sm-3 control-label">Xác nhận mật khẩu</label>

                                        <div class="col-sm-9">
                                            <input type="password" name="confirm_password" class="form-control" id="inputConfirmPassword" placeholder="Confirm Password">
                                        </div>
                                    </div>
                                  
                                    <div class="form-group">
                                        <div class="col-sm-offset-3 col-sm-9">
                                            <button type="submit" class="btn btn-primary" id="change-password">Cập nhật</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <!-- /.tab-content -->
                    </div>
                    <!-- /.nav-tabs-custom -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->

        </section>
        <!-- /.content -->
    </div>

    {{-- Modal for Confirm delete your user --}}
    <div class="modal fade" id="deleteProfile" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog1" role="document">
            <div class="modal-content modal-content1">
                <form action="{{ route('admin.profile.destroy') }}" method="GET" role="form" id="addNewAdminUser">
                    {{ csrf_field() }}
                    <div style="padding: 15px;">
                        <h4 class="modal-title text-center text-danger"><i class="fa fa-warning" style="font-size:38px;color:red"></i> Bạn chắc chắn xóa tài khoản của chính mình?</h4>
                        <h5 class="text-center text-danger">Vui lòng cân nhắc trước khi xác nhận!</h5>
                    </div>
                        <div class="row">
                            <div class="col-lg-10 col-lg-offset-1">

                                <div class="form-group">
                                    <input name="password" type="password" class="form-control" placeholder="Nhập mật khẩu để tiếp tục" required>
                                </div>
                            </div>
                        </div>
                        <br>
                    <br>
                    <div class="modal-footer">
                        <button class="btn btn-default" data-dismiss="modal">Hủy</button>
                        <button class="btn btn-danger" type="submit">Xóa tài khoản</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    

    @section('body.script')

    {{-- DatePicker --}}
    <script src="{{ asset('js/admin/jquery-ui.js') }}"></script>

    <!-- Jquery Validation -->
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.17.0/dist/jquery.validate.js"></script>

    {{-- Ajax change Avatar --}}
    {{-- <script src="{{ asset('/js/admin/uploadimg/jquery.js') }}"></script> --}}
    <script src="{{ asset('/js/admin/uploadimg/main.js') }}"></script>
    <script src="{{ asset('/js/admin/profile.js') }}"></script>

    <script>
        $(document).ready(function() {
            // Kiểm tra tên đăng nhập đã tồn tại hay chưa
            $('#inputUserName').on('keyup blur change focus', function(event) {
                var username = $(this).val();
                // console.log(username.length);
                if (username.length == 0) {
                    $('.not-check-user').addClass('hide-error');
                    $('label.check-user').addClass('hide-error');
                } else {
                    if (username != '{{ Auth::guard('admin')->user()->username }}') {
                        $.ajax({
                            url: '{{ route('admin.profile.checkusername') }}',
                            type: 'GET',
                            dataType: 'json',
                            data: {username: username},
                        })
                        .done(function(data) {
                            // console.log(data);
                            if (data == 1) {
                                // console.log("Not Ok");
                                $('.not-check-user').removeClass('hide-error');
                                $('.check-user').addClass('hide-error');
                                $('#update-profile').addClass('button_disabled').prop('disabled', true);
                            } else {
                                // console.log("Ok");
                                $('.check-user').removeClass('hide-error');
                                $('.not-check-user').addClass('hide-error');
                                $('#update-profile').removeClass('button_disabled').prop('disabled', false);
                            }
                        })
                        .fail(function() {
                            console.log("error");
                        });
                    } else {
                        $('.not-check-user').addClass('hide-error');
                        $('.check-user').addClass('hide-error');
                        $('#update-profile').addClass('button_disabled').prop('disabled', true);
                    }
                };   
            });

            // Kiểm tra email đăng ký đã tồn tại hay chưa
            $('#inputEmail').on('keyup', function(event) {
                var email = $(this).val();
                // console.log(email.length);
                if (email.length == 0) {
                    $('.not-check-email').addClass('hide-error');
                    $('label.check-email').addClass('hide-error');
                } else {
                    if (email != '{{ Auth::guard('admin')->user()->email }}') {
                        $.ajax({
                            url: '{{ route('admin.profile.checkemail') }}',
                            type: 'GET',
                            dataType: 'json',
                            data: {email: email},
                        })
                        .done(function(data) {
                            console.log(data);
                            if (data == 1) {
                                // console.log("Not Ok");
                                $('.not-check-email').removeClass('hide-error');
                                $('.check-email').addClass('hide-error');
                                $('#update-profile').addClass('button_disabled').prop('disabled', true);
                            } else {
                                // console.log("Ok");
                                $('.check-email').removeClass('hide-error');
                                $('.not-check-email').addClass('hide-error');
                                $('#update-profile').removeClass('button_disabled').prop('disabled', false);
                            }
                        })
                        .fail(function() {
                            console.log("error");
                        });
                    } else {
                        $('.not-check-email').addClass('hide-error');
                        $('.check-email').addClass('hide-error');
                        $('#update-profile').addClass('button_disabled').prop('disabled', true);
                    }
                };   
            });
            
        });
    </script>

    @endsection

@endsection
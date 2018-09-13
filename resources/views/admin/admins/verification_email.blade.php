@extends('admin.layout.index')


@section('body.content')
    @section('body.css')
    <!-- DatePicker -->
    <link rel="stylesheet" href="{{ asset('css/admin/jquery-ui.css') }}">
    <link rel="stylesheet" href="{{ asset('css/admin/veri_email.css') }}" class="css">

    {{-- CSS for this page --}}
    {{-- <link rel="stylesheet" href="{{ asset('css/admin/admin-user-detail.css') }}"> --}}
    
    @endsection

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1 style="padding-left: 90px;">Tạo tài khoản quản trị</h1>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row m-2" style="background-color: #fff;">

                <div class="col-lg-12">
                    <hr>
                    <!-- Content Wrapper. Contains page content -->
                    <div  id="ajax-table-admin-user">
                        @if (session('status_checkbox'))
                            <div class="box-header">
                                <span class="bg-danger click-to-hidden center-block" style="padding: 10px;">{{ session('status_checkbox') }}</span>
                            </div>
                        @endif
                        <!-- /.box-header -->
                        <div class="box-body">
                            <form action="{{ route('admin.add.account', [$admin->email_token]) }}" method="POST" role="form" id="addAccount" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <div class="row">
                                    <div class="col-lg-5 col-lg-offset-1">
                                        <div class="form-group">
                                            <label for="username">Tên đăng nhập</label>
                                            <input id="inputUserName" name="username" type="text" class="form-control" placeholder="Nhập tên đăng nhập của bạn">
                                            <label class="error not-check-user hide-error">Tên này đã tồn tại!</label>
                                            <label class="text-primary check-user hide-error">Bạn có thể dùng tên này!</label>
                                        </div>

                                        <div class="form-group">
                                            <label for="email">Địa chỉ Email</label>
                                            <input id="inputEmail" name="email" type="text" class="form-control" placeholder="Nhập địa chỉ email của bạn">
                                            <label class="error not-check-email hide-error">Tên này đã tồn tại!</label>
                                            <label class="text-primary check-email hide-error">Bạn có thể dùng tên này!</label>
                                        </div>

                                        <div class="form-group">
                                            <label for="password">Mật khẩu</label>
                                            <input name="password" type="password" class="form-control" placeholder="Nhập mật khẩu đăng nhập ở đây" id="inputPassword">
                                        </div>

                                        <div class="form-group">
                                            <label for="confirm_password">Xác nhận lại mật khẩu</label>
                                            <input name="confirm_password" type="password" class="form-control" placeholder="Nhập lại mật khẩu đăng nhập ở đây" id="confirm_password">
                                        </div>
                                    </div>

                                    <div class="col-lg-5">
                                        <div class="form-group">
                                            <label for="fullname">Họ và tên</label>
                                            <input name="fullname" type="text" class="form-control" placeholder="Nhập họ tên của bạn">
                                        </div>

                                        <div class="form-group">
                                            <label for="avatar">Hình đại diện</label>
                                            <input name="avatar" type="file" class="form-control">
                                        </div>

                                        <div class="form-group">
                                            <label for="birthday">Sinh nhật</label>
                                            <input name="birthday" type="text" class="form-control" placeholder="Sinh nhật của bạn" id="birthday">
                                        </div>
    
                                        <div class="row" style="padding-top: 25px;">
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <button type="reset" class="btn btn-default btn-block">Hủy</button>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <button type="submit" class="btn btn-primary btn-block">Tạo tài khoản</button>
                                                </div>
                                            </div>
                                        </div>
                                        
                                    </div>
                                </div>
                                <br>
                            </form>    
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

    <!-- Jquery Validation -->
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.17.0/dist/jquery.validate.js"></script>

    <!-- page script -->
    <script src="{{ asset('js/admin/admin-user-detail.js') }}"></script>
    <script src="{{ asset('/js/admin/veri_email.js') }}"></script>

    <script>
        $(document).ready(function() {
             $( function() {
                $( "#birthday" ).datepicker();
                $( "#birthday" ).datepicker( "option", "dateFormat", "yy-mm-dd" );
            });

            // Kiểm tra tên đăng nhập đã tồn tại hay chưa
            $('#inputUserName').on('blur change', function(event) {
                var username = $(this).val();
                // console.log(username.length);
                if (username.length == 0) {
                    $('.not-check-user').addClass('hide-error');
                    $('label.check-user').addClass('hide-error');
                } else {
                    $.ajax({
                        url: '{{ route('admin.profile.checkusername') }}',
                        type: 'GET',
                        dataType: 'json',
                        data: {username: username},
                    })
                    .done(function(data) {
                        // console.log(data);
                        if (data >= 1) {
                            // console.log("Not Ok");
                            $('.not-check-user').removeClass('hide-error');
                            $('.check-user').addClass('hide-error');
                        } else {
                            // console.log("Ok");
                            $('.check-user').removeClass('hide-error');
                            $('.not-check-user').addClass('hide-error');
                        }
                    })
                    .fail(function() {
                        console.log("error");
                    });
                };   
            });

            // Kiểm tra email đăng ký đã tồn tại hay chưa
            $('#inputEmail').on('blur change', function(event) {
                var email = $(this).val();
                // console.log(email);
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
                            } else {
                                // console.log("Ok");
                                $('.check-email').removeClass('hide-error');
                                $('.not-check-email').addClass('hide-error');
                            }
                        })
                        .fail(function() {
                            console.log("error");
                        });
                    } else {
                        $('.not-check-email').addClass('hide-error');
                        $('.check-email').addClass('hide-error');
                    }
                };   
            });
        });
        
    </script>

    @endsection

@endsection
@include('frontend.layout.head')
<body class="body-page ">
    <div id="bswrapper_inhead"></div>
    
    <div class="container khoi-body">
        <div class="container khoi-body">
            <div class="login-registration"><a href="{{url('/')}}" class="logo"><img
                            src="{{asset('assets/frontend/images/logo-login.png')}}"></a>
                <!-- Hien thi thong bao loi -->
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
            <!-- Hien thi thong bao thanh cong -->
                @if(session('thongbao'))
                    <div class="alert alert-success">
                        {{session('thongbao')}}
                    </div>
                @endif
                <form  action="{{ URL('dang-ki.html') }}" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
                    <input class="form-control" type="text" name="username" placeholder="Username" value="{{ old('username')}}" autocomplete="on" autofocus title="Vui lòng điền username"> <br>
                    <input class="form-control" type="email" name="email" placeholder="Email đăng nhập" autocomplete="on" value="{{ old('email')}}" autofocus > <br>
                    <input class="form-control" type="text" name="fullname" placeholder="Fullname" autocomplete="on" autofocus value="{{ old('fullname')}}" title="Tên không được chứa số"> <br>
                    <input class="form-control" type="date" name="birthday"  autocomplete="on" value="{{ old('birthday')}}" autofocus> <br>
                    <input class="form-control" type="file" name="avatar" autocomplete="on" value="{{ old('avatar')}}" autofocus> <br>
                    <input class="form-control" type="password" name="password" placeholder="Mật khẩu"  autocomplete="off" title="Password ít nhất 5 kí tự và nhỏ hơn 20 kí tự"> <br>
                    <input class="form-control" type="password" name="re_password"  placeholder="Nhập lại mật khẩu" autocomplete="off" title="Password ít nhất 5 kí tự và nhỏ hơn 20 kí tự"> <br>
                    <br>
                    <button class="form-submit login-button" type="submit" value="Đăng Ký">Đăng kí</button>
                    <a href="{{url('dang-nhap.html')}}" class="pull-right" style="margin-right: 300px">Quay lại</a></p> <input type="hidden" name="token_login" value=""/>
                </form>
            </div>
        </div>
    </div>
</body>
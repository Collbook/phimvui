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
                @if(session('error'))
                    <div class="alert alert-danger">
                        {{session('error')}}
                    </div>
                @endif
                @if(session('thongbao'))
                    <div class="alert alert-success">
                        {{session('thongbao')}}
                    </div>
                @endif
                <form id="form_login" action="{{ URL('dang-nhap.html') }}" method="POST">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}"/>

                    <input class="form-input" type="email" name="email"  value="{{ old('email')}}"  placeholder="Email đăng nhập" autocomplete="on" autofocus> <br>
                    <input class="form-input" type="password" name="password" placeholder="Mật khẩu" autocomplete="off"> <br>
                    <section>
                        <div class="checkboxFive">
                            <input type="checkbox" name="remember_token" id="checkboxFiveInput" />
                            <label for="checkboxFiveInput"></label></div>
                        Ghi nhớ
                    </section>
                    <input type="hidden" name="redirect_url" value="">
                    <button class="form-submit login-button" type="submit" value="Đăng Nhập">Đăng Nhập</button>

                    <div class="linengang"></div>
                    <p class="registration-id">Chưa có tài khoản? <a href="{{url('/dang-ki.html')}}">Đăng ký</a></p> <input type="hidden" name="token_login" value=""/>
                </form>
            </div>
        </div>
    </div>
</body>
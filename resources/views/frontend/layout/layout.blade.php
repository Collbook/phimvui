<!DOCTYPE html>
<html lang="vi" dir="LTR" ><!--xmlns:fb="http://www.facebook.com/2008/fbml"-->
    <!-- phần head-->
    @include('frontend.layout.head')
    <!-- Phần body  cua trang web-->
    <body class="body-page " ng-app="ngAppSearch">
        <!-- phần header-->
        @include('frontend.layout.header')
        <div id="bswrapper_inhead"></div>
        <div class="container khoi-body">
            <!-- noi dung trang phim ben phai-->
            <div class="khoi-trai" >
                    <!-- Đoạn view chèn vào tùy theo trang được chọn -->
                    @yield('insert_left')
            </div>
            <div class="khoi-phai">
                <!-- Đoạn view chèn vào tùy theo trang được chọn -->
                @yield('insert_right')
            </div>
        </div>
        @include('frontend.layout.footer')
    </body>
</html>
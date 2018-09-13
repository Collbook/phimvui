<!-- Layout header-->
<nav class="navbar navbar-default" role="navigation"  >
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse"
                    data-target="#bs-example-navbar-collapse-1"><span class="sr-only">Toggle navigation</span> <span
                    class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span></button>
            <a class="navbar-brand" href="{{url('/')}}"><img src="{{asset('assets/frontend/images/logo-top.png')}}" alt="Phim Vui"> </a></div>
     <!-- Phần header-->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li class="dropdown"><a href="" class="dropdown-toggle" data-toggle="dropdown">Thể Loại <span
                        class="caret"></span></a>
                    <ul class="dropdown-menu" role="menu">
                    @foreach($categorys as $category)
                        <li><a href="{{url('the-loai/'.$category->slug)}}">{{$category->name}}</a></li>
                    @endforeach
                    </ul>
                </li>
                <li class="dropdown"><a href="" class="dropdown-toggle" data-toggle="dropdown">Quốc Gia <span
                        class="caret"></span></a>
                    <ul class="dropdown-menu" role="menu">
                    @foreach($countries as $country)
                        <li><a href="{{url('quoc-gia/'.$country->slug)}}">{{$country->name}}</a></li>
                    @endforeach
                    </ul>
                </li>
                <li class="dropdown"><a href="{{url('phim-le')}}" class="dropdown-toggle" role="button"
                                        aria-expanded="false">Phim Lẻ <span class="caret"></span></a>
                    <ul class="dropdown-menu" role="menu">
                    @foreach($years as $year)
                        <li><a href="{{url('phim-le/'.$year->published_year)}}">{{$year->published_year}}</a></li>
                    @endforeach
                    </ul>
                </li>
                <li class="dropdown"><a href="{{url('phim-bo')}}" class="dropdown-toggle" role="button"
                                        aria-expanded="false">Phim Bộ<span class="caret"></span></a>
                    <ul class="dropdown-menu" role="menu">
                    @foreach($countries as $country)
                        <li><a href="{{url('phim-bo/'.$country->slug)}}">{{$country->name}}</a></li>
                    @endforeach
                    </ul>
                </li>
                <li><a href="{{url('/phim-de-cu')}}">Phim Đề Cử</a>
                <li><a href="{{url('/phim-chieu-rap')}}">Phim Chiếu Rạp</a>
                <!--li><a href="#">Tin Tức</a-->
                
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li>
                    <form class="navbar-form"  enctype="application/x-www-form-urlencoded" role="search" id="search-block" method="get" action="#"  ng-controller="SearchController">
                        <div class="form-group" >
                            <input type="text" class="form-control" id="query_search" placeholder="Search" name="q" maxlength="100" autocomplete="off" ng-change="SearchFuntion()" ng-model="searchValue"/>
                        </div>
                        <button type="submit" class="btn btn-default"><span class="fa fa-search" style="color:#77c282"></span>
                        </button>                        
                        <div class="search-hint" id="search-hint" >
                            <ul ng-repeat="film in films">
                            <li>
                                <a href="{{url('')}}/xem-phim/<%film.slug%>">
                                    <div class="image" style="background-image:url({{asset('assets/frontend/images/<%film.img_thumbnail%>')}})"></div>
                                    <div class="content">
                                        <b class="title-film"><%film.title_vi%></b>
                                        <p><%film.title_en%></p>
                                    </div>
                                </a>
                            </li>
                            </ul>
                        </div>
                        
                    </form>
                </li>
                @if(Auth::check())
                   <p class ="id-customer" style="display:none" value="{{Auth::user()->avatar}}">{{Auth::user()->id}}</p>
                    <li class="dropdown user"><a class="dropdown-toggle dropdown-toggle-user" data-toggle="dropdown"><img
                                    src="{{asset('assets/frontend/images/customer/icon-user.png')}}"></a>
                        <ul class="dropdown-menu dropdown-menu-user" role="menu">
                            <li style="margin-left: -19px"><a href="#" data-toggle="dropdown" id ="fullname-customer">{{Auth::user()->fullname}}</a></li>
                            <li style="margin-left: auto"><a href="#" data-toggle="dropdown">{{Auth::user()->email}}</a></li>
                            <li><a href="{{url('dang-xuat.html')}}">Đăng Xuất</a></li>
                        </ul>
                </li>
                @else
                    <li><a href="{{url('dang-nhap.html')}}">Đăng Nhập</a></li>
                    @endif
            </ul>
        </div>
</nav>
<!--end header -->
@extends('admin.layout.index')
@section('body.css')
    <link rel="stylesheet" href="{{asset('css/phim/my.css')}}">
@endsection
@section('body.content')
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
                <div class="col-xs-12">
                    <div class="box">
                    @include('admin.flashmess.mess')
                    <!-- Nội dung profile -->
                        @foreach($films as $film)
                            <div class="main-content">
                                <div class="container-us">
                                    <div class="content-header">
                                        <div class="row">
                                            <div class="col-md-4 col-sm-12 col-xs-12" style=" z-index: 900">
                                                @if(!empty($film->img_thumbnail) && file_exists(public_path(get_thumbnail("upload/phim/".$film->img_thumbnail))))
                                                    <img src="{{ asset("upload/phim/".get_thumbnail($film->img_thumbnail)) }}"
                                                         alt="Image" class="user-img">
                                                @else
                                                    <img src="{{ asset("img/no_image_thumb.jpg") }}"
                                                         alt="Image" class="user-img">
                                                @endif
                                            </div>
                                            <div class="col-md-7 col-sm-12 col-xs-12">
                                                <div class="header-info">
                                                    <h3 class="info-name col-md-5 col-sm-12 col-sx-12">
                                                        {{$film->title_vi}}
                                                    </h3>
                                                    <div class="col-md-2 col-sm-2 col-sx-12"></div>
                                                    <h4 class="info-cv col-md-5 col-sm-12 col-sx-12">
                                                    </h4>
                                                </div>
                                                <div class="bottom-info">
                                                    <div class="col-md-5 col-sm-6 col-sx-12">
                                                        <i class="fa fa-building" style="color:#fbc531"></i>
                                                        <label for="date_publisher">Nhà sản xuất: </label>
                                                        <span>{{$film ->company_production}}</span>
                                                        <br>
                                                        <i class="fa fa-calendar" style="color:#088A08"></i>
                                                        <label for="date_publisher">Ngày xuất bản: </label>
                                                        <span>{{$film ->published_year}}</span>
                                                        <br>
                                                        <i class="fa fa-calendar-o" style="color:#00a8ff"></i>
                                                        <label for="date_publisher">Ngày chiếu rạp: </label>
                                                        <span>{{$film ->date_theater}}</span>
                                                        <br>
                                                    </div>
                                                    <div class="col-md-2 col-sm-0 col-sx-12"></div>
                                                    <div class="col-md-5 col-sm-6 col-sx-12">
                                                        <i class="fa fa-user-secret" style="color: #e84118"></i>
                                                        <label for="date_publisher">Người đăng: </label>
                                                        <span>{{$film ->admins ->username}}</span>
                                                        <br>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row instance-info">
                                            <div clas="col-md-12 col-sm-12 col-xs-12" id="award-info">
                                                <p class="title">
                                                    <i class="fa fa-info-circle"></i> Chi Tiết Phim </p>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="col-md-12">
                                                        <label for="title_vi">Tên Phim(tiếng việt):</label>
                                                        <span>{{$film->title_vi}}</span>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <label for="title_vi">Tên Phim(tiếng anh):</label>
                                                        <span>{{$film->title_en}}</span>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <label for="title_vi">Thời Lượng Phim:</label>
                                                        <span>{{$film->time}} phút</span>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <label for="title_vi">Chất Lượng Phim:</label>
                                                        <span>{{$film->quality}}</span>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <label for="title_vi">Độ Phân Giải:</label>
                                                        <span>{{$film->resolution}}</span>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <label for="title_vi">Trạng Thái:</label>
                                                        <span>{{$film->status ==1 ? 'Đang Hoạt Động' : 'Không Hoạt Động'}}</span>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="col-md-12">
                                                        <label for="title_vi">Thể Loại Phim:</label>
                                                        <span>{{$film->film_type ==0 ? 'Phim lẻ' : 'Phim bộ'}}</span>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <label for="title_vi">Phim Rạp:</label>
                                                        <span>{{$film->film_cinema ==1 ? 'Có' : 'Không'}}</span>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <label for="title_vi">Phim Hot:</label>
                                                        <span>{{$film->film_hot ==1 ? 'Có' : 'Không'}}</span>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <label for="title_vi">Lượt Xem:</label>
                                                        <span>{{$film->view_count}}</span>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <label for="title_vi">Điểm:</label>
                                                        <span>{{$film->IMDb}}</span>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </section>
    </div>
@endsection
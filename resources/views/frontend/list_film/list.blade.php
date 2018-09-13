<!---->
@extends('frontend.layout.layout')
@section('insert_left')
    <div class="group-film group-film-category"><h1>Phim {{$title}}<i class="fa fa-caret-right" aria-hidden="true"></i>
        </h1> <span class="line-ngang"></span>
        <ul class="locphim-category">
            <form class="form-filter" id="form_filter" action="{{url('/loc-phim')}}" method="GET">
                <li style="display: none"><select name="sap-xep" id="order">
                        <option value=""selected>-- Sắp xếp --</option>
                        <option value="moi-cap-nhat">Mới cập nhật</option>
                        <option value="nam-xuat-ban">Năm xuất bản</option>
                        <option value="ten-phim">Tên phim</option>
                        <option value="imdb">IMDb</option>
                    </select></li>
                <li><select name="danh-muc" id="type">
                        <option value="">-- Danh mục --</option>
                        <option value="1">Phim bộ</option>
                        <option value="0">Phim lẻ</option>
                    </select></li>
                <li class="text-center"><select name="quoc-gia" id="country">
                        <option value=""selected>-- Quốc gia --</option>
                        @foreach($countries as $country)
                            <option value="{{$country->id}}">{{$country->name}}</option>
                        @endforeach
                    </select></li>
                <li><select name="the-loai" id="feature">
                        <option value=""selected>-- Thể loại --</option>
                        @foreach($categorys as $category)
                        <option value="{{$category->id}}">{{$category->name}}</option>
                        @endforeach
                    </select></li>
                <li><select name="nam" id="year">
                        <option value="">-- Năm --</option>
                        @foreach($years as $year)
                        <option value="{{$year->published_year}}">{{$year->published_year}}</option>
                        @endforeach

                    </select></li>
                <li>
                    <button type="submit" class="submit-filter">Lọc Phim</button>
                </li>
            </form>
        </ul>
        <div class="group-film-small">
            @foreach($films as $film)
                <a href="{{url('xem-phim/'.$film->slug)}}" class=" film-small">
                    <div class="poster-film-small"
                         style="background-image:url({{asset('assets/frontend/images/'.$film->img_thumbnail)}})">
                        <div class="sotap">{{$film->total_episodes}}</div>
                        <ul class="tag-film">
                            <li>
                                <div class="hd">{{$film->quality}}</div>
                            </li>
                        </ul>
                        <div class="play"></div>
                    </div>
                    <div class="title-film-small"><b class="title-film">{{$film->title_vi}}</b>
                        <p>{{$film->title_en}}</p></div>
                    @endforeach
                </a>
        </div>
        <ul class='page-category'>
            <li style="margin-top: 10px">{{$films->links()}}</li>
        </ul>

    </div>
@stop
@section('insert_right')
    @include('frontend.layout.right')
@stop
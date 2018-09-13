<!---->
@extends('frontend.layout.layout')
        
        @section('insert_left')
        <!-- slide -->
        @include('frontend.layout.slide')
        <!-- phân chia theo từng group phim -->     
        <!--  phim de cu-->   
        <div class="group-film">
            <h2><a href="{{url('phim-de-cu')}}">phim đề cử
            <i class="fa fa-caret-right"  aria-hidden="true">                
            </i></a></h2><a href="{{url('phim-de-cu')}}" class="more" style="background-image:url({{asset('assets/frontend/images/more.png')}})"></a> <span  class="line-ngang"></span>
            <div class="phimdecu-slider">
                <!-- hien thi tung phim trong group-->
                @foreach($phimdecu as $decu)
                <div class="item"><a href="{{url('xem-phim/'.$decu->slug)}}"
                                     style="background-image:url({{asset('assets/frontend/images/'.get_thumbnail($decu->img_thumbnail))}})">
                        <div class="black-gradient"><b class="title-film">{{$decu->title_vi}} </b>
                            <p>{{$decu->title_en}}({{$decu->published_year}})</p>
                            <!-- neu phim tap thi hien thi so tap o day-->
                            <div class="sotap" style="display:@if($decu->film_type!=1)
                 none
                  @endif">{{$decu->total_episodes}}</div>
                            <ul class="tag-film">
                                <li>
                                    <!-- hien thi HD/SD/TS-->
                                    <div class="{{strtolower($decu->quality)}}">{{$decu->quality}}</div>
                                </li>
                            </ul>
                        </div>
                        <div class="play"></div>
                    </a>
                </div>
                @endforeach 
            </div>
        </div>
        <!-- group phim chieu rap -->
        <div class="group-film" id="cat-phim-chieu-rap" data-page="1" data-slug="" >
            <h2>
                <a href="{{url('phim-chieu-rap')}}">phim chiếu rạp   
                    <i class="fa fa-caret-right" aria-hidden="true"></i>
                </a>
            </h2>
            <ul class="sapxep">
                <li><a href="" onclick="phim_chieu_rap('', 1, '');" ng-click="myclick()" title="Ngày cập nhật" class="active">Ngày cập nhật </a></li>
                <li><a href="" onclick="phim_chieu_rap('', 1, 'IMDB');" title="IMDB">IMDB</a></li>
                <li><a href="" onclick="phim_chieu_rap('', 1, 'title_vi');" title="Tên phim">Tên phim</a></li>
            </ul>
            <a href="{{url('phim-chieu-rap')}}" class="more" style="background-image:url({{asset('assets/frontend/images/more.png')}})"></a> <span class="line-ngang"></span>
            <div class="arrow">
                <a href="" onclick="phim_chieu_rap('', 0, '');" class="left"></a>
                <a href="" onclick="phim_chieu_rap('', 2, '');" class="right "></a>
            </div>
             <div class="group-film-small" id="group-film-chieu-rap" >  
                @foreach($phimchieurap as $chieurap)               
                <a href="{{url('xem-phim/'.$chieurap->slug)}}" class="film-small @if($loop->index%5==0)
                 no-margin
                  @endif
                  ">
                    <div class="poster-film-small" style="background-image:url({{asset('assets/frontend/images/'.get_thumbnail($chieurap->img_thumbnail))}})">
                        <ul class="tag-film">
                            <li>
                            <div class="{{strtolower($chieurap->quality)}}">{{$chieurap->quality}}</div>
                            </li>
                        </ul>
                        <div class="play"></div>
                    </div>
                    <div class="title-film-small"><b class="title-film">{{$chieurap->title_vi}}</b>
                        <p>{{$chieurap->title_en}}</p></div>
                </a>
                @endforeach
            </div>
        </div>
       <!-- Group phim bộ -->
        <div class="group-film" id="cat-phim-bo" data-page="1" data-slug=""><h2><a href="{{url('phim-bo')}}">phim bộ chọn lọc<i class="fa fa-caret-right" aria-hidden="true"></i></a></h2>
            <!-- phân loại theo quốc gia-->
            <ul class="phanloai">
                <li><a href="{{url('phim-bo/my')}}" title="Phim bộ Mỹ">Mỹ</a></li>
                <li><a href="{{url('phim-bo/han-quoc')}}" title="Phim bộ Hàn quốc">Hàn</a></li>
                <li><a href="{{url('phim-bo/trung-quoc')}}" title="Phim bộ Trung quốc">Trung
                        Quốc</a></li>
            </ul>
            <ul class="sapxep" >
                <li><a href="" onclick="phim_bo('', 1, '');" title="Ngày cập nhật" class="active">Ngày cập
                        nhật</a></li>
                <li><a href="" onclick="phim_bo('', 1, 'imdb');" title="IMDB">IMDB</a></li>
                <li><a href="" onclick="phim_bo('', 1, 'title_vi');" title="Tên phim">Tên phim</a></li>
            </ul>
            <a href="{{url('danh-sach')}}" class="more" style="background-image:url({{asset('assets/frontend/images/more.png')}})"></a> <span class="line-ngang"></span>
            <div class="arrow"><a href="" onclick="phim_bo('', 0, '');" class="left "></a> <a href="" onclick="phim_bo('', 2, '');" class="right "></a></div>
            <div class="group-film-small" id ="group-film-bo">
                @foreach($phimbo as $bo)
                <a href="{{url('xem-phim/'.$bo->slug)}}" class="film-small @if($loop->index%5==0)
                 no-margin
                  @endif">
                    <div class="poster-film-small" style="background-image:url({{asset('assets/frontend/images/'.get_thumbnail($bo->img_thumbnail))}})">
                        <div class="sotap">{{$bo->total_episodes}}</div>
                        <ul class="tag-film">
                            <li>
                                <div class="{{strtolower($bo->quality)}}">{{$bo->quality}}</div>
                            </li>
                        </ul>
                        <div class="play"></div>
                    </div>
                    <div class="title-film-small"><b class="title-film">{{$bo->title_vi}}</b>
                        <p>{{$bo->title_en}}({{$bo->published_year}})</p></div>
                </a> 
                @endforeach
                </div>
        </div>
        <div class="group-film" id="cat-phim-le" data-page="1" data-slug="" ><h2><a href="{{url('phim-le')}}">phim lẻ chọn lọc<i class="fa fa-caret-right" aria-hidden="true"></i></a></h2>
            <ul class="phanloai" >
                <li><a href="{{url('the-loai/hanh-dong.html')}}" title="Phim lẻ Hành động">Hành động </a></li>
                <li><a href="{{url('the-loai/hai-huoc.html')}}" title="Phim lẻ Hài">Hài</a></li>
                <li><a href="{{url('the-loai/tam-ly.html')}}"  title="Phim lẻ Tâm Lý">Tâm Lý</a></li>
                <li><a href="{{url('the-loai/kinh-di.html')}}" title="Phim lẻ Kinh dị">Kinh dị</a></li>
            </ul>
            <ul class="sapxep">
                <li><a href="" onclick="phim_le('', 1, '');" title="Ngày cập nhật" class="active">Ngày cập nhật</a></li>
                <li><a href="" onclick="phim_le('', 1, 'imdb');" title="IMDB">IMDB</a></li>
                <li><a href="" onclick="phim_le('', 1, 'title_vi');" title="Tên phim">Tên phim</a></li>
            </ul>
            <a href="{{url('phim-le')}}" class="more" style="background-image:url({{asset('assets/frontend/images/more.png')}})"></a> <span class="line-ngang"></span>
            <div class="arrow"><a href="" onclick="phim_le('', 0, '');" class="left"></a> <a
                        href="" onclick="phim_le('', 2, '');" class="right"></a></div>
            <div class="group-film-small" id="group-film-le">
            @foreach($phimle as $le)
        
            <a href="{{url('xem-phim/'.$le->slug)}}" class="film-small @if($loop->index%5==0)
                 no-margin
                  @endif">
                    <div class="poster-film-small" style="background-image:url({{asset('assets/frontend/images/'.get_thumbnail($le->img_thumbnail))}})">
                        <ul class="tag-film">
                            <li>
                                <div class="{{strtolower($le->quality)}}">{{$le->quality}}</div>
                            </li>
                        </ul>
                        <div class="play"></div>
                    </div>
                    <div class="title-film-small"><b class="title-film">{{$le->title_vi}}</b>
                        <p>{{$le->title_en}}({{$le->published_year}})</p></div>
                </a> 
                @endforeach
                </div>
        </div>
        <div class="group-film" id="cat-phim-anime" data-page="1" data-slug="nhat-ban"><h2><a  href="{{url('the-loai/anime.html')}}">Anime<i class="fa fa-caret-right" aria-hidden="true"></i></a></h2>
            <ul class="phanloai"></ul>
            <ul class="sapxep">
                <li><a href="" onclick="phim_anime('nhat-ban', 1, '');" title="Ngày cập nhật"
                       class="active">Ngày cập nhật</a></li>
                <li><a href="" onclick="phim_anime('nhat-ban', 1, 'imdb');" title="IMDB">IMDB</a></li>
                <li><a href="" onclick="phim_anime('nhat-ban', 1, 'title_vi');" title="Tên phim">Tên phim</a>
                </li>
            </ul>
            <a href="{{url('the-loai/anime.html')}}" class="more" style="background-image:url({{asset('assets/frontend/images/more.png')}})"></a></a> <span class="line-ngang"></span>
            <div class="arrow"><a href="" onclick="phim_anime('nhat-ban', 0, '');" class="left"></a> <a href=""  onclick="phim_anime('nhat-ban', 2, '');" class="right"></a></div>
            <div class="group-film-small" id="group-film-anime">
                @foreach($animes as $anime)
            
                <a href="{{url('xem-phim/'.$anime->slug)}}"
                        class="film-small @if($loop->index%5==0)
                 no-margin
                  @endif ">
                    <div class="poster-film-small"
                         style="background-image:url({{asset('assets/frontend/images/'.get_thumbnail($anime->img_thumbnail))}})">
                        <div class="sotap"  style="display:@if($anime->film_type!=1)
                 none
                  @endif">{{$anime->total_episodes}}</div>
                        <ul class="tag-film">
                            <li>
                                <!--div class="hd">HD</div-->
                            </li>
                        </ul>
                        <div class="play"></div>
                    </div>
                    <div class="title-film-small"><b class="title-film">{{$anime->title_vi}}</b>
                        <p>{{$anime->title_en}}({{$anime->published_year}})</p></div>
                </a>
                @endforeach
                </div>
        </div>
        <div class="group-film" id="cat-the-loai-tv-show" data-page="1" data-slug=""><h2><a href="{{url('the-loai/tv-show')}}">TV Shows
            <i class="fa fa-caret-right" aria-hidden="true"></i></a></h2> <a href="{{url('the-loai/tv-show')}}" class="more" style="background-image:url({{asset('assets/frontend/images/more.png')}})"></a> <span class="line-ngang"></span>
            <div class="arrow"><a href="" onclick="phim_tv_show('', 0, '');" class="left"></a> <a href="" onclick="phim_tv_show('', 2, '');" class="right "></a></div>
            <div class="group-film-small" id="group-film-tv-show">
            @foreach($tvshows as $tvshow)
        
            <a href="{{url('xem-phim/'.$tvshow->slug)}}" class="film-small @if($loop->index%5==0)
                 no-margin
                  @endif ">
                    <div class="poster-film-small"
                         style="background-image:url({{asset('assets/frontend/images/'.get_thumbnail($tvshow->img_thumbnail))}})">
                        <div class="sotap"  style="display:@if($tvshow->film_type!=1)
                 none
                  @endif">{{$tvshow->total_episodes}}</div>
                        <ul class="tag-film">
                            <li>
                                <div class="{{strtolower($tvshow->quality)}}">{{($tvshow->quality)}}</div>
                            </li>
                        </ul>
                        <div class="play"></div>
                    </div>
                    <div class="title-film-small"><b class="title-film">{{$tvshow->title_vi}}</b>
                        <p>{{$tvshow->title_en}}({{$tvshow->published_year}})</p></div>
                </a>
            @endforeach
                </div>
        </div>
        <!-- Group phim sap chieu-->
        <div class="group-film" id="cat-phim-sap-chieu" data-page="1" data-slug=""><h2><a  href="{{url('phim-sap-chieu')}}">Phim Sắp Chiếu
            <i class="fa fa-caret-right" aria-hidden="true"></i></a></h2> <a href="{{url('phim-sap-chieu')}}" class="more" style="background-image:url({{asset('assets/frontend/images/more.png')}})"></a> <span class="line-ngang"></span>
            <div class="arrow"><a href="" onclick="phim_sap_chieu('', 0, '');" class="left "></a> <a href="" onclick="phim_sap_chieu('', 2, '');" class="right "></a></div>
            <div class="group-film-small" id="group-film-sap-chieu">
            @foreach($phimsapchieu as $sapchieu)
        
            <a  href="{{url('xem-phim/'.$sapchieu->slug)}}" class="film-small @if($loop->index%5==0)
                 no-margin
                  @endif ">
                    <div class="poster-film-small" style="background-image:url({{asset('assets/frontend/images/'.get_thumbnail($sapchieu->img_thumbnail))}})">
                        <ul class="tag-film">
                            <li>
                                <!--div class="hd">HD</div-->
                            </li>
                        </ul>
                        <div class="play"></div>
                    </div>
                    <div class="title-film-small"><b class="title-film">{{$sapchieu->title_vi}}</b>
                        <p>{{$sapchieu->title_en}}({{$sapchieu->published_year}})</p></div>
                </a> 
            @endforeach
                </div>
        </div>
    
    @stop
    <!-- noi dung ben phai cua trang-->
    @section('insert_right')
          
        <!-- Danh sach phim duoc xem nhieu-->
            @include('frontend.topphimvui.topphimle')
        <!-- Danh sach phim bo dc xem nhieu -->
            @include('frontend.topphimvui.topphimbo')
        <!-- phan loai theo chu de hot -->
        <div class="chudehot"><h3><a href="abc/chu-de-hot" style="text-decoration:none;color:#cdcdcd;"> chủ đề hot</a></h3>
            <ul>
            
                <li><a href="{{url('/tag/phim-valentine')}}"
                       style="background-image:url({{asset('assets/frontend/images/chude/phim-valentine.jpg')}});background-size: cover;"></a>
                </li>
                <li><a href="{{url('/tag/phim-giang-sinh')}}"
                       style="background-image:url({{asset('assets/frontend/images/chude/phim-giang-sinh.jpg')}});background-size: cover;"></a>
                </li>
                <li><a href="{{url('/the-loai/kinh-di.html')}}"
                       style="background-image:url({{asset('assets/frontend/images/chude/halloween.jpg')}});background-size: cover;"></a>
                </li>
                <li><a href="{{url('/tag/ngon-tinh-trung-quoc')}}"
                       style="background-image:url({{asset('assets/frontend/images/chude/Ngon-Tinh-Trung-Quoc.jpg')}});background-size: cover;"></a>
                </li>
                <li><a href="{{url('/tag/thanh-xuan-hoc-duong')}}"
                       style="background-image:url({{asset('assets/frontend/images/chude/Thanh-Xuan-Hoc-Duong.jpg')}});background-size: cover;"></a>
                </li>
                <li><a href="{{url('/tag/nganh-y')}}"
                       style="background-image:url({{asset('assets/frontend/images/chude/Chu-De-Nganh-Y.jpg')}});background-size: cover;"></a>
                </li>
                <li><a href="{{url('/tag/di-nhan')}}"
                       style="background-image:url({{asset('assets/frontend/images/chude/Chu-De-Di-Nhan.jpg')}});background-size: cover;"></a>
                </li>
                <li><a href="{{url('/quoc-gia/an-do')}}"
                       style="background-image:url({{asset('assets/frontend/images/chude/Chu-De-Bollywood.jpg')}});background-size: cover;"></a>
                </li>
            </ul>
        </div>
        @include('frontend.layout.right')
    @stop

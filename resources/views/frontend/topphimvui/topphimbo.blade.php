<div id="widget_top_film_country_by_type_phim-bo" class="topphim-ngang"><h3>Top phim bộ</h3>
            <ul class="phanloai">
                <li><a href="javascript:;" class="actived"
                       onclick="top_view_country_by_type('my','phim-bo','week')">Mỹ</a></li>
                <li><a href="javascript:;" class="" onclick="top_view_country_by_type('han-quoc', 'phim-bo','week')">Hàn
                        Quốc</a></li>
                <li><a href="javascript:;" class="" onclick="top_view_country_by_type('trung-quoc','phim-bo','week')">Trung
                        Quốc</a></li>
            </ul>
            <ul id="blog1" class="film active">
            @foreach($topphimbo as $topbo)
                <li><a href="{{url('xem-phim/'.$topbo->slug)}}">
                        <div class="image"
                             style="background-image:url({{asset('assets/frontend/images/'.$topbo->img_background)}})"></div>
                        <span class="imdb">IMDb <br> <b>{{$topbo->IMDb}}</b></span>
                        <div class="info"><b class="title-film">{{$topbo->title_vi}}</b>
                            <p>{{$topbo->title_en}}</p></div>
                    </a>
                </li>
            @endforeach
            </ul>
        </div>
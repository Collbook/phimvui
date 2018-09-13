<div class="topphim-doc"><h3>top phim vui - phim lẻ</h3>
            <ul class="film">
            @foreach($topphim as $top)
                <li><a href="{{url('xem-phim/'.$top->slug)}}">
                        <div class="image" style="background-image:url({{asset('assets/frontend/images/'.get_thumbnail($top->img_thumbnail))}})"></div>
                        <div class="info"><b class="title-film">{{$top->title_vi}}</b>
                            <p>{{$top->title_en}}</p> <span class="luotxem">Lượt xem ngày: 3067</span> <span
                                    class="imdb">IMDB {{$top->IMDb}}</span></div>
                    </a>
                </li>
            @endforeach
            </ul>
        </div>
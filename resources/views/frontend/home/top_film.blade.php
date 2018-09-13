@foreach($equals as $topbo)
    <li><a href="{{url('xem-phim/'.$topbo->slug)}}">
            <div class="image"
                    style="background-image:url({{asset('assets/frontend/images/'.get_thumbnail($topbo->img_background))}})"></div>
            <span class="imdb">IMDb <br> <b>{{$topbo->IMDb}}</b></span>
            <div class="info"><b class="title-film">{{$topbo->title_vi}}</b>
                <p>{{$topbo->title_en}}</p></div>
        </a>
    </li>
@endforeach
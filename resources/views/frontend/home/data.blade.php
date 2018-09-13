
    @foreach($equals as $equal)
  
    <a href="{{url('xem-phim'.$equal->id)}}" class="film-small @if($loop->index%5==0)
                 no-margin
                  @endif">
        <div class="poster-film-small" style="background-image:url({{asset('assets/frontend/images/'.get_thumbnail($equal->img_thumbnail))}})">
        <div class="sotap"  style="display:@if($equal->film_type!=1)
                 none
                  @endif">{{$equal->total_episodes}}</div>
                        <ul class="tag-film">
                <li><div class="{{strtolower($equal->quality)}}">{{$equal->quality}}</div></li>
                                            </ul>
            <div class="play"></div>
        </div>
        <div class="title-film-small">
                    <b class="title-film">{{$equal->title_vi}}</b>
            <p>{{$equal->title_en}}  ({{$equal->published_year}})</p>
                </div>
    </a>
    @endforeach
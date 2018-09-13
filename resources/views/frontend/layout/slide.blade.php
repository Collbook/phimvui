<div class="slider top-slider">
            @foreach($slides as $slide)
            <div class="item" style="float:left"><a href="{{url('xem-phim/'.$slide->slug)}}"
                                                    style="background-image:url({{asset('assets/frontend/images/'.get_thumbnail($slide->	img_background))}})"></a>
            </div>
            @endforeach
</div>
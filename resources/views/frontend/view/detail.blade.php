
@extends('frontend.layout.layout')
    <link rel="stylesheet" href="{{asset('assets/frontend/css/detailfilm.css')}}">
 @section('insert_left')
        <div class="group-detail" itemscope itemtype="http://schema.org/Movie">
            <div style="display: none">
                <div itemprop="aggregateRating" itemscope itemtype="http://schema.org/AggregateRating"><span
                            itemprop="ratingValue">3.8</span>
                    <meta itemprop="bestRating" content="5"/>
                    <meta itemprop="worstRating" content="1"/>
                    </div>
            </div>
            <a @foreach ($films->link_films as $link)
                        href="{{url('phim/'.$films->slug.'/'.$link->description)}}" 
                        @endforeach 
                         class="big-img-film-detail"
               style="background: url('{{asset('assets/frontend/images/'.get_thumbnail ($films->img_background)) }}'); background-size: cover;">
                <div><i class="fa fa-play-circle" aria-hidden="true"></i></div>
            </a>
            <p style="display:none" id ="film-id">{{ $films->id }}</p>
            <h1 class="title-film-detail-1" itemprop="name">{{ $films->title_vi }} </h1>
            <h2 class="title-film-detail-2">{{ $films->title_en }}</h2>
            <div class="fb-gg">
                <div class="fb-like" data-href="#" data-layout="button_count"
                     data-action="like" data-size="small" data-show-faces="false" data-share="true"></div>
                <div class="g-plusone" data-size="medium"></div>
            </div>
            <div class="imdb">IMDb {{ $films->IMDb }}</div>
             <span class="hd">{{ $films->quality }}</span> <br> 
              <a @foreach ($films->link_films as $link) 
                        href="{{url('phim/'.$films->slug.'/'.$link->description)}}" 
                        @endforeach
                        class="play-film">Xem Phim<i
                        class="fa fa-caret-right" aria-hidden="true"></i></a> <!---->
            <p class="custom-error" style="display:none;"></p>
            <ul class="infomation-film">
                <li class="title">Thông tin:</li>
                <li>Ngày phát hành : <span>{{ $films->date_theater }}</span></li>
                <li>Thời lượng: <span>{{ $films->time }}</span></li>
                <li>Kịch bản: <span>Zak Penn, Ernest Cline</span></li>
                @foreach ($films->directors as $director)
                     <li>Đạo diễn: <span>{{ $director->fullname }}</span></li>
                @endforeach
                <li>Diễn viên:
               @foreach ($films->actors as $actor)
                   <a href="{{ url('dien-vien/'.$actor->slug) }}">{{ $actor->fullname}}</a> ,
               @endforeach
                </li>
                <li>Thể loại: 
                    @foreach ($films->categories as $category)
                        <a href="{{url('the-loai/'.$category->slug)}}">{{ $category->name }}</a>,
                    @endforeach
                </li>
                <li>Quốc gia: 
                    @foreach ($films->countries as $country)
                    <a href="{{ url('quoc-gia/'.$country->slug) }}">{{ $country->name }}</a>,
                    @endforeach

                </li>
                <li class="tags">
                    <span>TAGS: </span> 
                    @foreach ($films->tags as $tag)
                    <a href="{{ url('tag/'.$tag->slug) }}" class="">{{ $tag->name }}</a> , 
                    @endforeach

                </li>
            </ul>
            <p class="content-film">{{ $films->description }}</p></div>

        <hr>
      
        <center><h3 style="color: white">Đánh Giá Phim</h3></center>

        <div class="well">
            <h4>Viết bình luận ...<span class="fa fa-pencil" style="color:black"></span></h4>
            <form method="get" role="form" action="#">
                <div class="form-group">
                    <textarea class="form-control" rows="3" id="noidung" name="noidung"></textarea>
                </div>
                <div id="group-button">
                <button type="submit" id="gui" class="button-comment">Bình luận</button>
                
                </div>
            </form>
        </div>
        <div class="comment" style="height:auto;width: 850px;background: #0b0b0b;border-radius: 5px">
            <!--div class="form-group"-->
                <div id="insertcomment">
                    @foreach($comments as $comment)                      
                        @if($loop->index<8)          
                        <div id="comment-item">                     
                            @if($comment->feedback == "0")
                            <div id="id-comment" >{{$comment->id}}</div>
                            <img id="image-user-comment" src="{{asset('storage/customers/'.$comment->customers->id . '/' . $comment->customers->avatar)}}" alt="{{$comment->customers->fullname}}"/>
                            <div id="comment-rigth">
                                <h8 id="fullname-comment">{{$comment->customers->fullname}}</h8>
                                    <p id="showcomment" >{{$comment->content}}</p>
                                    <p>
                                        <a href="#"style="color: #77c282" id="reply-user">Phản hồi </a>
                                        &#183; <h8 id="date-comment"> {{$comment->updated_at}} </h8>&#183;
                                    </p>
                            </div>
                            <div class="reply-comment">                                
                                @foreach($comments as $reply)  
                                @if($reply->feedback==$comment->id)                    
                                    <div id="reply-comment-rigth">
                                        <img id="image-reply-comment"  src="{{asset('storage/customers/'.$reply->customers->id . '/' . $reply->customers->avatar)}}" alt="{{$reply->customers->fullname}}"/>
                                         <h8 id="fullname-reply-comment">{{$reply->customers->fullname}}</h8>
                                        <p id="reply-showcomment" >{{$reply->content}}</p>
                                        <p>
                                            <a href=""style="color: #77c282" id="like">Thích</a>
                                            &#183;<h8 id="date-reply-comment"> {{$reply->updated_at}} </h8>&#183;
                                        </p>
                                    </div>
                                @endif
                                @endforeach  
                                <div class="well" id="well-reply">
                                    <h4>Viết Phản hồi ...<span class="fa fa-pencil" style="color:black"></span></h4>
                                    <form method="get" role="form" action="#">
                                        <div class="form-group">
                                            <textarea class="form-control" rows="3" id="noidung-phanhoi" name="noidungphanhoi"></textarea>
                                        </div>
                                        <div id="group-button">
                                        <button type="submit" id="gui-phanhoi" class="button-comment">Phản hồi</button>
                                        <button type="submit" id="huy-phanhoi" class="button-comment">Hủy</button>
                                        
                                        </div>
                                    </form>
                                </div>                 
                            </div>
                        @endif
                    </div>
                    @endif
                    @endforeach
                </div>
            <!--/div-->
        </div>
        @if(sizeof($comments)>=8)
        <div>
        <button type="submit" class ="load-more"> Tải thêm các bình luận khác ...</button>
        </div>
        @endif
        <hr/>
        <div class="group-film">
            <h2>phim liên quan<i class="fa fa-caret-right" aria-hidden="true"></i>
            </h2> 
            <span class="line-ngang">
            </span>                   
                <div class="group-film-small" data-items="1">
                @foreach ($filmslienquan as $tt)
                    <a href="{{url('xem-phim/'.$tt->slug)}}"class="film-small  @if($loop->index%5==0)
                    no-margin
                    @endif">
                    <div class="poster-film-small"
                         style="background-image:url({{asset('assets/frontend/images/'.get_thumbnail ($tt->img_thumbnail) )}})">
                        <div class="sotap">23/45</div>
                        <ul class="tag-film">
                            <li>
                                <div class="hd">{{ $tt->quality }}</div>
                            </li>
                        </ul>
                        <div class="play"></div>
                    </div>
                    <div class="title-film-small"><b class="title-film">{{ $tt->title_vi }} </b>
                        <p>{{ $tt->title_en }}</p></div>
                </a> 
                 @endforeach
               </div>
                   
            
        </div>
        <div class="group-tag-detail">
            <h3>
                <small>
                </small>
            </h3>
        </div>
        <div class="modal fade" id="mediaModal" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-body modal-padding"> <!-- content dynamically inserted --> </div>
                </div>
            </div>
        </div>
    

    @stop
     @section('insert_right')
        <!-- kiem tra la phim le hay phim bo de hien thi top phim -->
        @if($films->film_type=="1")
            @include('frontend.topphimvui.topphimbo')
        @elseif($films->film_type=="0")
            @include('frontend.topphimvui.topphimle')
        @endif
        @include('frontend.layout.right')
@stop
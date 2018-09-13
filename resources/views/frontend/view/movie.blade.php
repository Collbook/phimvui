<!---->
@extends('frontend.layout.layout')
        @section('insert_left')
    <!--div class="khoi-trai" itemscope itemtype="http://schema.org/Movie"-->
        <div style="display: none">
            <div itemprop="aggregateRating" itemscope itemtype="http://schema.org/AggregateRating"><span
                    itemprop="ratingValue">4.4</span>
                <meta itemprop="bestRating" content="5"/>
                <meta itemprop="worstRating" content="1"/>
                <span itemprop="ratingCount">14</span></div>
            <img itemprop="image" src="images/movies/19996/poster_01_kfo26506.jpg"
                 alt="Vườn Sao Băng Ngoại Truyện (Boys Over Flowers Season 2)"/> 
                 <img itemprop="thumbnailUrl" src="images/movies/19996/bg_01_etm60446.jpg"  alt="Vườn Sao Băng Ngoại Truyện (Boys Over Flowers Season 2)"/>
            <meta itemprop="dateCreated" content="17/04/2018"/>
            <meta itemprop="director" content="Yasuharu Ishii"/>
            <meta itemprop="name" content="Vườn Sao Băng Ngoại Truyện (Boys Over Flowers Season 2)"/>
        </div>
        <div class="path-folder-film">
            <ul>
                <li><a href="{{url('/')}}"><span class="fa fa-home"></span> Trang chủ</a><i
                        class="fa fa-angle-right" aria-hidden="true"></i></li>
                    @if ( $films->film_type  == 0)
                     <li><a href="{{ url('/phim-le') }}">Phim Lẻ</a><i class="fa fa-angle-right" aria-hidden="true"></i></li>
                    @else 
                     <li><a href="{{ url('/phim-bo') }}">Phim Bộ</a><i class="fa fa-angle-right" aria-hidden="true"></i></li>
                    @endif
               
                
                @foreach ($films->link_films as $link)
                    <li><a href="{{url('phim/'.$films->slug.'/'.$link->description)}}">@endforeach
                        {{ $films->title_vi }}({{ $films->title_en }})
                
                </a><i class="fa fa-angle-right" aria-hidden="true"></i></li>
                 @if ( $films->film_type  == 0)
                    <li><a href="javascript:;"></a></i></li>
                    @else 
                    <li><a href="javascript:;">{{ $filmstab->description }}</a></i></li>
                    @endif
                
            </ul>
        </div>
        <div id="player-wrapper">
            <!--<div id="sd-alert" class="alert alert-warning" role="alert" style="margin: 0;display: none">Bản HD của video này đang được xử lý, bạn có thể xem SD trong khi chờ HD (Khoảng 10p-30p).</div>-->
            <div id="player-holder" class="player-film" style="position:relative">
                <div id="google_embed_block"
                     style="display:none;position:absolute;right:0;top:0;width:100px;height:100px;"></div>

               {{--  @foreach ($filmstab as $linkfilm ) --}}
                     <iframe src="{{ $filmstab->link }}" frameborder="0" scrolling="no" allowfullscreen style="overflow:hidden;height:100%;width:100%" height="100%" width="100%"></iframe>
                 {{-- @endforeach  --}}
            </div>
        </div>
        <div class="buttonlight-film">
            <ul>
                <li>
                    <div class="fb-gg">
                        <div class="fb-like" data-href="http://vung.tv/xemphim/19996" data-layout="button_count"
                             data-action="like" data-size="small" data-show-faces="false" data-share="true"></div>
                        <div class="g-plusone" data-size="medium"></div>
                    </div>
                </li>
                <!--<li> <a id="but_follow" href="javascript:follow_phim(1, this);" class="thongbao"><i class="fa fa-bell" aria-hidden="true"></i>Nhận Thông Báo</a> </li>-->
                <!---->
                <!--<li><a href="http://vung.tv/user/recharge"><i class="fa fa-ban" aria-hidden="true"></i>Tắt quảng cáo</a></li>-->
                <!---->
                <li><a data-toggle="modal" data-target="#ModalBaoloi"><i class="fa fa-exclamation-circle"  aria-hidden="true"></i>Báo lỗi</a></li>
                <!--<li><a ><i class="fa fa-heart-o" aria-hidden="true"></i>Yêu thích</a></li>-->
                <li><a class="light-on show1">Tắt đèn<i class="fa fa-lightbulb-o" aria-hidden="true"></i></a> <a
                        class="light-off">Bật đèn<i class="fa fa-lightbulb-o" aria-hidden="true"></i></a></li>
                <li class="scene-dim"></li>
            </ul>
        </div>
        <p class="custom-error" style="display:none;"></p>
        <div class="episode-film">
            <div class="episode-main">
                <ul>
                    
                     <?php  $i=1  ?>
                @foreach ($films->link_films as $link)
                    <li><a href="{{url('phim/'.$films->slug.'/'.$link->description)}}"  class="actived">{{ $i }}</a>
                    </li>
                     <?php  $i++;  ?>
                @endforeach
               
                </ul>

            
            </div>
        </div>
        <div class="title-film-film-0"><a
                href="#/xemphim/vuon-sao-bang-ngoai-truyen-boys-over-flowers-season-2-19996" class=""><h1
                class="title-film-film-1">{{ $films->title_vi }}</h1> <br>
            <h2 class="title-film-film-2">{{ $films->title_en }}</h2></a>
            
        </div>
        <div class="khoi-fbchat">
            <div class="fbchat">
                <div class="fb-comments" data-width="100%" data-include-parent="false"
                     data-href="#/xemphim/19996" data-numposts="10" data-order-by="reverse_time"
                     data-colorscheme="dark"></div>
            </div>
            
        </div>
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
                    @foreach ($films->tags as $tag)
                    {{ $tag->name }}
                    @endforeach
                </small>
            </h3>
        </div>
    </div>
    <div id="ModalBaoloi" class="modal fade" role="dialog">
        <div class="modal-dialog"> <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Thông báo</h4></div>
                <div class="modal-body" id="p_content"><p class="alert-danger" id="show_msg"></p>
                    <div class="form-group"><label for="log_des">Báo lỗi phim "Vườn Sao Băng Ngoại Truyện (Boys Over
                        Flowers Season 2) (2018)"</label> <textarea name="log_des" id="log_des" class="form-control"  style="width:100%; height: 50px;"  placeholder="Mô tả lỗi phim Vườn Sao Băng Ngoại Truyện (Boys Over Flowers Season 2) (2018)"></textarea>
                    </div>
                    <div class="form-group"><label for="log_captcha">Mã xác nhận</label> <input type="text" <img src="http://vung.tv/ajax/captcha/80/20"/></div>
                    <a href="javascript:;" class="btn btn-primary" name="but_send_report" id="but_send_report">Gửi</a>
                    <input type="hidden" name="hid_token" value=""/> <input type="hidden" name="hid_mov_id" id="hid_mov_id" value="19996"/> <input type="hidden" name="hid_eps_id" id="hid_eps_id" value="57774"/></div>
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
 <!-- Tin tưc dien anh -->
 <div class="top-tintuc"><h3><a href="http://2tin.net/" target="_blank">Tin tức</a></h3>
            <ul id="blog1" class="film active">
            @for($i = 0; $i < 10; $i++)
                <li>
                    <a href="http://2tin.net/chuyen-that-nhu-dua-my-nam-nhu-kim-woo-bin-cung-khong-dam-eye-contact-voi-suzy-viqua-dep-9354.html"
                       target="_blank">
                        <div class="image" style="background-image:url({{asset('assets/frontend/images/')}})"></div>
                        <div class="info"><b class="title-phim"
                                             alt="Chuy&#7879;n th&#7853;t nh&#432; &#273;&ugrave;a, m&#7929; nam nh&#432; Kim Woo Bin c&#361;ng kh&ocirc;ng d&aacute;m Eye-contact v&#7899;i Suzy v&igrave;...qu&aacute; &#273;&#7865;p">Chuyện
                                thật như đùa, mỹ nam như Kim Woo Bin cũng không dám Eye-contact với Suzy vì...quá
                                đẹp</b></div>
                    </a></li>
                <li>
            @endfor
            </ul>
        </div> 
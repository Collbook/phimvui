$(document).ready(function() {
    $("#gui").click(function (event) {       
        event.preventDefault(); 
        var local= $("#gui").index( this );         
        var noidung = $("textarea#noidung").val();
        var films_id=$("#film-id").text();
        var user =$("p.id-customer").text();
        var feedback ="0";
        if(noidung!=""){ 
            $.ajax(
                {
                    url:  'ajax/comment',
                    type: "get",
                    data: { comment : noidung, films : films_id, user: user,feedback: feedback},
                
                })
                .done(function(data)
                {
                    if(data==""){ 
                        window.location.href ="http://localhost/phimvuidotnet/public/dang-nhap.html";       
                        return;
                    };
                    var date= new Date();
                    date= date.toLocaleDateString()+" "+date.toLocaleTimeString();
                    fullname=$("a#fullname-customer").text();
                    src="../assets/frontend/images/customer/"+$("p.id-customer").attr("value");
                  
                    $("textarea#noidung").val("");
                    $("#comment-item:last").clone().appendTo($("#insertcomment"));
                    $("#showcomment").eq(local).text(noidung);  
                    $("h8#date-comment").eq(local).text(date);  
                    $("h8#fullname-comment").eq(local).text(fullname);
                    $("img#image-user-comment").eq(local).attr('src',src);
                    
                });

        }
    });
    $("a#reply-user").click(function(event){
        event.preventDefault();
        index= $("a#reply-user").index( this );      
        $("#well-reply.well").eq(index).css('display', 'block');
       // $("div.well:first()").clone().appendTo($(".reply-comment").eq(index));
    });
    $("button#huy-phanhoi").click(function(event){
        event.preventDefault();
        index= $("button#huy-phanhoi").index( this ); 
        $("#well-reply.well").eq(index).css('display', 'none');    
    });
    $("button#gui-phanhoi").click(function(event){
        event.preventDefault();
        index= $("button#gui-phanhoi").index( this );
        //$("#well-reply.well").eq(index).css('display', 'none');        
        var noidung = $("textarea#noidung-phanhoi").eq(index).val();
        var films_id=$("#film-id").text();
        var user =$("p.id-customer").text();
        var feedback =$("div#id-comment").eq(index).text();     
        if(noidung!=""){ 
            $.ajax(
                {
                    url:  'ajax/comment',
                    type: "get",
                    data: { comment : noidung, films : films_id, user: user,feedback: feedback},
                
                })
                .done(function(data)
                {
                    //alert("thanh cong");
                    if(data==""){ 
                        window.location.href ="http://localhost/phimvuidotnet/public/dang-nhap.html";       
                        return;
                    };
                    var date= new Date();
                    date= date.toLocaleDateString()+" "+date.toLocaleTimeString();
                    fullname=$("a#fullname-customer").text();
                    src="../assets/frontend/images/customer/"+$("p.id-customer").attr("value");                  
                    $("textarea#noidung-phanhoi").val("");
                    // an form phan hoi
                    $("#well-reply.well").eq(index).css('display', 'none');
                    //chen du lieu phai hoi vao
                    $("div#reply-comment-rigth:last").clone().appendTo($("div.reply-comment").eq(index));
                    //hien thi noi dung phan hoi ra
                    $("#reply-showcomment").eq(index).text(noidung);  
                    $("h8#date-reply-comment").eq(index).text(date);  
                    $("h8#fullname-reply-comment").eq(index).text(fullname);
                    $("img#image-reply-comment").eq(index).attr('src',src);
                    
                });

        }
    })


    var index=0;
    $("button.load-more").click(function(event){
        event.preventDefault();
        index+=8;
        var film_id=$("#film-id").text();
            $.ajax(
                {
                    url:  'ajax/loadmorecomment',
                    type: "get",
                    data: {index:index, film_id:film_id},
                
                })
                .done(function(data)
                {
                    //alert("thanh cong");
                    if(data==""){ 
                       // window.location.href ="http://localhost/phimvuidotnet/public/dang-nhap.html";       
                        $("button.load-more").css('display', 'none');
                        return;
                    };
                    $.each(data , function(i, val) { 
                        var noidung = val.content;
                        var im="../assets/frontend/images/customer/"+val.customers.avatar;
                        
                        $("#comment-item:last").clone().appendTo($("#insertcomment"));
                        $("#showcomment:last").text(noidung);  
                        $("#fullname-comment").text(val.fullname);
                        $("#image-user-comment").attr('src',im);
                    });
                            
                    
                });
    }

    )
});
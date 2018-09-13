var chieurap=0;
var phimle=0;
var phimbo =0;
 var anime=0;
 var tvshow=0;
 var sapchieu=0;
function phim_chieu_rap(slug, page, sort) {
    var url = 'ajax/phim_chieu_rap';
    if(page==2){
        chieurap +=6;
    }
    else if(page==0){
        chieurap -=6;
    };    
    var data = {slug: slug, page: page, sort: sort, change:chieurap};
    box='div#group-film-chieu-rap';
    add_load(url,data,box);    
}
function add_load(url,data,box){
    $.ajax(
        {
            url: url,
            type: "get",
            data: data,
            
        })
        .done(function(data)
        {
            if(data == ""){
                return;
            }               
            $(box).html('');
            $(box).append(data);
            //(data).insertBefore($("#post-data"));
        })
	        
}

function phim_bo(slug, page, sort) {
    var url = 'ajax/phim_bo';
    if(page==2)
    {
        phimbo+=12;
    }
    else if(page==0)
    {
        phimbo-=12;
    }

    var data = {slug: slug, page: page, sort: sort, change:phimbo};
    box='div#group-film-bo';
    add_load(url,data,box);
}
function phim_le(slug, page, sort) {
    var url = 'ajax/phim_le';
    if(page==2){
        phimle +=12;
    }
    else if(page==0)
    {
        phimle -=12;
    }        
    var data = {slug: slug, page: page, sort: sort, change:phimle};
    box='div#group-film-le';
    add_load(url,data,box);
}

function phim_tv_show(slug, page, sort) {
    var url = 'ajax/tvshow';
    if(page==2){
        tvshow +=6;
    }
    else if(page==0)
    {
        tvshow -=6;
    } 
    var data = {slug: slug, page: page, sort: sort, change:tvshow};
    box='div#group-film-tv-show';
    add_load(url,data,box);
}

function phim_anime(slug, page, sort) {
    var url = 'ajax/phim_anime';
    if(page==2){
        anime +=12;
    }
    else if(page==0)
    {
        anime -=12;
    } 
    var data = {slug: slug, page: page, sort: sort, change:anime};
    box='div#group-film-anime';
    add_load(url,data,box);
}

function phim_sap_chieu(slug, page, sort) {
    var url = 'ajax/phim_sap_chieu';
    if(page==2){
        sapchieu +=6;
    }
    else if(page==0)
    {
        sapchieu -=6;
    } 
    var data = {slug: slug, page: page, sort: sort, change:sapchieu};
    box='div#group-film-sap-chieu';
    add_load(url,data,box);
}
   // add_loading();

   // xem danh sach top phim bo
   
function top_view_country_by_type(country, type, option) {
    $.ajax(
        {
            url:  'ajax/top_view_country_by_type',
            type: "get",
            data: {country: country, type: type, option:option},
           
        })
        .done(function(data)
        {
            if(data != ""){             
            //alert(data);
            $("ul#blog1:last").html("");
            $("ul#blog1:last").append(data);
            }
           
            
        });
}

  

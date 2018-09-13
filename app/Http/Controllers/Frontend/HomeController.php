<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Film;
use App\Models\Category;
use App\Models\Country;
use App\Commons\Cache\Home;

class HomeController extends Controller
{
    //ham tim kiem phim khi go vao tim kiem o header
    public function search(Request $request) 
    {
        if($request->input('key')!="")
        { 
            // lay gia tri nhap vao tim kiem trong table films  
            return  Film::where('title_vi','like', "%".$request->input('key')."%")->get();  
        } 
        else
        {
            return "";
        }
    }
    //hien thi trang chu 
    public function home()
    {
        //lay ngay gio hien tai
        $this->data['slides']=Film::select('img_background','title_vi','slug')->where('active_slide','1')->orderBy('created_at','desc')->take(get_value_slide())->get();
        // phim de cu la phim moi dang tai
        $this->data['phimdecu']= Film::select('title_vi','img_thumbnail','title_en','quality','slug','published_year','film_type','total_episodes')->orderBy('created_at','desc')->take(24)->get();
        //phim chieu rap neu truong film_cinema bang 1
        $this->data['phimchieurap']= Film::select('title_vi','img_thumbnail','title_en','quality','slug','published_year')->where('film_cinema','1')->orderBy('created_at','desc')->skip(0)->take(6)->get();
       // $this->data['phimhoathinh']= Film::all();
       //la phim bo neu truong film_type=1
       $this->data['phimbo']= Film::select('title_vi','img_thumbnail','title_en','quality','slug','published_year','film_type','total_episodes')->where('film_type','1')->orderBy('created_at','desc')->take(12)->get();
        //la phim bo neu truong film_type=0
        $this->data['phimle']= Film::select('title_vi','img_thumbnail','title_en','quality','slug','published_year')->where('film_type','0')->orderBy('created_at','desc')->take(12)->get();
       //phim anime neu the loai la anime

        $category_anime=Category::select('id')->where('name','Anime')->get()->first()->id;
        $this->data['animes']= Category::find($category_anime)->films()->take(12)->get();
        // tv show là 1 thể loại
        $category_tvShow=Category::select('id')->where('name','TV Show')->get()->first()->id;
        $this->data['tvshows']=  Category::find($category_tvShow)->films()->take(6)->get();
        // phim sap chieu là phim có ngày created_at lớn hơn ngày hiện tại
        $this->data['phimsapchieu']=  Film::select('title_vi','img_thumbnail','title_en','quality','slug','published_year')->where('theater_status','1')->take(6)->get();
        //top phim dua vao luot view nhieu nhat theo thoi gian
        $this->data['topphim']=  Film::where('film_type','0')->orderBy('view_count','desc')->orderBy('created_at','desc')->take(5)->get();
        //top phim bộ hien thi top cua nuoc My
        $country_id=Country::select('id')->where('slug','my')->first()->id;
       $this->data['topphimbo'] =Country::find($country_id)->films()->where('film_hot','1')->where('film_type','1')->orderBy('created_at','desc')->get();
              
        return view('frontend.home.home',$this->data);
    }
    // tra ve ket qua ajax phim chieu rap
    public function phimchieurap(Request $request)
    {
        //sap xep cac phan tu 
        if(($sort=$request->input('sort'))!=""){
            $this->data['equals']=  Film::where('film_cinema','1')->orderBy($sort,'desc')->take(6)->get();
        }
        else{
            // nhan left de xem phim truoc trong danh sach phim de cu
            if(($request->input('page'))=="0"){              
                $this->data['equals']=  Film::where('film_cinema','1')->orderBy('created_at','desc')->skip($request->input('change'))->take(6)->get();
            }
            // nhan right de xem phim tiep trong danh sach phim de cu
            else if (($request->input('page'))=="2")
            {
                $this->data['equals']=  Film::where('film_cinema','1')->orderBy('created_at','desc')->skip($request->input('change'))->take(6)->get();  
            }  
            //phan loai theo ngay cap nhat
            else if (($request->input('page'))=="1")
            {
                $this->data['equals']=  Film::where('film_cinema','1')->orderBy('created_at','desc')->take(6)->get();  
            }    
        }
        //hien thi phim chieu rap sau khi ajax
        if($this->data['equals']->count()>0){
        $html = view('frontend.home.data',$this->data);        
        return $html;
        }
    }
    //ajax khi nhan o tab phim le
    public function phimle(Request $request)
    {
        if(($sort=$request->input('sort'))!=""){
            $this->data['equals']=  Film::where('film_type','0')->orderBy($sort,'desc')->take(12)->get();
        }
        else{
            if(($request->input('page'))=="0"){
                $this->data['equals']=  Film::where('film_type','0')->orderBy('created_at','desc')->skip($request->input('change'))->take(12)->get();
            }
            else if (($request->input('page'))=="2")
            {
                $this->data['equals']=  Film::where('film_type','0')->orderBy('created_at','desc')->skip($request->input('change'))->take(12)->get();  
            }
        }
        //tra ve ket qua link_films
        if($this->data['equals']->count()>0){
            $html = view('frontend.home.data',$this->data);        
            return $html;
        }
    }
     //ajax khi nhan o tab phim bo
     public function phimbo(Request $request)
     {
         if(($sort=$request->input('sort'))!=""){
             $this->data['equals']=  Film::where('film_type','1')->orderBy($sort,'desc')->take(12)->get();
         }
         //khi click right/left
         else{
             if(($request->input('page'))=="0"){
                 $this->data['equals']=  Film::where('film_type','1')->orderBy('created_at','desc')->skip($request->input('change'))->take(12)->get();
             }
             else if (($request->input('page'))=="2")
             {
                 $this->data['equals']=  Film::where('film_type','1')->orderBy('created_at','desc')->skip($request->input('change'))->take(12)->get();  
             }                         
         }
         //ket qua ajax phim bộ
         if($this->data['equals']->count()>0){
            $html = view('frontend.home.data',$this->data);         
            return $html;
         }
     }
      //ajax khi nhan o tab phim anime
      public function phimanime(Request $request)
      {
          // lay id trong bang category cua phimm anime
        $category_anime=Category::select('id')->where('name','Anime')->get()->first()->id;
          if(($sort=$request->input('sort'))!=""){
              $this->data['equals']=  Category::find($category_anime)->films()->orderBy($sort,'desc')->take(12)->get();
          }
          else{
              // nhan right hoac left
              if(($request->input('page'))=="0"){
                  $this->data['equals']=  Category::find($category_anime)->films()->orderBy('created_at','desc')->skip($request->input('change'))->take(12)->get();
              }
              else if (($request->input('page'))=="2")
              {
                  $this->data['equals']=  Category::find($category_anime)->films()->orderBy('created_at','desc')->skip($request->input('change'))->take(12)->get();  
              }
          }
          //phim anime ajax tra ve
          if($this->data['equals']->count()>0){
          $html = view('frontend.home.data',$this->data);          
          return $html;
          }
      }
       //ajax khi nhan o tab tv Show
     public function tvShow(Request $request)
     {
        $category_tvShow=Category::select('id','id')->where('name','TV Show')->get()->first()->id;
        if(($request->input('page'))=="0"){
            $this->data['equals']= Category::find($category_tvShow)->films()->skip($request->input('change'))->take(6)->get();
        }
        else if (($request->input('page'))=="2")
        {
            $this->data['equals']=  Category::find($category_tvShow)->films()->skip($request->input('change'))->take(6)->get(); 
        }    
         //tvshow ajax tra ve
         if($this->data['equals']->count()>0){
            $html = view('frontend.home.data',$this->data);         
            return $html;
         }
     }
      //ajax khi nhan o tab phim sap chieu
      public function phimsapchieu(Request $request)
      {
            if(($request->input('page'))=="0"){
                $this->data['equals']=  Film::where('theater_status','1')->orderBy('created_at','desc')->skip($request->input('change'))->take(6)->get();
            }
            else if (($request->input('page'))=="2")
            {
                $this->data['equals']=  Film::where('theater_status','1')->orderBy('created_at','desc')->skip($request->input('change'))->take(6)->get();  
            }        
          //phim sap chieu ajax tra ve
          if($this->data['equals']->count()>0){
            $html = view('frontend.home.data',$this->data);          
            return $html;
          }
      }
      //tim kiem danh sach phim bo theo quoc gia
      public function top_view_country_by_type(Request $request)
      {
          // lay id quoc gia
        $country_id=Country::select('id')->where('slug',$request->input('country'))->first()->id;
        // lay noi dung cua phim
        $this->data['equals'] =Country::find($country_id)->films()->where('film_hot','1')->where('film_type','1')->orderBy('created_at','desc')->get();
       $html = view('frontend.home.top_film',$this->data);    
       //tre ve file html            
        return $html;
      }
}

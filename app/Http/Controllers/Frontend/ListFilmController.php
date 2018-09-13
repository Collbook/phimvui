<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Actor;
use App\Models\Country;
use App\Models\Film;
use App\Models\Tag;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Support\Facades\Input;
use Carbon\Carbon;


class ListFilmController extends Controller
{
    public function view()
    {
        $this->data['title']='Đề Cử';
        $this->data['films'] = Film::all();
        $this->data['films'] = Film::paginate(18);
        return view('frontend.list_film.list', $this->data);
    }
    //function phan loai theo the loai
    public function theloai($the_loai)
    {
        $this->data['title']=Category::select('name')->where('slug',$the_loai)->get()->first()->name;
        $category_film= Category::select('id')->where('slug',$the_loai)->get()->first();
        $film= Category::find($category_film->id);
        $this->data['films']= $film->films()->paginate(12);
        return view('frontend.list_film.list',$this->data);
    }
    //function phan loai theo quoc gia
    public function quocgia($quoc_gia)
    {
        $this->data['title']=Country::select('name')->where('slug',$quoc_gia)->get()->first()->name;
        $country_film= Country::select('id')->where('slug',$quoc_gia)->get()->first();
        $film= Country::find($country_film->id);
        $this->data['films']= $film->films()->paginate(12);
        return view('frontend.list_film.list', $this->data);
    }
    //function phan loai theo tag
    public function tag($tag)
    {
        $this->data['title']=Tag::select('name')->where('slug',$tag)->get()->first()->name;
        $tag_film= Tag::select('id')->where('slug',$tag)->get()->first();
        $film= Tag::find($tag_film->id);
        $this->data['films']= $film->films()->paginate(12);
        return view('frontend.list_film.list', $this->data);
    }
    //function phan loai theo dien vien
    public function dienvien($dien_vien)
    {
        $this->data['title']='Của '.Actor::select('fullname')->where('slug',$dien_vien)->get()->first()->fullname;
        $actor_film= Actor::select('id')->where('slug',$dien_vien)->get()->first();
        $film= Actor::find($actor_film->id);
        $this->data['films']= $film->films()->paginate(12);
        return view('frontend.list_film.list', $this->data);
    }
    //function phan loai theo phim bo
    public function viewphimbo()
    {
        $this->data['title']='Bộ';
        $this->data['films']= Film::where('film_type','1')->paginate(12);
        return view('frontend.list_film.list', $this->data);
    }
    public function phimbo($quoc_gia)
    {
        $this->data['title']='Bộ '.Country::select('name')->where('slug',$quoc_gia)->get()->first()->name;
        $country_film= Country::select('id')->where('slug',$quoc_gia)->get()->first();
        $film= Country::find($country_film->id);
        $this->data['films']= $film->films()->where('film_type','1')->paginate(12);
        return view('frontend.list_film.list', $this->data);
    }
    //function phan loai theo phim le
    public function viewphimle()
    {
        $this->data['title']='Lẻ';
        $this->data['films']= Film::where('film_type','0')->paginate(12);
        return view('frontend.list_film.list', $this->data);
    }
    public function phimle($nam)
    {
        $this->data['title']='Lẻ '.Film::select('published_year')->where('published_year',$nam)->get()->first()->published_year;
        $this->data['films']= Film::where('published_year',$nam)->where('film_type','0')->paginate(12);
        return view('frontend.list_film.list', $this->data);
    }
    //function phan loai theo phim chieu rap
    public function phimchieurap()
    {
        $this->data['title']='Chiếu Rạp';
        $this->data['films']= Film::where('film_cinema','1')->paginate(12);
        return view('frontend.list_film.list', $this->data);
    }
    public function phimsapchieu()
    {
        // $time_now = Carbon::now()->format('Y/m/d');
        // // dd($time_now);
        $this->data['title']='Sắp Chiếu';
        $this->data['films']= Film::where('theater_status','1')->paginate(12);
        return view('frontend.list_film.list', $this->data);
    }
    //function loc phim
    public  function locphim(Request $request)
    {
        $country=$request->input('quoc-gia');
        $category=$request->input('danh-muc');
        $genre=$request->input('the-loai');
        $year=$request->input('nam');
        $this->data['title']='';
       if(!$category&&!$country&&!$genre&&!$year ) {
           $this->data['films'] = Film::all();
           $this->data['films'] = Film::paginate(18);
          // return redirect('/danh-sach');
       }
       else{
           if ($category != "") {
               $this->data['films'] = Film::where('film_type', $category)->paginate(8);
           }
           if ($year != "") {
               $film = Film::where('published_year', $year);
               if ($category != "") {
                   $film->where('film_type', $category);
               }
               $this->data['films'] = $film->paginate(8);
           }
           if ($genre != "") {
               $film = Category::find($genre)->films();
               if ($year != "") {
                   $film->where('published_year', $year);
               }
               if ($category != "") {
                   $film->where('film_type', $category);
               }
               $this->data['films'] = $film->paginate(8);
           }
           if ($country != "") {
               $film = Country::find($country)->films();
               if ($year != "") {
                   $film->where('published_year', $year);
               }
               if ($category != "") {
                   $film->where('film_type', $category);
               }
               $this->data['films'] = $film->paginate(8);
           }

       }

        return view('frontend.list_film.list', $this->data);


    }
}

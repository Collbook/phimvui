<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Models\Film;
use App\Models\LinkFilm;
use App\Models\Comment;
use App\Models\Country;
use Event;
use App\Events\CountViewEvent;


class FilmController extends Controller
{
    //
    function getfilms($slug)
    {

        $film= Film::select('id')->where('slug',$slug)->get()->first();
        $films = Film::find($film->id);

        // Kich hoat su kien tang luot xem
        // event(new CountViewEvent($films));
        
        //top phim dua vao luot view nhieu nhat theo thoi gian
        $this->data['topphim']=  Film::where('film_type','0')->orderBy('view_count','desc')->orderBy('created_at','desc')->take(5)->get();
        //top phim bộ
        $country_id=Country::select('id')->where('slug','my')->first()->id;
        $this->data['topphimbo'] =Country::find($country_id)->films()->where('film_hot','1')->where('film_type','1')->orderBy('created_at','desc')->get();
        //hien thi binh luan
        $comment=$this->data['comments']= Comment::with(['films','customers'])->where('status','1')->where('film_id',$film->id)->orderBy('created_at','desc')->get();
         
        $filmslienquan = Film::where('admin_id',$films->admin_id)->take(6)->get();
        return view('frontend.view.detail',['films'=>$films,'filmslienquan'=>$filmslienquan])->with($this->data);

    }
    // luu binh luan cua nguoi dung
    public function saveComment(Request $request)
    {
        if($request->input('user')!=""){
            $comments = new Comment;
            // lay gia tri truyen qua de luu
            $comments->film_id = $request->input('films');
            $comments->content = $request->input('comment');
            $comments->customer_id =$request->input('user');
            $comments->feedback =$request->input('feedback');
            $comments->status ="0";
            $comments->created_at=date('Y-m-d H:i:s');
            $comments->updated_at =date('Y-m-d H:i:s');
            // luu du lieu xuong bang comment
            $comments->save();
            return "true";
        }

    }
    // load them comment
    public function loadmoreComment(Request $request)
    {
        return Comment::with(['films','customers'])->where('status','1')
         ->where('film_id',$request->input('film_id'))->orderBy('created_at','desc')
         ->skip($request->input('index'))->take(8)
         ->get();         
       //  return response()->json($comments);
         
    }
    function watchmovie($slug,$description) 
    {
    	$film= Film::select('id')->where('slug',$slug)->get()->first();
    	$films = Film::find($film->id);
         //top phim dua vao luot view nhieu nhat theo thoi gian
        $this->data['topphim']=  Film::where('film_type','0')->orderBy('view_count','desc')->orderBy('created_at','desc')->take(5)->get();
        //top phim bộ
        $country_id=Country::select('id')->where('slug','my')->first()->id;
        $this->data['topphimbo'] =Country::find($country_id)->films()->where('film_hot','1')->where('film_type','1')->orderBy('created_at','desc')->get();
    	// $filmstabs= LinkFilm::select('id')->where('description',$description)->get()->first();
    	// $filmstab = LinkFilm::find($filmstabs->id);
    	$filmstab = LinkFilm::where('film_id',$films->id)->where('description',$description)->get()->first();
        // Kich hoat su kien tang luot xem
        event(new CountViewEvent($films));
    	// foreach ($films->link_film as $links) {
    	// 	dd($links->id);die();
    	// }
    	// dd($filmstab);die();
    	$filmslienquan = Film::where('admin_id',$films->admin_id)->take(6)->get();
    	return view('frontend.view.movie',['films'=>$films,'filmslienquan'=>$filmslienquan,'filmstab'=>$filmstab])->with($this->data);
    }
}

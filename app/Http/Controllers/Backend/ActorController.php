<?php

namespace App\Http\Controllers\Backend;

use App\Models\Actor;
use App\Models\Country;
use function GuzzleHttp\Psr7\str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ActorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('index', Actor::class);

        $actors = Actor::all();
        return view('admin.actors.list',compact('actors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('create', Actor::class);

        $countries = Country::all();
        //dd($countries);
        return view('admin.actors.add',compact('countries'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->authorize('create', Actor::class);

        $this->validate($request,
        [
            'fullname' => 'required|min:3|max:50',
            'biography'   => 'required|min:10|max:300',
            'birthday'       => 'required'
        ],
        [
            'fullname.required' => "Bạn chưa nhập tên tác diễn viên",
            'fullname.min'      => "Tên diễn viên phải lớn hơn 3 ký tự",
            'fullname.max'      => "Tên diễn viên loại không thể dài hơn 50 ký tự",

            'biography.required' => 'Bạn chưa nhập tiểu sử diễn viên ',
            'biography.min'       => 'Mô tả diễn viên phải lớn hơn 10 ký tự',
            'biography.max'       => "Mô tả diễn viên phải ít hơn 300 ký tự",

            'birthday.required'          => 'Bạn chưa nhập năm sinh diễn viên'
        ]);

        $actor = new Actor;

        $actor->fullname = $request->fullname;

        $actor->slug =str_slug($request->fullname);
        $actor->biography  = $request->biography;
        $actor->id_country    = $request->country;
        $actor->birthday     = $request->birthday;

        if($request->hasFile('img'))
        {
            $file = $request->file('img');
            $duoi = $file->getClientOriginalExtension();
            if($duoi != 'jpg' && $duoi != 'png')
            {
                //return redirect('backend/tintuc/them')->with('loi','Hình ảnh không hợp lệ !');
                return redirect()->route('admin.actor.create')->with('thongbao','Hình ảnh không hợp lệ !');
            }
            $name = $file->getClientOriginalName(); // get name img
            $hinh = str_random(4)."_".$name;
            while(file_exists("upload/actor".$hinh))
            {
                $hinh = str_random(4)."_".$name;
            }
            $file->move("upload/actor",$hinh);
            $actor->image = $hinh;
            
        }
        else
        {
            $actor->image = "";
        }
        $actor->save();
        return redirect()->route('admin.actor.list')->with('thongbao','Thêm Diễn viên mới thành công');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Actor  $actor
     * @return \Illuminate\Http\Response
     */
    public function show(Actor $actor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Actor  $actor
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $actor   = Actor::find($id);
        $this->authorize('update', $actor);

        $countries = Country::all();
        //dd($actor);
        return view('admin.actors.edit',compact('actor','countries'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Actor  $actor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {

        $actor = Actor::find($id);
        $this->authorize('update', $actor);

        $this->validate($request,
        [
            'fullname' => 'required|min:3|max:50',
            'biography'   => 'required|min:10|max:300',
            'birthday'       => 'required'
        ],
        [
            'fullname.required' => "Bạn chưa nhập tên tác diễn viên",
            'fullname.min'      => "Tên diễn viên phải lớn hơn 3 ký tự",
            'fullname.max'      => "Tên diễn viên loại không thể dài hơn 50 ký tự",

            'biography.required' => 'Bạn chưa nhập tiểu sử diễn viên ',
            'biography.min'       => 'Mô tả diễn viên phải lớn hơn 10 ký tự',
            'biography.max'       => "Mô tả diễn viên phải ít hơn 300 ký tự",

            'birthday.required'          => 'Bạn chưa nhập năm sinh diễn viên'
        ]);

        //$actor = new Actor;

        $actor->fullname = $request->fullname;

        $actor->slug =str_slug($request->fullname);
        $actor->biography  = $request->biography;
        $actor->id_country    = $request->country;
        $actor->birthday     = $request->birthday;

        if($request->hasFile('img'))
        {
            $file = $request->file('img');
            $duoi = $file->getClientOriginalExtension();
            if($duoi != 'jpg' && $duoi != 'png')
            {
                //return redirect('backend/tintuc/them')->with('loi','Hình ảnh không hợp lệ !');
                return redirect()->route('admin.actor.update')->with('thongbao','Hình ảnh không hợp lệ !');
            }
            $name = $file->getClientOriginalName(); // get name img
            $hinh = str_random(4)."_".$name;
            while(file_exists("upload/actor".$hinh))
            {
                $hinh = str_random(4)."_".$name;
            }
            $file->move("upload/actor",$hinh);
            $actor->image = $hinh;
            
        }
        else
        {
            $actor->image = "";
        }
        $actor->save();
        return redirect()->route('admin.actor.list')->with('thongbao','Cập nhật thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Actor  $actor
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $actor = Actor::find($id);
        $this->authorize('delete', $actor);

        $actor->delete();
        return redirect()->route('admin.actor.list')->with('thongbao','Xóa diễn viên thành công');
    }
}

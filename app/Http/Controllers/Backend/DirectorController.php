<?php

namespace App\Http\Controllers\Backend;

use App\Models\Director;
use App\Models\Country;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DirectorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('index', Director::class);

        $directors = Director::all();
        return view('admin.directors.list',compact('directors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('create', Director::class);

        $countries = Country::all();
        return view('admin.directors.add',compact('countries'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->authorize('create', Director::class);

        $this->validate($request,
        [
            'fullname' => 'required|min:3|max:50',
            'biography'   => 'required|min:10|max:300',
            'birthday'       => 'required'
        ],
        [
            'fullname.required' => "Bạn chưa nhập tên đạo diễn",
            'fullname.min'      => "Tên đạo diễn phải lớn hơn 3 ký tự",
            'fullname.max'      => "Tên đạo diễn loại không thể dài hơn 50 ký tự",

            'biography.required' => 'Bạn chưa nhập tiểu sử đạo diễn ',
            'biography.min'       => 'Mô tả đạo diễn phải lớn hơn 10 ký tự',
            'biography.max'       => "Mô tả đạo diễn phải ít hơn 300 ký tự",

            'birthday.required'          => 'Bạn chưa nhập năm sinh đạo diễn'
        ]);

        $director = new Director;

        $director->fullname = $request->fullname;

        $director->slug =str_slug($request->fullname);
        $director->biography  = $request->biography;
        $director->id_country    = $request->country;
        $director->birthday     = $request->birthday;

        if($request->hasFile('img'))
        {
            $file = $request->file('img');
            $duoi = $file->getClientOriginalExtension();
            if($duoi != 'jpg' && $duoi != 'png')
            {
                //return redirect('backend/tintuc/them')->with('loi','Hình ảnh không hợp lệ !');
                return redirect()->route('admin.director.create')->with('thongbao','Hình ảnh không hợp lệ !');
            }
            $name = $file->getClientOriginalName(); // get name img
            $hinh = str_random(4)."_".$name;
            while(file_exists("upload/director".$hinh))
            {
                $hinh = str_random(4)."_".$name;
            }
            $file->move("upload/director",$hinh);
            $director->image = $hinh;
            
        }
        else
        {
            $director->image = "";
        }
        $director->save();
        return redirect()->route('admin.director.list')->with('thongbao','Thêm đạo diễn mới thành công');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Director  $director
     * @return \Illuminate\Http\Response
     */
    public function show(Director $director)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Director  $director
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $director   = Director::find($id);
        $this->authorize('update', $director);

        $countries = Country::all();
        //dd($actor);
        return view('admin.directors.edit',compact('director','countries'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Director  $director
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $director = Director::find($id);
        $this->authorize('update', $director);

        $this->validate($request,
        [
            'fullname' => 'required|min:3|max:50',
            'biography'   => 'required|min:10|max:300',
            'birthday'       => 'required'
        ],
        [
            'fullname.required' => "Bạn chưa nhập tên đạo diễn",
            'fullname.min'      => "Tên đạo diễn phải lớn hơn 3 ký tự",
            'fullname.max'      => "Tên đạo diễn loại không thể dài hơn 50 ký tự",

            'biography.required' => 'Bạn chưa nhập tiểu sử đạo diễn ',
            'biography.min'       => 'Mô tả đạo diễn phải lớn hơn 10 ký tự',
            'biography.max'       => "Mô tả đạo diễn phải ít hơn 300 ký tự",

            'birthday.required'          => 'Bạn chưa nhập năm sinh đạo diễn'
        ]);



        $director->fullname = $request->fullname;

        $director->slug =str_slug($request->fullname);
        $director->biography  = $request->biography;
        $director->id_country    = $request->country;
        $director->birthday     = $request->birthday;

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
            while(file_exists("upload/director".$hinh))
            {
                $hinh = str_random(4)."_".$name;
            }
            $file->move("upload/director",$hinh);
            $director->image = $hinh;
            
        }
        else
        {
            $director->image = "";
        }
        $director->save();
        return redirect()->route('admin.director.list')->with('thongbao','Cập nhật thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Director  $director
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         $actor = Director::find($id);
         $this->authorize('delete', $director);
         
         $actor->delete();
         return redirect()->route('admin.director.list')->with('thongbao','Xóa đạo diễn thành công');
    }
}

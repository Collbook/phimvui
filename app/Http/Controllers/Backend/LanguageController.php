<?php

namespace App\Http\Controllers\Backend;

use App\Models\Language;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LanguageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('index', Language::class);

        $languages = Language::all();
        return view('admin.languages.list',compact('languages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('create', Language::class);

        return view('admin.languages.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         $this->authorize('create', Language::class);

         $this->validate($request,
         [
             'lang' => 'required|min:3|max:50'
         ],
         [
             'lang.required' => "Bạn chưa nhập tên ngôn ngữ phim",
             'lang.min'      => "Tên ngôn ngữ phim phải lớn hơn 3 ký tự",
             'lang.max'      => "Tên ngôn ngữ phim không thể dài hơn 50 ký tự"
         ]);
 
         $lang = new Language;

         $lang->language    = $request->lang;
         $lang->slug        = str_slug($request->lang);
         $lang->save();
         return redirect()->route('admin.language.list')->with('thongbao','Thêm thành công');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Language  $language
     * @return \Illuminate\Http\Response
     */
    public function show(Language $language)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Language  $language
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $langs   = Language::findOrFail($id);
        $this->authorize('update', $langs);

        return view('admin.languages.edit',compact('langs'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Language  $language
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $lang = Language::find($id);
        $this->authorize('update', $lang);

        $this->validate($request,
        [
            'lang' => 'required|min:3|max:50'
        ],
        [
            'lang.required' => "Bạn chưa nhập tên ngôn ngữ phim",
            'lang.min'      => "Tên ngôn ngữ phim phải lớn hơn 3 ký tự",
            'lang.max'      => "Tên ngôn ngữ phim không thể dài hơn 50 ký tự"
        ]);


        $lang->language    = $request->lang;
        $lang->slug        = str_slug($request->lang);
        $lang->save();
        return redirect()->route('admin.language.list')->with('thongbao','Cập nhật thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Language  $language
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $lang = Language::find($id);
        $this->authorize('delete', $lang);

        $lang->delete();
        return redirect()->route('admin.language.list')->with('thongbao','Xóa thành công');
    }
}

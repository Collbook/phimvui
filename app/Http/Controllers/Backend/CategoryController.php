<?php

namespace App\Http\Controllers\Backend;

use App\Models\Category;
use App\Models\Film;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $this->authorize('index', Category::class);

        $category = Category::all();
        return view("admin.categories.list",compact('category'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('index', Category::class);
        return view('admin.categories.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $this->authorize('index', Category::class);
        $this->validate($request,
        [
            'cate' => 'required|min:3|max:50',
            'description'   => 'required|min:10|max:300'
        ],
        [
            'cate.required' => "Bạn chưa nhập tên thể loại phim",
            'cate.min'      => "Tên phim thể loại phải lớn hơn 3 ký tự",
            'cate.max'      => "Tên phim thể loại không thể dài hơn 50 ký tự",

            'description.required' => 'Bạn chưa nhập mô tả thể loại phim ',
            'description.min'       => 'Mô tả thể loại phim phải lớn hơn 10 ký tự',
            'description.max'       => "Mô tả thể loại phim phải ít hơn 300 ký tự"
        ]);

        $cate = new Category;
        $cate->name = $request->cate;
        $cate->description = $request->description;
        $cate->slug        = changeTitle($request->cate);
        $cate->save();
        return redirect()->route('admin.cate.list')->with('thongbao','Thêm thành công');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $cate, $id)
    {   
            $cate   = Category::findOrFail($id);
            $this->authorize('update', $cate);
            //dd($theloai);
            return view('admin.categories.edit',compact('cate'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // $cate   = Category::findOrFail($id);
        // $this->authorize('update', $cate);

        $cate = Category::find($id);
        $this->validate($request,
        [
            'cate' => 'required|min:3|max:50',
            'description'   => 'required|min:10|max:300'
        ],
        [
            'cate.required' => "Bạn chưa nhập tên thể loại phim",
            'cate.min'      => "Tên phim thể loại phải lớn hơn 3 ký tự",
            'cate.max'      => "Tên phim thể loại không thể dài hơn 50 ký tự",

            'description.required' => 'Bạn chưa nhập mô tả thể loại phim ',
            'description.min'       => 'Mô tả thể loại phim phải lớn hơn 10 ký tự',
            'description.max'       => "Mô tả thể loại phim phải ít hơn 300 ký tự"
        ]);

        $cate->name = $request->cate;
        $cate->description = $request->description;
        $cate->slug        = changeTitle($request->cate);
        $cate->save();
        return redirect()->route('admin.cate.list')->with('thongbao','Cập nhật thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $cate   = Category::findOrFail($id);
        $this->authorize('delete', $cate);
        $cate->delete();
        return redirect()->route('admin.cate.list')->with('thongbao','Xóa thành công');
    }
}

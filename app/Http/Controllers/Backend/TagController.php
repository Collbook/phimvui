<?php

namespace App\Http\Controllers\Backend;
use App\Http\Requests\editTagRequest;
use DateTime;
use App\Models\Tag;
use Illuminate\Http\Request;
use App\Http\Requests\addTagRequest;
use App\Http\Controllers\Controller;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('index', Tag::class);

        $data['tags'] = Tag::paginate(5);
        return view("admin.tags.list",$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('create', Tag::class);

        return view("admin.tags.add");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(addTagRequest $request)
    {
        $this->authorize('create', Tag::class);

        $tag = new Tag();
        $tag ->name = $request ->txttags;
        $tag->created_at = new DateTime();
        $tag ->slug = str_slug($request ->txttags);
        $tag->save();
        return redirect()->route('admin.tags.index')->with('mess','thêm tag thành công !');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function show()
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function edit(Tag $tag, $id)
    {
        $data['tags']= Tag::findOrFail($id);
        $this->authorize('update', $data['tags']);

        return view('admin.tags.edit',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function update(editTagRequest $request,$id)
    {
        $tags= Tag::findOrFail($id);
        $this->authorize('update', $tags);
        $tags->name =$request->input('txttags');
        $tags->save();
        return redirect()->route('admin.tags.index')->with('mess','Cập Nhật Tags Thành Công !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tag $tag)
    {
        //
    }
    public function delete($id)
    {
//        $tags=Tag::find($id);
        $tags = Tag::findOrFail($id);
        $this->authorize('delete', $tags);
        if($tags!==null){
            $tags->delete();
            return redirect()->route('admin.tags.index')->with('mess','Xóa Thành Công!');
        }else{
            return redirect()->route('admin.tags.index')->with('error','Tag này khồn tồn tại !');
        }
    }
}

<?php

namespace App\Http\Controllers\Backend;

use App\Models\LinkFilm;
use App\Models\Film;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\AddLinkRequest;
use Illuminate\Support\Facades\Validator;
class LinkFilmController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('index', LinkFilm::class);

        $data['links'] = LinkFilm::paginate(5);
        return view("admin.link_films.list",$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('create', LinkFilm::class);

        $data['films'] =Film::all();
        return view("admin.link_films.add",$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AddLinkRequest $request)
    {
        $this->authorize('create', LinkFilm::class);

        $links = new LinkFilm();
        $links->film_id=$request ->txtname;
        $links->type= $request ->txttypelink;
        $links ->description = $request ->descreption;
        $links ->link = $request->txtlink;
        $links->save();
        return redirect()->route('admin.link.index')->with('mess','thêm link cho phim thành công !');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\LinkFilm  $linkFilm
     * @return \Illuminate\Http\Response
     */
    public function show(LinkFilm $linkFilm)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\LinkFilm  $linkFilm
     * @return \Illuminate\Http\Response
     */
    public function edit(LinkFilm $linkFilm, $id)
    {
        $data['links'] =LinkFilm::findOrFail($id);
        $this->authorize('update', $data['links']);
        return view("admin.link_films.edit",$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\LinkFilm  $linkFilm
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request ,$id)
    {
        $valid = Validator::make($request->all(),[
            'description'=>'required',
            'txtlink'=>'required',
        ],[
            'description.required'=>'mô tả không được trống !',
            'txtlink.required'=>'link phim không được trống !'
        ]);
        if ($valid->fails()) {
            return redirect()->back()->withErrors($valid)->withInput();
        }else{
            $link = LinkFilm::findOrFail($id);
            $link->type= $request ->txttypelink;
            $link ->description =$request ->description;
            $link ->link =$request ->txtlink;
            $link ->save();
            return redirect()->route('admin.link.index')->with('mess','cập nhật thành công !');
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\LinkFilm  $linkFilm
     * @return \Illuminate\Http\Response
     */
    public function destroy(LinkFilm $linkFilm)
    {
        //
    }
    public function delete($id)
    {
        $links = LinkFilm::findOrFail($id);
        $this->authorize('delete', $links);
        if($links !==null){
            $links->delete();
            return redirect() ->route('admin.link.index')->with('mess','xóa thành công!');
        }else{
            return redirect() ->route('admin.link.index')->with('mess','link này không tồn tại !');
        }
    }
}

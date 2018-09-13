<?php

namespace App\Http\Controllers\Backend;

use App\Models\Comment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CommentController extends Controller
{
    public function __construct()
    {
        // $this->authorize('index', Comment::class);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Comment $comment)
    {
        $comments = Comment::all();
        $this->authorize('index', Comment::class);
        
        return view('admin.comments.list-all', ['comments' => $comments]);
    }

    public function listNewComment()
    {
        $comments = Comment::where('status', 0)->get();
        $this->authorize('index', Comment::class);

        return view('admin.comments.list-new', ['comments' => $comments]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $comment = Comment::findOrFail($id)->get();
        $this->authorize('view', $comment);
        return view('admin.comments.show', ['comment' => $comment]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function edit(Comment $comment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Comment $comment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Comment $comment, $id)
    {
        $type    = $request->type;
        $comment = Comment::findOrFail($id);
        $this->authorize('delete', $comment);
        $comment->delete();

        if ($type == 'all') {
            $comments = Comment::all();
            return view('admin.comments.ajax-comment-all', ['comments' => $comments]);
        } else {
            $comments = Comment::where('status', 0)->get();
            return view('admin.comments.ajax-comment-new', ['comments' => $comments]);
        }
        
    }

    public function approve(Request $request, Comment $comment ,$id)
    {
        $type    = $request->type;
        $comment = Comment::findOrFail($id);
        $this->authorize('update', $comment);
        $comment->status = 1;
        $comment->save();
        

        if ($type == 'all') {
            $comments = Comment::all();
            return view('admin.comments.ajax-comment-all', ['comments' => $comments]);
        } else {
            $comments = Comment::where('status', 0)->get();
            return view('admin.comments.ajax-comment-new', ['comments' => $comments]);
        }

    }

    public function MultiCheckbox (Request $request)
    {
        $this->authorize('index', Comment::class);
        $type = $request->type;
        
        if (!empty($request->input('id'))) {
            if ($request->action == 'approve') {
                $ids = $request->id;
                Comment::whereIn('id', $ids)->update(['status' => 1]);
            } else {
                $ids = $request->id;
                Comment::whereIn('id', $ids)->delete();
            }
            
            if ($type == 'all') {
                $comments = Comment::all();
                return view('admin.comments.ajax-comment-all', ['comments' => $comments]);
            } else {
                $comments = Comment::where('status', 0)->get();
                return view('admin.comments.ajax-comment-new', ['comments' => $comments]);
            }
            
        } else {
            return back()->with('status_checkbox', 'Có lỗi. Bạn chưa chọn thao tác nào!');
        }  
    }
}

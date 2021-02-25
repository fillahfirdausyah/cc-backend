<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CommentPost;

class CommentpostController extends Controller
{

    public function index()
    {
        //
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $comment = new CommentPost();
        $comment->post_id = $request->post_id;
        $comment->user_id = $request->user_id;
        $comment->comment = $request->comment;
        $comment->parent_id = $request->parent_id;
        $comment->save();

        return redirect()->back();
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        $comment = CommentPost::find($id);
        $comment->delete();

        return redirect()->back();
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\MessageBag;
use App\Models\SR;
use App\Models\Comments;
use App\Models\Like;

class VisitController extends Controller
{
    
    public function show($id)
    {
        //show_rekomendasi
        $recomendations = SR::orderBy('created_at', 'desc')->limit(5)->get();
        foreach ($recomendations as $sr) {
             $conv[] = json_decode($sr->gambar);
        }
        $count = count($conv);
        for ($i=0; $i < $count; $i++) { 
            $recommend_img[] = $conv[$i][0];
        }

        //show picts
        $SR = SR::find($id);
        $images[] = json_decode($SR->gambar);
        foreach ($images as $img) {
            $collect = $img;
        }
        

        //show comment
        $comment = SR::with(['comment','comment.child'])->where('id', $id)->first();        

        //show like
        $like = Like::select('like')->where('post_id', '=', $id)->get();
        $likes = count($like);

        return view('layouts/visit', compact('SR', 'collect','comment', 'likes', 'recommend_img', 'recomendations'));
    }

    public function comment(Request $request)
    {
        $this->validate($request, [
            'comment' => 'required'
        ]);

            $comment = new Comments();
            $comment->post_id = $request->id;
            //uncomment ketika sudah ada auth
            //$comments->user_id = $request->user_id;
            $comment->parent_id = $request->parent_id !='' ? $request->parent_id:NULL;
            $comment->comment = $request->comment;
            $comment->save();

        return redirect()->back();   
    }

    public function like(Request $request)
    {
        $like = new Like();
        $like->like = $request->get('like');
        $like->user_id = 1 ;//$request->get('user_id');
        $like->post_id = $request->get('post_id');
        $like->save();

        $like = Like::select('like')->where('post_id', '=', $request->get('post_id'))->get();
        $likes = count($like);

        echo $likes;
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\MessageBag;
use Illuminate\Support\Facades\Auth;
use App\Models\SR;
use App\Models\User;
use App\Models\Bengkel;
use App\Models\Comments_SR;
use App\Models\CommentBengkel;
use App\Models\Like_SR;
use App\Models\LikeBengkel;

class VisitSRController extends Controller
{
    
    public function show($id)
    {   
        // Authenticated User
        $user = Auth::user();
        
        //show picts
        $SR = SR::find($id);
        //Seller User
        $tenant = SR::find($id)->user()->first();
        // //show_rekomendasi
        // $recomendations = SR::orderBy('created_at', 'desc')->limit(5)->get();

        // //show comment
        // $comment = SR::with(['comment','comment.child', 'comment.user'])->where('id', $id)->first();

        // //show like
        // $like = Like_SR::select('like')->where('post_id', '=', $id)->get();
        // $likes = count($like);

        // return view('showroom2.car-details', compact('SR','comment', 'likes','recomendations','user'));
        return view('showroom2.car-details', compact('SR', 'user', 'tenant'));
    }

    public function showBengkel($id)
    {
        $user = Auth::user();

        //show picts
        $bengkel = Bengkel::find($id);

        //show comment
        $comment = Bengkel::with(['comment','comment.child', 'comment.user'])->where('id', $id)->first();

        //show like
        $like = LikeBengkel::select('like')->where('post_id', '=', $id)->get();
        $likes = count($like);

        return view('Showroom.visitBengkel', compact( 'bengkel', 'collect', 'comment', 'likes','user'));   
    }

    public function comment(Request $request)
    {
        $this->validate($request, [
            'comment' => 'required'
        ]);

            $comment = new Comments_SR();
            $comment->post_id = $request->id;
            $comment->user_id = $request->user_id;
            $comment->parent_id = $request->parent_id !='' ? $request->parent_id:NULL;
            $comment->comment = $request->comment;
            $comment->save();

        return redirect()->back();   
    }

    public function comment_bengkel(Request $request)
    {
        $this->validate($request, [
            'comment' => 'required'
        ]);

            $comment = new CommentBengkel();
            $comment->post_id = $request->id;
            $comment->user_id = $request->user_id;
            $comment->parent_id = $request->parent_id !='' ? $request->parent_id:NULL;
            $comment->comment = $request->comment;
            $comment->save();

        return redirect()->back();   
    }

    public function like(Request $request)
    {
        if (Like_SR::where('post_id', $request->get('post_id'))->where('user_id', $request->get('user_id'))->count() < 1) {
            $like = new Like_SR();
            $like->like = $request->get('like');
            $like->user_id = $request->get('user_id');
            $like->post_id = $request->get('post_id');
            $like->save(); 
        }else{
            $like = Like_SR::where('post_id', $request->get('post_id'))->where('user_id', $request->get('user_id'));
            $like->delete();
        }

        $like = Like_SR::select('like')->where('post_id', '=', $request->get('post_id'))->get();
        $likes = count($like);

        echo $likes;  
    }

    public function likeBengkel(Request $request)
    {
        if (LikeBengkel::where('post_id', $request->get('post_id'))->where('user_id', $request->get('user_id'))->count() < 1) {
            $like = new LikeBengkel();
            $like->like = $request->get('like');
            $like->user_id = $request->get('user_id');
            $like->post_id = $request->get('post_id');
            $like->save(); 
        }else{
            $like = LikeBengkel::where('post_id', $request->get('post_id'))->where('user_id', $request->get('user_id'));
            $like->delete();
        }

        $like = LikeBengkel::select('like')->where('post_id', '=', $request->get('post_id'))->get();
        $likes = count($like);

        echo $likes;  
    }
}

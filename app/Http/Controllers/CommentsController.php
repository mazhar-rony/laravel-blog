<?php

namespace App\Http\Controllers;

use App\Post;
use App\Comment;
use Illuminate\Http\Request;

class CommentsController extends Controller
{
    public function store(Post $post)
    {
        request()->validate(['body' => 'required|min:3|max:300']);

        $post->comments()->create([
            'body' => request('body'),
            'user_id' => auth()->id()
        ]);

        return back()->with('success', 'Comment Added Successfully !');
    }

    public function postLike(Post $post)
    {
        $like = $post->likes->where('user_id', auth()->id())->first();

        if($like)
        {
            $like->delete();

            //return back()->with('error', 'You Already Liked This Post');
            return back();
        }

        $post->likes()->create([
            'user_id' => auth()->id()
        ]);

        //return back()->with('success', 'You Liked This Post !');
        return back();
    }

    public function commentLike(Comment $comment)
    {
        $like = $comment->likes()->where('user_id', auth()->id())->first();

        if($like)
        {
            $like->delete();
            return back();
        }

        $comment->likes()->create([
            'user_id' => auth()->id()
        ]);
        
        //$userName = "<b style='color:#3490DC'>".Auth::user()->name."</b>";//make html compatible in partials.success_message.blade.php
        
        //return back()->with('success', $userName . ' Liked This Comment');

        return back();
    }
}

<?php

namespace App\Http\Controllers;

use App\Post;
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
}

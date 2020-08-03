<?php

namespace App;

use Illuminate\Support\Facades\Mail;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $guarded = [];

    protected static function boot()
    {
        parent::boot();

        self::created(function($comment){
            // dd('created');
            
            $subscribers = $comment->post->likes;

            // dd($subscriber[0]->user);

            foreach($subscribers as $subscriber)
            {
                $user = $subscriber->user;

                Mail::raw('New Comment on a Post you Liked', function ($message) use ($user) {
                    $message->to($user->email, 'admin')->subject('New Comment Added');
                });
            }
        });
    }

    public function owner()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function post()
    {
        return $this->belongsTo(Post::class);
    }

    public function likes()
    {
        return $this->morphMany('App\Like', 'likeable');
    }

    public function likedByCurrentUser()
    {
        return $this->likes()->where('user_id', auth()->id())->exists();
    }
}

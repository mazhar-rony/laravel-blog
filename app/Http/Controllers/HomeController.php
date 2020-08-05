<?php

namespace App\Http\Controllers;

use App\Post;
use App\Category;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $posts = Post::all();
        //$categories = Category::all(); //View Composer Used in AppServiceProvider Instead of passing values

        return view('home.index', [
            'posts' => $posts
            //'categories' => $categories //View Composer Used in AppServiceProvider Instead of passing values
        ]);
    }

    public function show(Post $post)
    {
        //$categories = Category::all(); //View Composer Used in AppServiceProvider Instead of passing values
        
        return view('home.show', [
            'post' => $post
            //'categories' => $categories //View Composer Used in AppServiceProvider Instead of passing values
        ]);
    }
}

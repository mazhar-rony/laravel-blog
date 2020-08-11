<?php

namespace App\Http\Controllers;

use App\Post;
use App\Category;
use PDF;
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
        $posts = Post::where('status', 1)->paginate(10);

        //$categories = Category::all(); //View Composer Used in AppServiceProvider Instead of passing values

        return view('home.index', [
            'posts' => $posts
            //'categories' => $categories //View Composer Used in AppServiceProvider Instead of passing values
        ]);
    }

    public function show(Post $post)
    {
        if(auth()->check())
        {
            if(!$post->status && auth()->user()->user_type != 'admin') return back();
        }
            
        else
        {
            if(!$post->status) return back();
        }
           
        //$categories = Category::all(); //View Composer Used in AppServiceProvider Instead of passing values
        
        return view('home.show', [
            'post' => $post
            //'categories' => $categories //View Composer Used in AppServiceProvider Instead of passing values
        ]);
    }

    public function genReport()
    {
        $cat = Category::all();

        $pdf = PDF::loadView('pdf.invoice', [
            'cat' => $cat
        ]);

        return $pdf->download('invoice.pdf');
    }
}

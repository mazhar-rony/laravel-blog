<?php

namespace App\Http\Controllers;

use App\Tag;
use App\Category;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function searchPostByCategory(Category $category)
    {
        $posts = $category->posts()->paginate(10);
        //$categories = Category::all();//View Composer Used in AppServiceProvider Instead of passing values

        return view('search.category', [
            'posts' => $posts
            //'categories' => $categories //View Composer Used in AppServiceProvider Instead of passing values
        ]);
    }

    public function searchPostByTag(Tag $tag)
    {
        $posts = $tag->posts()->paginate(10);

        return view('search.tag', [
            'posts' => $posts
        ]);
    }
}

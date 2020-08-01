<?php

namespace App\Http\Controllers;

use App\Tag;
use App\Post;
use App\Category;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::paginate(10);

        return view('posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $tags = Tag::all();

        return view('posts.create', [
            'categories' => $categories,
            'tags' => $tags
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        $validated_data = request()->validate([
            'title' => 'required|min:5|max:300',
            'body' => 'required|min:10',
            'category_id' => 'required|exists:categories,id',
            'tag_id' => 'exists:tags,id',
            'thumbnail' => 'image'
        ]);

        $tag_ids = request('tag_id');

        $tags = Tag::find($tag_ids);

        $post = Post::create(request()->except('_token', 'tag_id'));

        if(request()->hasFile('thumbnail'))
        {
            //$file = request()->file('thumbnail')->getClientOriginalName();
            $ext = request()->file('thumbnail')->getClientOriginalExtension();
            $file_name = $post->id . '.' . $ext;
            $destination = 'uploads/posts/';

            request()->file('thumbnail')->move($destination, $file_name);

            $post->update([
                'thumbnail' => $file_name
            ]);
        }

        $post->tags()->attach($tags);

        return redirect('/posts')->with('success', 'Post Created Successfully !');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        $categories = Category::all();
        $tags = Tag::all();

        return view('posts.edit', [
            'categories' => $categories,
            'tags' => $tags,
            'post' => $post
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Post $post)
    {
        request()->validate([
            'title' => 'required|min:5|max:300',
            'body' => 'required|min:10',
            'category_id' => 'required|exists:categories,id',
            'tag_id' => 'exists:tags,id'
        ]);

        if(request()->hasFile('thumbnail'))
        {
            request()->validate([
                'thumbnail' => 'image'
            ]);
        }

        $tag_ids = request('tag_id');

        $tags = Tag::find($tag_ids);

        $post->update(request()->except('_token', 'tag_id'));

        if(request()->hasFile('thumbnail'))
        {
            if(\File::exists("uploads/posts/$post->thumbnail"))
            {
                \File::delete("uploads/posts/$post->thumbnail");
            }

            //$file = request()->file('thumbnail')->getClientOriginalName();
            $ext = request()->file('thumbnail')->getClientOriginalExtension();
            $file_name = $post->id . '.' . $ext;
            $destination = 'uploads/posts/';

            request()->file('thumbnail')->move($destination, $file_name);

            $post->update([
                'thumbnail' => $file_name
            ]);
        }

        $post->tags()->sync($tags);

        return redirect('/posts')->with('success', 'Post Updated Successfully !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

}

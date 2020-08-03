@extends('layouts.app')

{{-- styles for Single Page View --}}
@section('styles')
    @include('partials.single_post_style')
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-9">

            {{--  @include('partials.success_message')  --}}

            <div class="card mb-4">
                <div class="card-header" style="background-color: #262626; color: #fff;">
                    @if ($post->thumbnail)
                        {{-- thumbnail_path() declared in Post Model file --}}
                        <img src="{{ $post->thumbnail_path() }}" alt="thumbnail" class="rounded-circle mr-2" width="50" height="50">
                    @endif
                    
                    <a href="/posts/{{ $post->id }}"><strong>{{ $post->title }}</strong></a>
                </div>

                <div class="card-body">
                    {{-- <div class="wrapper"> --}}
                        <div class="sin-team">
                            @if ($post->thumbnail)
                                {{-- thumbnail_path() declared in Post Model file --}}
                                <img src="{{ $post->thumbnail_path() }}" alt="thumbnail">
                            @endif
                            <h2 style="color: darkred;">{{ $post->title }}</h2>
                            <p>{{ $post->body }}</p>
                        </div>
                    {{-- </div> --}}
                </div>

                <div class="card-footer">
                    <a href="/posts/{{ $post->id }}/liked" @if($post->likedByCurrentUser()) style="color:#3490DC;" @else style="color:#aaa9ad;" @endif>
                        @if ($post->likedByCurrentUser())
                            <span class="pull-right" style="font-size: 18px;"> &nbsp;<b>Liked</b></span>
                            <i class="fa fa-thumbs-up fa-2x pull-right"  aria-hidden="true" data-toggle="tooltip" data-placement="bottom" title="Unlike This Post"></i>
                        @else 
                            <span class="pull-right" style="font-size: 18px;"> &nbsp;<b>Like</b></span>
                            <i class="fa fa-thumbs-up fa-2x pull-right"  aria-hidden="true" data-toggle="tooltip" data-placement="bottom" title="Like This Post"></i>
                        @endif

                        
                    </a> 
                    {{-- <br> --}}
                   
                    @if ( $post->likes->count() > 1)
                        <b style="color:#3490DC"> {{ $post->likes->count() }} People Like This Post </b>
                    @else
                        <b style="color:#3490DC"> {{ $post->likes->count() }} Person Likes This Post </b>
                    @endif
                </div>

            </div>   

            <h4><strong>Comments</strong></h4>

            <hr>

            @include('partials.success_message')

            <div class="card mb-4">
                <div class="card-body">
                    <form action="/posts/{{ $post->id }}/comments" method="POST">
                        
                        @csrf

                        <div class="form-group row">
                            {{-- <label for="body" class="col-md-4 col-form-label text-md-right"></label> --}}

                            <div class="col-md-12">
                                <textarea class="form-control @error('body') is-invalid @enderror" 
                                name="body" id="body" placeholder="Add Your Comment...">{{ old('body') }}</textarea>
                                
                                @error('body')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <button type="submit" class="btn btn-success btn-sm">
                            Save Comment
                        </button>
                           
                    </form>
                </div>
            </div>

            @foreach ($post->comments->sortByDesc('created_at') as $comment)
                <div class="card mb-4">
                    <div class="card-header">
                        <b>{{ $comment->owner->name }}</b> - {{ $comment->created_at->diffForHumans() }}
                        <b class="pull-right"> {{ $comment->likes->count() }}</b>
                            <a href="/comments/{{ $comment->id }}/liked">
                                
                                <i class="fa fa-heart fa-lg pull-right" @if($comment->likedByCurrentUser()) style="color:#8a0303" @else style="color:#aaa9ad" @endif aria-hidden="true"></i>
                               
                            </a>
                    </div>
                    <div class="card-body">
                        {{ $comment->body }}
                    </div>
                </div> 
            @endforeach  

        </div>

        <div class="col-md-3">
            <div class="card">
                <div class="card-header">Category</div>

                <div class="card-body">
                    <ul class="list-group">
                        @foreach ($categories as $category)
                            <li class="list-group-item">
                                <a href="/posts/{{ $category->id }}/category">{{ $category->name }}</a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection

{{--  Bootstrap tooltip used for like button   --}}
@section('scripts')
    <script>
        $(function () {
            $('[data-toggle="tooltip"]').tooltip()
          })
    </script>
@endsection

@extends('layouts.app')

@section('content')
<div class="container">

    @include('partials.success_message')

    <div class="row justify-content-center">
        <div class="col-md-9">
            @foreach ($posts as $post)
                <div class="card mb-5">
                    <div class="card-header">
                        @if ($post->thumbnail)
                            {{-- thumbnail_path() declared in Post Model file --}}
                            <img src="{{ $post->thumbnail_path() }}" alt="thumbnail" class="rounded-circle mr-2" width="50" height="50">
                        @endif
                        
                        <a href="/posts/{{ $post->id }}"><strong>{{ $post->title }}</strong></a>
                    </div>

                    <div class="card-body">
                        {{ Illuminate\Support\Str::limit($post->body, 200) }}
                    </div>
                </div> 
            @endforeach
        </div>

        <div class="col-md-3">
            <div class="card">
                <div class="card-header">Category</div>

                <div class="card-body">
                    
                </div>
            </div>
        </div>
    </div>
@endsection

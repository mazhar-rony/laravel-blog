@extends('layouts.app')

@section('styles')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">Edit Post</div>

                <div class="card-body">
                    <form method="POST" action="/posts/{{ $post->id }}/edit">
                        @csrf
                        @method('patch')

                        <div class="form-group row">
                            <label for="title" class="col-md-2 col-form-label text-md-right">Title</label>

                            <div class="col-md-8">
                                <input id="title" type="text" 
                                class="form-control @error('title') is-invalid @enderror" 
                                name="title" 
                                value="{{ !empty(old('title')) ? old('title') : $post->title }}" >

                                @error('title')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="category" class="col-md-2 col-form-label text-md-right">Post Category</label>

                            <div class="col-md-8">
                                <select class="form-control @error('category') is-invalid @enderror" 
                                    name="category_id" id="category">
                                <option selected disabled>Select Category</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}" 
                                            @if ($post->category_id == $category->id)
                                                selected
                                            @endif>{{ $category->name }}</option>
                                    @endforeach
                                </select>  

                                @error('category')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="tag_id" class="col-md-2 col-form-label text-md-right">Post Tags</label>

                            <div class="col-md-8">
                                <select class="form-control @error('tag_id') is-invalid @enderror" 
                                    name="tag_id[]" id="tag_id" multiple>
                                {{--  <option selected disabled>Select Tags</option>  --}}
                                @foreach ($tags as $tag)
                                    <option value="{{ $tag->id }}" 
                                        @foreach ($post->tags as $selected)
                                            @if ($tag->id == $selected->id)
                                                selected
                                            @endif
                                        @endforeach>{{ $tag->name }}</option>
                                @endforeach
                                </select>  

                                @error('tag_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="body" class="col-md-2 col-form-label text-md-right">Body</label>

                            <div class="col-md-8">
                                <textarea class="form-control @error('body') is-invalid @enderror" 
                                name="body" id="body" rows="7">{{ !empty(old('body')) ? old('body') : $post->body }}</textarea>
                                
                                @error('body')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-2">
                                <button type="submit" class="btn btn-primary">
                                    Update Post
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>

    <script>
        $(function() {
            $('#tag_id').select2();
        });
    </script>
@endsection


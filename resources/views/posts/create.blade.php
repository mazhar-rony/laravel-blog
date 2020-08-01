@extends('layouts.app')

@section('styles')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.0.12/dist/css/select2.min.css" rel="stylesheet" />
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">Create New Post</div>

                <div class="card-body">
                    <form method="POST" action="/posts" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group row">
                            <label for="title" class="col-md-2 col-form-label text-md-right">Title</label>

                            <div class="col-md-8">
                                <input id="title" type="text" 
                                class="form-control @error('title') is-invalid @enderror" 
                                name="title" 
                                value="{{ old('title') }}" >

                                @error('title')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="category_id" class="col-md-2 col-form-label text-md-right">Post Category</label>

                            <div class="col-md-8">
                                <select class="form-control @error('category_id') is-invalid @enderror" 
                                    name="category_id" id="category_id">
                                <option selected disabled>Select Category</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                                </select>  

                                @error('category_id')
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
                                    <option value="{{ $tag->id }}">{{ $tag->name }}</option>
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
                            <label for="thumbnail" class="col-md-2 col-form-label text-md-right">Thumbnail</label>

                            <div class="col-md-8">
                                <input id="thumbnail" type="file" 
                                class="form-control @error('thumbnail') is-invalid @enderror" 
                                name="thumbnail" 
                                value="{{ old('thumbnail') }}" >

                                @error('thumbnail')
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
                                name="body" id="body" rows="7">{{ old('body') }}</textarea>
                                
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
                                    Create Post
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

    
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/select2@4.0.12/dist/js/select2.min.js"></script> 

    <script>
        $(function() {
            $('#tag_id').select2();
        });
    </script>

    {{-- Note: made changes in app.blade.php file to render select 2 changes are...
    From: <script src="{{ asset('js/app.js') }}" defer></script>
    To: <script src="{{ asset('js/app.js') }}"></script> --}}

@endsection
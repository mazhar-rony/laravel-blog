@extends('layouts.app')

@section('content')
<div class="container">

    @include('partials.success_message')

    <div class="row justify-content-center">
        <div class="col-md-9">
            
                <div class="card mb-5">
                    <div class="card-header">
                        <h4>Profile of: {{ $user->name }}</h4>
                    </div>

                    <div class="card-body">
                        <p>Email: {{ $user->email }}</p>
                        <p>Last Login: 
                            @if ($user->last_login)
                                {{ $user->last_login->diffForHumans() }}
                            @else 
                                No Login History Found 
                            @endif
                        </p>
                        <p>Date Of Birth: 
                            @if ($user->date_of_birth)
                                {{ $user->date_of_birth->format('d-m-Y') }}
                            @else 
                                Not Given Yet 
                            @endif
                        </p>
                        <p>Signup Date: {{ $user->created_at->format('d-m-Y') }}</p>
                    </div>
                </div> 

                <b>Posts By {{ $user->name }}</b>

                <hr>

                @forelse ($user->posts as $post)
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
                @empty 
                    <p>No Activity Found.</p>
                @endforelse
                
        </div>

        <div class="col-md-3">
            <div class="card">
                <div class="card-header">Profile Picture</div>

                <div class="card-body text-center">
                    {{-- profile_pic_path() declared in User Model file --}}
                    <img src="{{$user->profile_pic_path()}}" alt="User Profile Picture" class="img-fluid">

                    <a href="/profile/edit" class="btn btn-warning btn-sm mt-5">Edit Profile</a>
                </div>
            </div>
        </div>
    </div>
@endsection

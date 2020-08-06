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
                        <p>Last Login: {{ $user->last_login }}</p>
                        <p>Born: {{ $user->date_of_birth->diffForHumans() }}</p>
                        <p>Signup Date: {{ $user->created_at->format('d-m-Y') }}</p>
                    </div>
                </div> 
           
        </div>

        <div class="col-md-3">
            <div class="card">
                <div class="card-header">Profile Picture</div>

                <div class="card-body">
                    
                </div>
            </div>
        </div>
    </div>
@endsection

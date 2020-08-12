@extends('layouts.app')

@section('content')
<div class="container">

    @include('partials.success_message')

    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Post List</div>

                <div class="card-body">
                    <table class="table table-striped table-bordered">
                        <tr>
                            <th>Id</th>
                            <th>User Name</th>
                            <th>Email</th>
                            <th>Signup Date</th>
                            <th>Last Login</th>
                            <th>User Type</th>
                            <th colspan="3" class="text-center">Action</th>
                        </tr>
                        @forelse ($users as $user)
                            <tr>
                                 <td>{{ $user->id }}</td>
                                 <td>{{ $user->name }}</td>
                                 <td>{{ $user->email }}</td>
                                 <td>{{ $user->created_at->format('d-m-Y') }}</td>
                                 <td>{{ $user->last_login->diffForHumans() }}</td>
                                 <td>{{ $user->user_type }}</td>
                                 <td class="text-center"><a href="{{url('/users/'.$user->id.'/edit')}}" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i> Edit</a></td>
                                 <td class="text-center">
                                     <form action="/users/{{$user->id}}" method="POST">
                                         @csrf
                                         @method('delete')
 
                                         <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> Delete</button> 
                                 </td> 
                                 <td class="text-center">
                                </td>
                            </tr>
                        @empty
                         <tr>
                             <td colspan="5">Record not found.</td>
                         </tr
                        @endforelse
                    </table>
                    {{ $users->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection

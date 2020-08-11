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
                            <th>Title</th>
                            <th>Created At</th>
                            <th>Posted By</th>
                            <th colspan="3" class="text-center">Action</th>
                        </tr>
                        @forelse ($posts as $post)
                            <tr>
                                 <td>{{ $post->id }}</td>
                                 <td>{{ $post->title }}</td>
                                 <td>{{ $post->created_at->diffForHumans() }}</td>
                                 <td>Mazhar</td>
                                 <td class="text-center"><a href="{{url('/posts/'.$post->id.'/edit')}}" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i> Edit</a></td>
                                 <td class="text-center">
                                     <form action="/posts/{{$post->id}}" method="POST">
                                         @csrf
                                         @method('delete')
 
                                         <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> Delete</button> 
                                 </td> 
                                 <td class="text-center"><a href="{{url('/posts/'.$post->id.'/approve')}}" 
                                    class="btn {{ ($post->status == 1) ? 'btn-secondary' : 'btn-success' }} btn-sm">
                                    <i class="{{ ($post->status == 1) ? 'fa fa-close' : 'fa fa-check' }}"></i> 
                                    {{ ($post->status == 1) ? 'Disapprove' : 'Approve' }}</a>
                                </td>
                            </tr>
                        @empty
                         <tr>
                             <td colspan="5">Record not found.</td>
                         </tr
                        @endforelse
                    </table>
                    {{ $posts->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection

@extends('layouts.app')

@section('content')
<div class="container">

    @include('partials.success_message')

    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Category List</div>

                <div class="card-body">
                    <table class="table table-striped table-bordered">
                        <tr>
                            <th>Id</th>
                            <th>Category Name</th>
                            <th>Description</th>
                            <th colspan="2" class="text-center">Action</th>
                        </tr>
                        @forelse ($categories as $category)
                            <tr>
                                 <td>{{ $category->id }}</td>
                                 <td>{{ $category->name }}</td>
                                 <td>{{ $category->description }}</td>
                                 <td class="text-center"><a href="{{url('/categories/'.$category->id.'/edit')}}" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i> Edit</a></td>
                                 <td class="text-center">
                                     <form action="/categories/{{$category->id}}" method="POST">
                                         @csrf
                                         @method('delete')
 
                                         <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> Delete</button> 
                                 </td> 
                            </tr>
                        @empty
                         <tr>
                             <td colspan="4">Record not found.</td>
                         </tr
                        @endforelse
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

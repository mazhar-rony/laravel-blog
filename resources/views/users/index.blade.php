@extends('layouts.app')

@section('content')
<div class="container">

    @include('partials.success_message')

    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">User List</div>

                <div class="card-body">
                    <table class="table table-striped table-bordered">
                        <tr>
                            <th>Id</th>
                            <th>User Name</th>
                            <th>Email</th>
                            <th>Signup Date</th>
                            <th>Last Login</th>
                            <th>User Type</th>
                            <th colspan="2" class="text-center">Action</th>
                        </tr>
                        @forelse ($users as $user)
                            <tr>
                                 <td id="user_id">{{ $user->id }}</td>
                                 <td>{{ $user->name }}</td>
                                 <td>{{ $user->email }}</td>
                                 <td>{{ $user->created_at->format('d-m-Y') }}</td>
                                 <td>{{ $user->last_login->diffForHumans() }}</td>
                                 <td>
                                    {{--  @if ($user->user_type == 'admin')
                                        {{ "Admin" }}
                                    @elseif ($user->user_type == 'moderator')
                                        {{ "Moderator" }}
                                    @elseif ($user->user_type == 'user')
                                        {{ "User" }}
                                    @endif  --}}
                                    <select name="user_type" class="btn btn-secondary" id="userType">
                                        <option value="admin" @if ($user->user_type == 'admin') selected @endif>Admin</option>
                                        <option value="moderator" @if ($user->user_type == 'moderator') selected @endif>Moderator</option>
                                        <option value="user"  @if ($user->user_type == 'user')  selected @endif>User</option>
                                    </select>
                                 </td>
                                 <td class="text-center"><a href="{{url('/users/'.$user->id.'/edit')}}" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i> Edit</a></td>
                                 <td class="text-center">
                                     <form action="/users/{{$user->id}}" method="POST">
                                         @csrf
                                         @method('delete')
 
                                         <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> Delete</button> 
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

@section('scripts')
<script>
    $(function(){    

        $('#userType').on('change',function(){
            var getUserType = $(this).children("option:selected").val();
            //alert(getUserType);
            var user_id = $('#user_id').text();
            $.ajax({
                url: '/users/'+user_id,
                method: 'PATCH',
                data: getUserType,
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                success: function(res){
                    console.log(res, "success");                    
                    }
                    
                },

                error: function(res){
                    console.log(res);
                }
            });
        });
    });
</script>
@endsection

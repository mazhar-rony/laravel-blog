<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function index()
    {
        $users = User::paginate(10);

        return view('users.index', [
            'users' => $users
        ]);
    }

    public function update($id)
    {
        $user = User::find($id);

        $user->update([
            'user_type' => request('user_type')
        ]);

        return ['status' => true, 'message' => 'User Role Updated Successfully', 'data' => $user];
    }
}

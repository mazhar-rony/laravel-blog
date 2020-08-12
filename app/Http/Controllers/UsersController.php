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
}

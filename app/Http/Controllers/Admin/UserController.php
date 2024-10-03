<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{

    public function index()
    {
        // Code to list users
        $users = User::all();
        return view('admin.users', compact('users'));
    }

    public function destroy(User $user)
    {
        $user->delete(); // Delete the user
        return redirect()->route('users.index')->with('status', 'User deleted successfully');
    }
}

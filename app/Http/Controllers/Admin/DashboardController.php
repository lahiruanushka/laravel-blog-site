<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {
        // Fetch the count of users and posts
        $usersCount = User::count();
        $postsCount = Post::count();

        // Pass the counts to the dashboard view
        return view('admin.dashboard', compact('usersCount', 'postsCount'));
    }
}

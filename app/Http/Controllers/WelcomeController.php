<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post; // Ensure you have imported the Post model

class WelcomeController extends Controller
{
  public function index()
{
    $posts = Post::latest()->take(6)->get();
    return view('welcome', compact('posts'));
}

}

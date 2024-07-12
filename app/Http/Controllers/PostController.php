<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PostController extends Controller
{
    public function store(Request $request)
    {
        // $validatedData = $request->validate([
        //     'title' => 'required|string|max:255',
        //     'description' => 'required|string',
        // ]);

        $validator = Validator::make($request->all(),[
            'title' => 'required',
            'description' => 'required'
        ]);

        if ($validator->fails()) {
            return back()->with('status','something went wrong');
        }else{
            Post::create([
            'user_id' => auth()->user()->id,
            'title' => $request['title'],
            'description' => $request['description']
        ]);    
        }

        // return back()->with('status', 'Post created successfully!');
         return redirect()->route('posts.all')->with('status', 'Post created successfully!');
    }

    public function show($id)
    {
        $post = Post::findOrFail($id);
        return view('posts.show', compact('post'));
    }

    public function edit($postId)
    {
        $post = Post::findOrFail($postId);
        return view('posts.edit', compact('post'));
    }

    public function update($postId, Request $request)
    {
        //dd($request->all());

        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        $post = Post::findOrFail($postId);
        $post->update($validatedData);

        return redirect()->route('posts.all')->with('status', 'Post updated successfully!');
    }

   public function delete($postId)
{
    $post = Post::findOrFail($postId);
    $post->delete();

    return redirect()->route('posts.all')->with('status', 'Post deleted successfully!');
}

}

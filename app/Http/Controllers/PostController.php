<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function create(){
        return view('posts.create');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'thumbnail' => 'required|image'
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        // Create image name
        $imageName = time() . "." . $request->thumbnail->extension();
        $request->thumbnail->move(public_path('images/thumbnails'), $imageName);

        Post::create([
            'user_id' => auth()->user()->id,
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'thumbnail' => $imageName
        ]);

        return redirect()->route('posts')->with('status', 'Post created successfully!');
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
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'thumbnail' => 'nullable|image'
        ]);

        $post = Post::findOrFail($postId);

        // Update thumbnail if present
        if ($request->hasFile('thumbnail')) {
            // Delete the old thumbnail if necessary
            if ($post->thumbnail) {
                unlink(public_path('images/thumbnails/') . $post->thumbnail);
            }

            // Save the new thumbnail
            $imageName = time() . '.' . $request->thumbnail->extension();
            $request->thumbnail->move(public_path('images/thumbnails'), $imageName);
            $validatedData['thumbnail'] = $imageName;
        }

        $post->update($validatedData);

        return redirect()->route('posts.manage')->with('status', 'Post updated successfully!');
    }

    public function delete($postId)
    {
        $post = Post::findOrFail($postId);

        // Delete the thumbnail if necessary
        if ($post->thumbnail) {
            unlink(public_path('images/thumbnails/') . $post->thumbnail);
        }

        $post->delete();

        return redirect()->route('posts.manage')->with('status', 'Post deleted successfully!');
    }

    public function index()
    {
        $posts = Post::latest()->paginate(6);
        return view('posts.index', compact('posts'));
    }

     public function manage()
    {
        $posts = Post::where('user_id', Auth::user()->id)->get();
        return view('posts.manage', compact('posts'));
    }
}

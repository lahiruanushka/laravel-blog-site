@extends('layouts.frontend')
@section('content')

<main class="container">
    <div class="p-4 p-md-5 mb-4 text-white rounded bg-dark">
        <div class="col-md-6 px-0">
            <h1 class="display-4 fst-italic">Welcome to BlogNest</h1>
            <p class="lead my-3">Create Post and Publish</p>
       </div>
    </div>

<div class="row mb-2">
        @foreach($posts as $post)
            <div class="col-md-6">
                <div class="card mb-4 shadow-sm">
                    <div class="card-header">{{ $post->title }}</div>

                    <div class="card-body">
                        <p class="card-text">{{ \Illuminate\Support\Str::limit($post->description, 150) }}</p>
                        <div class="d-flex justify-content-between align-items-center">
                            <a href="{{ route('posts.show', $post->id) }}"> Continue reading</a>
                        </div>
                    </div>

                    <div class="card-footer">
                        <small class="text-muted">{{ $post->created_at->format('Y-m-d') }}</small>
                    </div>
                </div>
            </div>
        @endforeach
    </div>


</main>

@endsection
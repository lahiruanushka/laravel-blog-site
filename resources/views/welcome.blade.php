@extends('layouts.frontend')

@section('content')

<main class="container mt-5">
    <div class="p-5 mb-4 bg-light rounded-3">
        <div class="container-fluid py-5">
            <h1 class="display-4 fw-bold">Welcome to BlogNest</h1>
            <p class="col-md-8 fs-4">Create Post and Publish</p>
        </div>
    </div>

    @if($posts->count() > 0)
        <div class="row mb-4">
            @foreach($posts as $post)
                <div class="col-md-6">
                    <div class="card mb-4 shadow-sm h-100">
                        <img src="{{ asset('images/thumbnails/' . $post->thumbnail) }}" class="card-img-top" alt="{{ $post->title }}">
                        <div class="card-body">
                            <h5 class="card-title">{{ $post->title }}</h5>
                            <p class="card-text">{{ \Illuminate\Support\Str::limit($post->description, 150) }}</p>
                            <a href="{{ route('posts.show', $post->id) }}" class="btn btn-primary">Continue reading</a>
                        </div>
                        <div class="card-footer text-muted">
                            <small>{{ $post->created_at->format('Y-m-d') }}</small>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @else
        <div class="alert alert-info" role="alert">
            No posts available. Check back later!
        </div>
    @endif
</main>

@endsection

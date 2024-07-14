@extends('layouts.frontend')

@section('content')

<main class="container mt-5">
   <section class="py-5 bg-light mb-5">
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto text-center">
                <h1 class="display-4 fw-bold mb-4">Welcome to BlogNest</h1>
                <p class="lead mb-4">Create and Publish Your Posts</p>
                <a href="#" class="btn btn-primary btn-lg">Get Started</a>
            </div>
        </div>
    </div>
</section>


    @if($posts->count() > 0)
       <div class="row mb-4">
    @foreach($posts as $post)
        <div class="col-md-6 d-flex">
            <div class="card mb-4 shadow-sm h-100 " style="width: 24rem;" >
                <img src="{{ asset('images/thumbnails/' . $post->thumbnail) }}" class="card-img-top card-image" alt="{{ $post->title }}">
                <div class="card-body d-flex flex-column">
                    <h5 class="card-title text-primary font-weight-bold">{{ $post->title }}</h5>
                    <p class="card-text text-secondary">{{ \Illuminate\Support\Str::limit($post->description, 150) }}</p>
                    <div class="mt-auto">
                        <a href="{{ route('posts.show', $post->id) }}" class="btn btn-outline-primary btn-sm">Continue reading</a>
                    </div>
                </div>
                <div class="card-footer bg-transparent border-0">
                    <small class="text-muted">{{ $post->user->name }}</small>
                    <small class="text-muted">{{ $post->created_at->format('Y-m-d') }}</small>
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

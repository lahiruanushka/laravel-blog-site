@extends('layouts.app')

@section('content')

<main class="container mt-3">
@include('partials.hero');

    @if($posts->count() > 0)
       <div class="row mb-3">
    @foreach($posts as $post)
        <div class="col-md-6 d-flex">
            <div class="card m-4 shadow-sm h-100 " style="width: 24rem;" >
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

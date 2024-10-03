@extends('layouts.app')

@section('content')
    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow-sm">
                    <div class="card-header bg-primary text-white">
                        <h2 class="mb-0">{{ $post->title }}</h2>
                    </div>

                    <div class="card-body">
                        <p class="card-text">{{ $post->description }}</p>
                        <img class="img-fluid rounded mt-3" loading="lazy"
                            src="{{ asset('images/thumbnails/' . ($post->thumbnail ?? 'fallback.jfif')) }}"
                            alt="{{ $post->title }}">
                    </div>

                    <div class="card-footer bg-light text-muted d-flex justify-content-between align-items-center">
                        <small>Posted on: {{ $post->created_at->format('Y-m-d') }}</small>
                        <a href="{{ url()->previous() }}" class="btn btn-secondary btn-sm">Back</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@extends('layouts.app')

@section('content')
<div class="container m-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ $post->title }}</div>

                <div class="card-body">
                    <p>{{ $post->description }}</p>
                    <a href="{{ url()->previous() }}" class="btn btn-primary">Back</a>
                </div>

                <div class="card-footer">
                    <small class="text-muted">{{ $post->created_at->format('Y-m-d') }}</small>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

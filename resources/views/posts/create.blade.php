@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('New Post') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="post" action="{{ route('posts.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="postTitle" class="form-label">Post Title</label>
                            <input type="text" class="form-control" name="title" id="postTitle" placeholder="Enter Post Title" required>
                        </div>
                        <div class="mb-3">
                            <label for="postDescription" class="form-label">Post Description</label>
                            <textarea class="form-control" name="description" id="postDescription" rows="5" placeholder="Enter Your Description" required></textarea>
                        </div>
                        <div class=mb-3>
                            <input type="file" class="form-control" name="thumbnail">
                        </div>
                        <button type="submit" class="btn btn-primary">Post</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

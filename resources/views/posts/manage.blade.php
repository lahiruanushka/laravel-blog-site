@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Manage Posts</h2>
      @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
    <div class="table-responsive">
        <table class="table table-hover">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Title</th>
                    <th scope="col">Description</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($posts as $post)
                <tr>
                    <th scope="row">{{ $post->id }}</th>
                    <td>{{ $post->title }}</td>
                    <td style="word-wrap: break-word; max-width: 300px;">{{ $post->description }}</td>
                    <td>
                        <a href="{{route('posts.edit',$post->id)}}" class="btn btn-warning btn-sm">Edit</a>
                        <a href="{{route('posts.delete',$post->id)}}" class="btn btn-danger btn-sm">Delete</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection

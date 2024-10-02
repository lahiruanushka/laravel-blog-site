@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="mb-4">Manage Posts</h2>

    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif

    <div class="table-responsive">
        <table class="table table-hover">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Title</th>
                    <th scope="col">Description</th>
                    <th scope="col">Image</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($posts as $post)
                    <tr>
                        <th scope="row">{{ $post->id }}</th>
                        <td>{{ $post->title }}</td>
                        <td style="word-wrap: break-word; max-width: 300px;">{{ $post->description }}</td>
                        <td>
                            @if ($post->image)
                                <img src="{{ asset('storage/' . $post->image) }}" alt="Post Image" style="max-width: 100px; max-height: 100px; object-fit: cover;">
                            @else
                                <span>No Image</span>
                            @endif
                        </td>
                        <td>
    <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-warning btn-sm">Edit</a>
    <a href="#" class="btn btn-danger btn-sm" onclick="event.preventDefault(); confirmDelete('{{ route('posts.delete', $post->id) }}');">Delete</a>
    <form id="delete-form-{{ $post->id }}" action="{{ route('posts.delete', $post->id) }}" method="POST" style="display: none;">
        @csrf
        @method('DELETE')
    </form>
</td>

                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-center">No posts found</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection



<script>
    function confirmDelete(url) {
        if (confirm('Are you sure you want to delete this post?')) {
            document.getElementById('delete-form-' + url.split('/').pop()).submit();
        }
    }
</script>

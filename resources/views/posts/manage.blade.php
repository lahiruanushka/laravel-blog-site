@extends('layouts.app')

@section('content')
    <div class="container my-5">
        @if (Auth::user()->isAdmin())
            {{-- Admin view --}}
            <h2 class="mb-4">Manage All Posts</h2>
        @else
            {{-- Regular user view --}}
            <h2 class="mb-4">Manage Your Posts</h2>
        @endif

        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif

        <div class="table-responsive">
            <table class="table table-striped table-hover align-middle">
                <thead class="table-dark">
                    <tr>
                        <th scope="col">Title</th>
                        <th scope="col" style="max-width: 300px;">Description</th>
                        <th scope="col">Image</th>
                        @if (Auth::user()->isAdmin())
                            <th scope="col">Posted by</th>
                        @endif
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($posts as $post)
                        <tr>
                            <td>{{ $post->title }}</td>
                            <td style="word-wrap: break-word; max-width: 300px;">{{ $post->description }}</td>
                            <td>
                                @if ($post->thumbnail)
                                    <img class="img-fluid rounded" loading="lazy"
                                        src="{{ asset('images/thumbnails/' . $post->thumbnail) }}" alt="{{ $post->title }}"
                                        style="max-width: 100px; max-height: 100px; object-fit: cover;">
                                @else
                                    <span>No Image</span>
                                @endif
                            </td>

                            @if (Auth::user()->isAdmin())
                                <td>
                                    <small>{{ $post->user->name }}</small>
                                </td>
                            @endif
                            <td>
                                <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                <button class="btn btn-danger btn-sm"
                                    onclick="showDeleteModal({{ $post->id }})">Delete</button>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center">No posts found</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>

            {{-- Pagination Links --}}
            <div class="row justify-content-center mt-4">
                <div class="col-12">
                    <!-- Pagination Links -->
                    {{ $posts->links('pagination::bootstrap-4') }}
                </div>
            </div>
        </div>
    </div>

    <!-- Delete Confirmation Modal -->
    <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteModalLabel">Confirm Deletion</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Are you sure you want to delete this post?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <form id="delete-form" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

<script>
    function showDeleteModal(postId) {
        const form = document.getElementById('delete-form');
        form.action = `/posts/${postId}`;
        const modal = new bootstrap.Modal(document.getElementById('deleteModal'));
        modal.show();
    }
</script>

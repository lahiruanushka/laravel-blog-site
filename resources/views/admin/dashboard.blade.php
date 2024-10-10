@extends('layouts.app')

@section('content')
    <div class="container mt-5 mb-4">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow-sm">
                    <div class="card-header bg-dark text-white">
                        <h4 class="mb-0">{{ __('Dashboard') }}</h4>
                    </div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                {{ session('status') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @endif

                        <p class="fs-5">Hello, {{ auth()->user()->name }}!</p>
                    </div>

                    <div class="card-footer bg-light py-4">
                        <div class="row text-center">
                            <div class="col-md-6 mb-3 mb-md-0">
                                <div class="p-3 bg-white border rounded shadow-sm">
                                    <h5 class="fw-bold text-primary">Total Users</h5>
                                    <p class="display-6">{{ $usersCount }}</p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="p-3 bg-white border rounded shadow-sm">
                                    <h5 class="fw-bold text-primary">Total Posts</h5>
                                    <p class="display-6">{{ $postsCount }}</p>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection

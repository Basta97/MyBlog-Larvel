@extends('layouts.app')

@section('title', 'All Posts')

@section('content')
  <header class="mb-4">
    <h1 class="h3 mb-1">All Posts</h1>
    <p class="text-secondary">Latest thoughts and notes.</p>
  </header>

  @if ($posts->isEmpty())
    <div class="text-center py-5 empty-state">
      <i class="bi bi-inboxes display-3 d-block mb-3"></i>
      <h4 class="mb-2">No posts yet</h4>
      <p class="mb-4">Start by creating your first post.</p>
      <a class="btn btn-primary" href="{{ route('posts.create') }}">
        <i class="bi bi-plus-lg"></i> Create Post
      </a>
    </div>
  @else
    <div class="row g-4">
      @foreach ($posts as $post)
        <div class="col-12">
          <div class="card">
            <div class="card-body">
              <a href="{{ route('posts.show', ['id' => $post->id]) }}" class="text-decoration-none">
                <h5 class="card-title mb-1">{{ $post->title }}</h5>
              </a>
              <p class="text-secondary mb-2">
                <i class="bi bi-calendar-event me-1"></i>
                {{ $post->created_at->format('d M Y') }}
              </p>
              <p class="card-text mb-0">
                {{ \Illuminate\Support\Str::limit(strip_tags($post->content), 180) }}
              </p>
            </div>
          </div>
        </div>
      @endforeach
    </div>
  @endif
@endsection

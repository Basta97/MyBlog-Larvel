@extends('layouts.app')

@section('title', $post->title)

@section('content')
  <article class="card">
    <div class="card-body p-4">
      <h1 class="display-6 fw-bold mb-2">{{ $post->title }}</h1>
      <p class="text-secondary mb-4">
        <i class="bi bi-calendar-event me-1"></i>
        Published {{ $post->created_at->format('d M Y') }}
      </p>

      <div class="fs-5 lh-lg">
        {!! nl2br(e($post->content)) !!}
      </div>

      <hr class="my-4">
      <a href="{{ route('posts.index') }}" class="btn btn-outline-secondary">
        <i class="bi bi-arrow-left"></i> Back to Posts
      </a>
    </div>
  </article>
@endsection

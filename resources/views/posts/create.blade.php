@extends('layouts.app')

@section('title', 'Create Post')

@section('content')
  <div class="card">
    <div class="card-body p-4">
      <h1 class="h4 mb-3"><i class="bi bi-pencil-square me-2"></i>Create a Post</h1>
      <form action="{{ route('posts.store') }}" method="POST" class="needs-validation" novalidate>
        @csrf
        <div class="mb-3">
          <label for="title" class="form-label">Title</label>
          <input id="title" name="title" type="text" class="form-control" value="{{ old('title') }}" required maxlength="255" autofocus>
          <div class="invalid-feedback">Title is required.</div>
        </div>

        <div class="mb-3">
          <label for="content" class="form-label">Content</label>
          <textarea id="content" name="content" rows="8" class="form-control" required>{{ old('content') }}</textarea>
          <div class="invalid-feedback">Content is required.</div>
        </div>

        <div class="d-flex gap-2">
          <button type="submit" class="btn btn-primary">
            <i class="bi bi-save me-1"></i> Save
          </button>
          <a href="{{ route('posts.index') }}" class="btn btn-outline-secondary">Cancel</a>
        </div>
      </form>
    </div>
  </div>

  <script>
    (function () {
      const forms = document.querySelectorAll('.needs-validation');
      Array.from(forms).forEach(form => {
        form.addEventListener('submit', event => {
          if (!form.checkValidity()) { event.preventDefault(); event.stopPropagation(); }
          form.classList.add('was-validated');
        }, false);
      });
    })();
  </script>
@endsection

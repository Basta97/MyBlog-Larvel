<!DOCTYPE html>
<html lang="en" data-bs-theme="light">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>@yield('title', 'My Blog')</title>

  {{-- 1) Decide theme BEFORE CSS loads to prevent flash --}}
  <script>
    (function() {
      const stored = localStorage.getItem('theme');                       // "light" | "dark" | null
      const prefersDark = window.matchMedia('(prefers-color-scheme: dark)').matches;
      const theme = stored || (prefersDark ? 'dark' : 'light');
      document.documentElement.dataset.bsTheme = theme;                    // sets data-bs-theme on <html>
    })();
  </script>

  {{-- Bootstrap + Icons --}}
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

  @vite(['resources/css/app.css','resources/js/app.js'])

  <style>
    /* 2) Don't hard-code light colors; use Bootstrap variables */
    body { background: var(--bs-body-bg); color: var(--bs-body-color); }
    .navbar-brand { letter-spacing: .5px; font-weight: 700; }
    .card { border: 0; box-shadow: 0 6px 18px rgba(0,0,0,.06); transition: transform .2s ease; }
    .card:hover { transform: translateY(-2px); }
    .container-narrow { max-width: 980px; }
    .empty-state { opacity: .8; }
    footer { color: var(--bs-secondary-color); }
  </style>
</head>
<body>
  {{-- 3) Use contextual classes that adapt to theme --}}
  <nav class="navbar navbar-expand-lg bg-body-tertiary border-bottom sticky-top">
    <div class="container container-narrow">
      <a class="navbar-brand d-flex align-items-center gap-2" href="{{ route('posts.index') }}">
        <i class="bi bi-journal-richtext"></i> My Blog
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#nav">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div id="nav" class="collapse navbar-collapse">
        <ul class="navbar-nav ms-auto align-items-lg-center gap-lg-2">
          <li class="nav-item me-2">
            <button id="themeToggle" class="btn btn-outline-secondary btn-sm">
              <i id="themeIcon" class="bi"></i>
              <span class="ms-1 d-none d-sm-inline">Theme</span>
            </button>
          </li>
          <li class="nav-item">
            <a class="btn btn-primary" href="{{ route('posts.create') }}">
              <i class="bi bi-plus-lg"></i> New Post
            </a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <div class="container container-narrow py-3">
    @if(session('success'))
      <div class="alert alert-success alert-dismissible fade show" role="alert">
        <i class="bi bi-check-circle me-1"></i> {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
      </div>
    @endif

    @if ($errors->any())
      <div class="alert alert-danger">
        <strong>Fix the following:</strong>
        <ul class="mb-0 mt-2">
          @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
    @endif
  </div>

  <main class="container container-narrow py-4">
    @yield('content')
  </main>

  

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

  {{-- 4) Toggle logic + icon swap + persistence --}}
  <script>
    function setTheme(theme) {
      document.documentElement.dataset.bsTheme = theme;
      localStorage.setItem('theme', theme);
      const icon = document.getElementById('themeIcon');
      if (!icon) return;
      icon.className = 'bi ' + (theme === 'dark' ? 'bi-moon-stars' : 'bi-brightness-high');
    }

    // Initialize icon on load
    (function initThemeIcon() {
      const theme = document.documentElement.dataset.bsTheme || 'light';
      const icon = document.getElementById('themeIcon');
      if (icon) icon.className = 'bi ' + (theme === 'dark' ? 'bi-moon-stars' : 'bi-brightness-high');
    })();

    document.getElementById('themeToggle')?.addEventListener('click', () => {
      const current = document.documentElement.dataset.bsTheme;
      setTheme(current === 'dark' ? 'light' : 'dark');
    });

    // Optional: keep in sync with system changes when user hasn't chosen manually
    window.matchMedia('(prefers-color-scheme: dark)').addEventListener('change', e => {
      if (!localStorage.getItem('theme')) {
        setTheme(e.matches ? 'dark' : 'light');
      }
    });
  </script>
</body>
</html>

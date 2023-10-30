<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>{{ config('app.name', 'Laravel')}}</title>
  @vite(['resources/scss/app.scss', 'resources/js/app.js'])
</head>

<body>
  <nav class="navbar bg-body-tertiary shadow-sm sticky-top">
    <div class="container">
      <a class="navbar-brand mx-auto" href="{{ url('/') }}">
        {{ config('app.name', 'Laravel') }}
      </a>
    </div>
  </nav>
  <main id="app" class="container py-5">
    @yield('content')
  </main>

  <x-messages />
</body>

</html>
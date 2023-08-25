<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
  <title>ZUG Biuro</title>
</head>
<body class="d-flex flex-column h-100">
  <x-flash-message/>
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
      <a class="navbar-brand mb-0 h1" href="/">ZUG Gmina Ełk</a>
      @auth
      <p class="text-muted mb-0" href="/">Witaj {{ auth()->user()->name}}</p>
      @endauth
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
        <ul class="navbar-nav">
          @auth
          <li class="nav-item">
            <a class="nav-link me-3 fs-5" aria-current="page" href="/"><i class="bi bi-clipboard2-fill pe-1"></i>Reklamacje</a>
          </li>
          <li class="nav-item">
            <a class="nav-link me-3 fs-5" href="/complain/create"><i class="bi bi-clipboard2-plus-fill pe-1"></i>Dodaj reklamację</a>
          </li>
          <li class="nav-item">
            <form method="POST" action="/logout">
              @csrf
              <button type="submit" class="nav-link me-3 fs-5">
                <i class="bi bi-box-arrow-in-right pe-1"></i>Wyloguj
              </button>
            </form>
          </li>
          @else
          <li class="nav-item">
            <a class="nav-link fs-5" href="/login"><i class="bi bi-arrow-right-square-fill pe-1"></i>Login</a>
          </li>
          <li class="nav-item">
            <a class="nav-link fs-5" href="/register"><i class="bi bi-arrow-right-square-fill pe-1"></i>Rejestracja</a>
          </li>
          @endauth
        </ul>
      </div>
    </div>
  </nav>

  @yield('content')
  @include('partials._footer')
  @include('partials._jsfile')
</body>
</html>

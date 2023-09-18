<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <!-- Grey with black text -->
<nav class="navbar navbar-expand-sm bg-primary navbar-primary">
    <div class="container-fluid">
      <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link text-white active" href="{{ route('fooldal') }}">Lista</a>
        </li>
        <li class="nav-item">
            <a class="nav-link text-white active" href="{{ route('felvetel') }}">Felvétel</a>
        </li>
      </ul>
    </div>
  </nav>

  @yield('content')

  <footer class="container-fluid bg-dark text-white">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="p-5">
                    Lábléc
                </div>
            </div>
        </div>
    </div>
  </footer>
  
</body>
</html>
<!doctype html>
<html lang="en">
  <head>
    <title>@yield('title')</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <!-- Datatable CSS -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/app.css')}}">
    <!-- jquery -->
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>

    @stack('head')
  </head>
  <body>
    <nav class="navbar navbar-dark bg-dark custom-nav mb-5">
      <h5>The Remote Company</h5>
      <a class="nav-link ml-5" href="{{ route('key.index') }}">API Keys</a>
      <a class="nav-link" href="{{ url('/subscribers') }}">Subscribers</a>
    </nav>

    <div class="container">
      @yield('content')
    </div>

    
    <!-- Datatable JS -->
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.js"></script>
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
  </body>
</html>
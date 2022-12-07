<!doctype html>
<html lang="en" class="h-100">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
  <meta name="generator" content="Hugo 0.84.0">
  <title>Cover Template · Bootstrap v5.0</title>

  @vite(['resources/sass/app.scss', 'resources/js/app.js'])

  <!-- Bootstrap core CSS -->


  <style>
    .bd-placeholder-img {
      font-size: 1.125rem;
      text-anchor: middle;
      -webkit-user-select: none;
      -moz-user-select: none;
      user-select: none;
    }

    @media (min-width: 768px) {
      .bd-placeholder-img-lg {
        font-size: 3.5rem;
      }
    }

    /*
 * Globals
 */


    /* Custom default button */
    .btn-secondary,
    .btn-secondary:hover,
    .btn-secondary:focus {
      color: #333;
      text-shadow: none;
      /* Prevent inheritance from `body` */
    }


    /*
 * Base structure
 */

    body {
      text-shadow: 0 .05rem .1rem rgba(0, 0, 0, .5);
      box-shadow: inset 0 0 5rem rgba(0, 0, 0, .5);
    }

    .cover-container {
      max-width: 42em;
    }


    /*
 * Header
 */

    .nav-masthead .nav-link {
      padding: .25rem 0;
      font-weight: 700;
      color: rgba(255, 255, 255, .5);
      background-color: transparent;
      border-bottom: .25rem solid transparent;
    }

    .nav-masthead .nav-link:hover,
    .nav-masthead .nav-link:focus {
      border-bottom-color: rgba(255, 255, 255, .25);
    }

    .nav-masthead .nav-link+.nav-link {
      margin-left: 1rem;
    }

    .nav-masthead .active {
      color: #fff;
      border-bottom-color: #fff;
    }
  </style>


  <!-- Custom styles for this template -->
  <link href="cover.css" rel="stylesheet">
</head>

<body class="d-flex h-100 text-center text-white bg-dark">

  <div class="cover-container d-flex w-100 h-100 p-3 mx-auto flex-column">
    <header class="mb-auto">
      <div>
        <h3 class="float-md-start mb-0">Galeria</h3>
        <nav class="nav nav-masthead justify-content-center float-md-end">

          @if (Route::has('login'))
            @auth
            <a href="{{ url('/home') }}" class="nav-link active"  href="#">Home</a>
            @else
            <a href="{{ route('login') }}" class="nav-link" href="#">Log in</a>

            @if (Route::has('register'))
            <a  href="{{ route('register') }}" class="nav-link" href="#">Register</a>
            @endif
            @endauth
          @endif
        </nav>
      </div>
    </header>

    <main class="px-3">
      <h1>Galeria de Fotos.</h1>
      <p class="lead">Esta es mi galeria de fotos para ingresar presiona Login y si eres un usuario nuevo presiona Register.</p>
      <p class="lead">
        Bienvenido
      </p>
    </main>

    <footer class="mt-auto text-white-50">
      <p>Galeria de Fotos <a href="https://getbootstrap.com/" class="text-white">Laravel</a>, by <a href="https://twitter.com/mdo" class="text-white">@TECSUP</a>.</p>
    </footer>
  </div>



</body>

</html>
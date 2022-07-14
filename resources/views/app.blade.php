<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Immob') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- CSS only -->
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">


    @yield('css')

</head>
<body>
    <div id="app" class="bg-light">
        <nav class="navbar navbar-expand-md navbar-light bg-gradient shadow">
        <div class="container ">
            <a class="navbar-brand text-primary" style="font-size: 40px" href="/immob">
            Immob'
            </a>

            <ul class="navbar-nav me-auto">
                <li class="nav-item">
                <a class="nav-link" href="{{route('offre.index')}}">Creer une offre</a>
                </li>

                <li class="nav-item">
                <a class="nav-link" href="{{route('demande.index')}}">Creer une demande</a>
                </li>
            </ul> 

            <ul class="navbar-nav ml-auto">
                <!-- Authentication Links -->
                @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li>
                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                    @endif
                @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endguest
            </ul>
        </div>
        </nav>

        <main class="py-4">
          <div class="container">
          @if(session()->has('success'))
                <div class="alert alert-success">
                {{ session()->get('success')}}
                </div>
            @endif

            @if(session()->has('error'))
                <div class="alert alert-danger">
                {{ session()->get('error')}}
                </div>
            @endif
          </div>

          
          @yield('content')
   
        </main>
    </div>
</body>

 <!-- Scripts -->
 <script src="{{ asset('js/app.js') }}"></script>

@yield('scripts')
</html>

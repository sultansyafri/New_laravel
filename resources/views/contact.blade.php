<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Back') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                    

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif
                            
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else

                            <li><a class="nav-link" href="/donate">Donate</a></li>
                            <li><a class="nav-link" href="/community">Community</a></li>
                            <li><a class="nav-link" href="/about">About us</a></li>
                            <li><a class="nav-link" href="/contact">Contact us</a></li>

                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

        

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>

<!-- Contact-->
       
        <link href="css/styles.css" rel="stylesheet" />
        <div class="row justify-content-center">
    <div class="col-xl-8 col-lg-8">
        <div class="login-form">
            <form method="POST" action="{{ route('addContact') }}" enctype="multipart/form-data">
                @csrf
                <div class="row">

                    <div class="col-6">
                        <div class="form-group">
                            <label for="name" class="col-form-label text-md-right">{{ __('Full Name') }}</label>

                            <input type="text" class="form-control @error('fullname') is-invalid @enderror" name="fullname" value="{{ isset(Auth::user()->firstname) ? Auth::user()->firstname : '' }} {{ isset(Auth::user()->lastname) ? Auth::user()->lastname : '' }}" required autocomplete="Fullname" autofocus>

                            @error('fullname')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    
                    <div class="col-6">

                        <div class="form-group">
                            <label for="email" class="col-form-label text-md-right">{{ __('Email Address') }}</label>

                            <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ isset(Auth::user()->email) ? Auth::user()->email : '' }}" required autocomplete="email" autofocus>

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    
                    </div>

                    <div class="col-6">
                        
                        <div class="form-group">
                            <label for="name" class="col-form-label text-md-right">{{ __('Phone Number') }}</label>

                            <input type="text" class="form-control @error('phone_number') is-invalid @enderror" name="phone_number" value="{{ isset(Auth::user()->phone_number) ? Auth::user()->phone_number : '' }}" required autocomplete="phone_number" autofocus>

                            @error('phone_number')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="col-6">
                
                    
                        <div class="form-group">
                            <label for="name" class="col-form-label text-md-right">{{ __('Subject') }}</label>

                            <input type="text" class="form-control @error('subject') is-invalid @enderror" name="subject" required autofocus>

                            @error('subject')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="col-6">
                        <div class="form-group">

                            <label for="password" class="col-form-label text-md-right">{{ __('Message') }}</label>

                            <textarea class="form-control @error('message') is-invalid @enderror" name="message" required></textarea>

                            @error('message')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="col-6">
                
                        <div class="form-group">
                            <label for="name" class="col-form-label text-md-right">{{ __('Attach Screenshot') }}</label>

                            <input type="file" accept="image/*" class="form-control @error('screenshot') is-invalid @enderror" name="screenshot" autofocus>

                        </div>
                    </div>
                </div>

                <div class="form-group row mb-0">
                    <div class="col-md-6 offset-md-4">
                        <button type="submit" class="btn btn-primary">
                            {{ __('Send Message') }}
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
</body>
        </section>

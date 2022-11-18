
@php
    $languages = ['en','ar'];
    $locale = session()->get('locale');
@endphp

<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-textdirection="{{App::isLocale('ar') ? 'rtl': 'ltr' }}">
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

    @if(App::isLocale('en'))
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    @else
    <link href="{{ asset('css/app-rtl.css') }}" rel="stylesheet">
    @endif
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ __('main.'.config('app.name', 'Laravel') ) }}
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">


                      @foreach($languages as $lang)
                      @if($lang != $locale)
                       <li class="nav-item">
                         <a class="btn btn-default btn-doc-header" href="{{url('lang',$lang)}}" >
                           <img style="width: 30px;margin: 0px 3px;border-radius: 38%;" 
                             src="{{asset($lang == 'ar' ? 'app-assets/images/flags/egypt.svg' : 'app-assets/images/flags/united-states.svg')}}">
                              {{$lang}}
                         </a>
                       </li>
                       @endif
                     @endforeach
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ url('login/admin') }}">{{ __('main.login_admin') }}</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ url('login/user') }}">{{ __('main.login_user') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ url('register/new/user') }}">{{ __('main.register') }}</a>
                                </li>
                            @endif
                            
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                    
                                    @if(auth('admin')->check())
                                    <a href="{{ route('logout','admin') }}">
                                        {{__('main.logout')}}
                                    </a>
                                    @else
                                    <a href="{{ route('logout','web') }}">
                                        {{__('main.logout')}}
                                    </a>
                                    
                                    @endif
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>@yield('page-title') | {{ config('app.name', 'Laravel') }}</title>

        <!-- Font -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;0,1000;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900;1,1000&display=swap" rel="stylesheet">
        
        
        <!-- Scripts -->
        <link

            rel="stylesheet"

            type="text/css"

            href="https://api.tomtom.com/maps-sdk-for-web/cdn/plugins/SearchBox/3.1.3-public-preview.0/SearchBox.css"

            />

            <script src="https://api.tomtom.com/maps-sdk-for-web/cdn/6.x/6.1.2-public-preview.15/services/services-web.min.js"></script>

            <script src="https://api.tomtom.com/maps-sdk-for-web/cdn/plugins/SearchBox/3.1.3-public-preview.0/SearchBox-web.js"></script>
        @vite('resources/js/app.js')
        <script src="https://js.braintreegateway.com/web/dropin/1.40.2/js/dropin.js"></script>
    </head>
    <body>     
        <main>
            <div class="main-section d-flex">
                <div>
                    <img src="{{ Vite::asset('resources/img/big_logo_meglio.png') }}" alt="" class="img-back d-none d-lg-block">
                </div>
                <aside class="vh-100">
                    <div>
                        <img src="{{ Vite::asset('resources/img/astro_blu.png') }}" alt="" class="astro-img">
                    </div> 
                    <div class="text-center py-5 fs-4 logo-aside">
                        <a href="{{ route('admin.dashboard') }}">
                            <img src="{{ Vite::asset('resources/img/logo_ultimate.png') }}" alt="" class="img-fluid">
                        </a>
                    </div>
                    <div class="aside-links mx-0 mx-sm-3 my-5">
                        <h3 class="menu-title d-none d-sm-block">
                            MENU
                        </h3>
                        <ul>
                            <li>
                                <a href="{{ route('admin.apartment.index') }}">
                                    <p class="all-ap-asidetext">
                                        I tuoi appartamenti
                                    </p>
                                    <img src="{{ Vite::asset('resources/img/logo_app_plus.png') }}" alt="" class="img-fluid icon-all-ap-aside">
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('admin.apartment.create') }}">
                                    <p class="new-ap-asidetext">
                                        Inserisci appartamento
                                    </p>
                                    <img src="{{ Vite::asset('resources/img/icon_add_ap.png') }}" alt="" class="img-fluid icon-add-ap-aside">
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('admin.message.index') }}">
                                    <p class="messages-asidetext">
                                        Messaggi
                                    </p>
                                    <img src="{{ Vite::asset('resources/img/logo_messaggi.png') }}" alt="" class="img-fluid icon-messages-aside">
                                </a>                             
                            </li>
                            <li> 
                                <a class="" href="{{ route('admin.dashboard') }}">
                                    <p class="stats-asidetext">
                                        Statistiche
                                    </p>
                                    <img src="{{ Vite::asset('resources/img/icon_stat.png') }}" alt="" class="img-fluid icon-stats-aside">
                                </a>    
                            </li>
                        </ul>
                    </div>
                </aside>
    
                <div class="main-container">
                    <div class="main-header d-flex justify-content-between align-items-center py-4 shadow px-5 mb-5 bg-body-tertiary">
                        <div class="col-4 d-none d-md-inline">
                        </div>
                        <div class="logo-complete col-4 text-center">
                            <img src="{{ Vite::asset('resources/img/logo_giusto.png') }}" alt="" class="img-fluid">
                        </div>
                        <div class="col-4 text-end d-flex justify-content-end align-items-center">
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="btn btn-logout">
                                    <div class="d-flex align-items-center fw-bold">
                                        <div class="text-out-lg">
                                            Log Out
                                        </div>
                                        <div class="icon-out-lg">
                                            <img src="{{ Vite::asset('resources/img/user_icon.png') }}" alt="" class="user-logo img-fluid d-line"> 
                                        </div>                                           
                                    </div>
                                    <div class="icon-out-sm">
                                        <img src="{{ Vite::asset('resources/img/icon_out.png') }}" alt="" class="user-logo img-fluid d-line icon-out">
                                    </div>
                                </button>
                            </form>
                            <a href="http://localhost:5174/" class="ms-2 to-vue">
                                <div class="text-out-lg btn btn-logout">
                                    Vai al sito
                                </div>
                            </a>
                        </div>
                    </div>
                    
                    
                    <div class="container mt-4">
                        @yield('main-content')
                    </div>
                </div>
            </div>
        </main>
    </body>
</html>

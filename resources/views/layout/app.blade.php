<!doctype html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>bob</title>
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.3.4/dist/leaflet.css"
          integrity="sha512-puBpdR0798OZvTTbP4A8Ix/l+A4dHDD0DGqYW6RQ+9jxkRFclaxxQb/SJAWZfWAkuyeQUytO7+7N4QKrDh+drA=="
          crossorigin=""/>
    <script src="https://unpkg.com/leaflet@1.3.4/dist/leaflet.js"
            integrity="sha512-nMMmRyTVoLYqjP9hrbed9S+FzjZHW5gY1TWCHA5ckwXZBadntCNs8kEqAWdrb9O7rxbCaA4lKTIWjDXZxflOcA=="
            crossorigin=""></script>
    <link href="https://fonts.googleapis.com/css?family=Montserrat|Roboto" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <script src="{{asset('leaflet/script.js')}}"></script>
    <script src="{{asset('js/bibliAjax.js')}}"></script>
</head>

<body>
    <header>
        <a href="{{route('home')}}"> <img src="{{asset('img/logo.png')}}"> </a>
        <nav class="nav-desk">
            <ul>
                <li><a href="{{route('home')}}">Accueil</a></li>
                <li><a href="">Nous rejoindre</a></li>
                <li><a href="">FAQ</a></li>
                <li><a href="">Nous contacter</a></li>
            </ul>
            <ul>
                <!-- Authentication Links -->
                @guest
                    <li><a class="btn-inscription" href="{{ route('register') }}">Inscription</a></li>
                    <li><a class="btn1" href="{{ route('login') }}">Connexion</a></li>
                @else
                    <li class="dropdown">
                        {{--<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true" v-pre>
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>--}}

                        <ul class="dropdown-menu">
                            <li>
                                <a class="btn-inscription" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    Deconnexion
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </li>
                        </ul>
                    </li>
                @endguest
            </ul>
        </nav>
        <nav class="nav-phone">
            <a onclick="afficheMenu()" style="font-size: xx-large; float: right">&#8801;</a>
            <ul class="hidden2" id="hidden2">
                <li><a href="{{route('home')}}">Accueil</a></li>
                <li><a href="">Nous rejoindre</a></li>
                <li><a href="">FAQ</a></li>
                <li><a href="">Nous contacter</a></li>
                @guest
                    <li><a class="btn-inscription" href="{{ route('register') }}">Inscription</a></li>
                    <li><a class="btn-inscription" href="{{ route('login') }}">Connexion</a></li>
                @else
                    <li>
                        <a class="btn-inscription" href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                            Deconnexion
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                    </li>
                @endguest
            </ul>
        </nav>
        <script>
            function afficheMenu(){
                if (document.getElementById('hidden2').style.display === "none") {
                    document.getElementById('hidden2').style.display = "flex";
                }
                else {
                    document.getElementById('hidden2').style.display = "none";
                }
            }
        </script>
    </header>

    @yield('content')

    <footer>
        <div class="bloc-footer">
            <ul>
                <li>Accueil</li>
                <li>Nous rejoindre</li>
                <li>FAQ</li>
                <li>Contact</li>
            </ul>
            <ul>
                <li>Connexion</li>
                <li>Inscription</li>
                <li>Mentions légales</li>
            </ul>
        </div>
        <p>© Progeo 2019 | Créer par Sahaquedo</p>
    </footer>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
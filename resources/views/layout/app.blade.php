<!doctype html>
<html lang="fr">
<head>
    <meta charset="utf-8">
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
    <script src="{{asset('leaflet/bibliAjax.js')}}"></script>
</head>

<body>
    <header>
        <img src="{{asset('img/logo.png')}}">
        <nav>
            <ul>
                <li><a href="">Accueil</a></li>
                <li><a href="">Nous rejoindre</a></li>
                <li><a href="">FAQ</a></li>
                <li><a href="">Nous contacter</a></li>
            </ul>
            <ul>
                <li><a class="btn-inscription" href="{{ route('register') }}">Inscription</a></li>
                <li><a class="btn1" href="{{ route('login') }}">Connexion</a></li>
            </ul>
        </nav>
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

</body>
</html>
<!doctype html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <title>ProGEO</title>
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.3.4/dist/leaflet.css"
          integrity="sha512-puBpdR0798OZvTTbP4A8Ix/l+A4dHDD0DGqYW6RQ+9jxkRFclaxxQb/SJAWZfWAkuyeQUytO7+7N4QKrDh+drA=="
          crossorigin=""/>
    <script src="https://unpkg.com/leaflet@1.3.4/dist/leaflet.js"
            integrity="sha512-nMMmRyTVoLYqjP9hrbed9S+FzjZHW5gY1TWCHA5ckwXZBadntCNs8kEqAWdrb9O7rxbCaA4lKTIWjDXZxflOcA=="
            crossorigin=""></script>
    <script src="script.js"></script>
    <script src="bibliAjax.js"></script>
</head>
<style>
    #map {
        margin-top: 50px;
        height: 400px;
    }
</style>

<body>

<input id="city" list="cities">
<datalist id="cities"></datalist>

<div id="map"></div>

<script type="text/javascript">
    var map = null;
    var lat = 44.5667;
    var lon = 6.0833;

    window.onload = function () {
        // Fonction d'initialisation qui s'exécute lorsque le DOM est chargé
        initMap();
        createList();
    };
</script>
</body>
</html>
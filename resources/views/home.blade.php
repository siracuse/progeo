@extends('layout.app')

@section('css')
    <style>
        #map {
            margin-top: 50px;
            height: 800px;
        }
    </style>
@endsection

@section('content')
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
@endsection

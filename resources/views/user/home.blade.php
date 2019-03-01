@extends('layouts.user')

@section('css')
    <style>
        #map {
            margin-top: 50px;
            height: 500px;
        }
    </style>
@endsection

@section('content')
    <input id="city" list="cities">
    <datalist id="cities"></datalist>

    <select id="category">
        <option value="choisir" selected="selected">Choisir...</option>;
    </select>



    <div id="map"></div>

    <script type="text/javascript">
        var map = null;
        var lat = 44.5667;
        var lon = 6.0833;

        //declaration routes
        var rt_search_cities = '{{ route('cities_search_post')}}';
        var rt_search_stores = '{{ route('stores_search_post')}}';
        var token = '{{csrf_token()}}';

        window.onload = function () {
            // Fonction d'initialisation qui s'exécute lorsque le DOM est chargé
            initMap();
            createList();
        };
    </script>
@endsection

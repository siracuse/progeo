@extends('layout.app')

@section('content')

    <div class="container--map">
        <div class="barre"></div>
        <img class="icon-triangle" src="{{asset('img/sort-down.svg')}}">
        <div id="map"></div>

        <div class="bloc-search">
            <input placeholder="Ville.." id="city" list="cities">
            <datalist id="cities"></datalist>

            <select id="category">
                <option value="choisir" selected="selected">Catégorie...</option>;
            </select>
            <select id="subCategory">
                <option value="choisir" selected="selected">Sous catégorie...</option>;
            </select>
        </div>
    </div>

    <img class="commercant" src="{{asset('img/commercant.png')}}">

    <div class="container">
        <h2 class="center title-avantage">Pourquoi devenir hôte chez Progeo ?</h2>

        <div class="bloc-avantage">
            <img class="photo-avantage" src="{{asset('img/gap.jpg')}}">
            <div class="full">
                <div class="avantage">
                    <img class="check" src="{{asset('img/success.svg')}}">
                    <p>Attirez des clients par milliers et vendez plus !</p>
                </div>
                <div class="avantage">
                    <img class="check" src="{{asset('img/success.svg')}}">
                    <p>Attirez des clients par milliers et vendez plus !</p>
                </div>
                <div class="avantage">
                    <img class="check" src="{{asset('img/success.svg')}}">
                    <p>Attirez des clients par milliers et vendez plus !</p>
                </div>
                <div class="avantage">
                    <img class="check" src="{{asset('img/success.svg')}}">
                    <p>Attirez des clients par milliers et vendez plus !</p>
                </div>
                <div class="avantage">
                    <img class="check" src="{{asset('img/success.svg')}}">
                    <p>Attirez des clients par milliers et vendez plus !</p>
                </div>
            </div>
        </div>
    </div>

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

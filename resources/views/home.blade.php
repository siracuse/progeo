@extends('layout.app')

@section('content')

    <div class="container--map">
        <div class="barre"></div>
        <img class="icon-triangle" src="{{asset('img/sort-down.svg')}}">
        <div id="map"></div>

        <div class="bloc-search">
            <h2>Cherchez des promotions dans toute la france !</h2>
            <div id="info_promo"></div>
            <input placeholder="Ville.." id="city" list="cities">
            <datalist id="cities"></datalist>

            <select class="select-category" id="category">
                <option value="choisir" selected="selected">Catégorie...</option>;
            </select>

            <a class="btn1" onclick="geolocalisation()">Ma position</a>
            {{--<select id="subCategory">--}}
                {{--<option value="choisir" selected="selected">Sous catégorie...</option>;--}}
            {{--</select>--}}
        </div>
        <img id="map-btn" class="check switch-map" src="{{asset('img/eye.svg')}}">
    </div>

    <img class="commercant" src="{{asset('img/commercant.png')}}">

    <div class="container" id="nous_rejoindre">
        <h2 class="center title-avantage">Pourquoi devenir hôte chez Progeo ?</h2>

        <div class="bloc-avantage">
            <img class="photo-avantage" src="{{asset('img/gap.jpg')}}">
            <div class="full">
                <div class="avantage">
                    <img class="check" src="{{asset('img/success.svg')}}">
                    <p>Attirez des nouveaux clients et vendez plus !</p>
                </div>
                <div class="avantage">
                    <img class="check" src="{{asset('img/success.svg')}}">
                    <p>Faire découvrir de nouveaux produits aux clients !</p>
                </div>
                <div class="avantage">
                    <img class="check" src="{{asset('img/success.svg')}}">
                    <p>Liquider les stocks en faisant profiter les internautes grâce aux promos !</p>
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
        var rt_search_categories = '{{ route('categories_search_post') }}';
        var rt_search_subcategories = '{{ route('subcategories_search_post') }}';
        var token = '{{csrf_token()}}';
        var view = 'home';

        window.onload = function () {
            // Fonction d'initialisation qui s'exécute lorsque le DOM est chargé
            initMap();
            createList();
        };

        document.getElementById("map-btn").onclick = mapNone;
        document.getElementById("map").style.display = 'block';

        function mapNone() {
            if (document.getElementById("map").style.display === 'block') {
                document.getElementById("map").style.display = 'none';
                console.log('ok');
            } else {
                document.getElementById("map").style.display = 'block';
            }

        }


    </script>
@endsection

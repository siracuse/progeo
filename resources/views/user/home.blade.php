@extends('layout.user')


@section('content')
    <div class="container--map">
        <div class="barre"></div>
        <img class="icon-triangle" src="{{asset('img/sort-down.svg')}}">
        <div id="map"></div>

        <div class="bloc-search">
            <div id="info_promo"></div>
            <input placeholder="Ville.." id="city" list="cities">
            <datalist id="cities"></datalist>

            <select id="category">
                <option value="choisir" selected="selected">Catégorie...</option>;
            </select>
            {{--<select id="subCategory">--}}
                {{--<option value="choisir" selected="selected">Sous catégorie...</option>;--}}
            {{--</select>--}}
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
        var rt_getPromotionCode = '{{route('user_promotion_post')}}';
        var view = 'user/home';

        var token = '{{csrf_token()}}';

        window.onload = function () {
            // Fonction d'initialisation qui s'exécute lorsque le DOM est chargé
            initMap();
            createList();
        };

    </script>

    <div class="container">
        <div class="mes_infos">
            <ul>
                <li ><a class="favoris" href="{{route('user_favoris')}}">Mes favoris</a></li>
                <li ><a class="promotions" href="{{route('user_codePromo')}}">Mes promotions</a></li>
                <li ><a class="avis" href="">Mes avis</a></li>
            </ul>
        </div>

        <div class="content">
            @yield('mes_infos')
        </div>
    </div>
@endsection

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

            <select class="select-category" id="category">
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
                <li id="button_favoris"><a class="favoris" onclick="afficheFavoris()" onmouseover="this.style.cursor='pointer'">Mes favoris</a></li>
                <li id="button_promo"><a class="promotions" onclick="affichePromos()" onmouseover="this.style.cursor='pointer'">Mes promotions</a></li>
                <li ><a class="avis" href="">Mes avis</a></li>
            </ul>
        </div>

        <div class="content">
            <div id="promos" class="flex-mes-infos">
                @foreach($promos as $promo)

                    <ul>
                        <li class="store-promo">{{$promo->store_name}}<img class="star" src="{{asset('img/tag.svg')}}"/></li>
                        <li class="name-promo">Nom : {{$promo->promo_name}}</li>
                        <li class="code-promo">Code : {{$promo->promotionCode}}</li>
                        <li class="date-promo"><img src="{{asset('img/calendar.svg')}}"/>Du {{date('d-m-Y', strtotime($promo->startDate))}} </li>
                        <li class="date-fin-promo">Au {{date('d-m-Y', strtotime($promo->endDate))}}</li>
                        <li><a class="btn-inscription" href="{{url ('user/codePromo',
                    ['store_id' => $promo->store_id, 'user_id' => $promo->user_id, 'promo_id' => $promo->promo_id]
                    )}}">
                                Retirer</a>
                        </li>
                    </ul>
                @endforeach
            </div>
            <div id="favoris" class="flex-mes-infos">
                @foreach($favoris as $favori )
                    <ul>
                        <li class="store-promo">{{$favori->store_name}} <img class="star" src="{{asset('img/star.svg')}}"/></li>
                        <li class="name-promo">{{$favori->address}}</li>
                        <li class="code-promo">{{$favori->postalCode}} {{$favori->city_name}}</li>
                        <li><img src="{{asset('img/store.svg')}}"/> {{$favori->category_name}}</li>
                        <li><img src="{{asset('img/add.svg')}}"/> {{$favori->subcategory_name}}</li>
                        <li><a class="btn-inscription" href="{{url ('user\favoris\delete',

                                ['store_id' => $favori->store_id, 'user_id' => Auth::user()->id]
                            )}}">Supprimer</a></li>
                    </ul>
                @endforeach
            </div>

            <!--@yield('mes_infos')-->
            <script>
                document.getElementById("promos").style.display= "none";
                document.getElementById('favoris').style.display="none";

                function affichePromos(){
                    document.getElementById("promos").style.display= "flex";
                    document.getElementById('favoris').style.display="none";
                    document.getElementById('button_promo').style.borderBottom = "2px solid #0063B2";
                    document.getElementById('button_favoris').style.borderBottom = "none";
                }

                function afficheFavoris(){
                    document.getElementById("promos").style.display= "none";
                    document.getElementById('favoris').style.display="flex";
                    document.getElementById('button_promo').style.borderBottom = "none";
                    document.getElementById('button_favoris').style.borderBottom = "2px solid #0063B2";
                }

            </script>
        </div>
    </div>
@endsection

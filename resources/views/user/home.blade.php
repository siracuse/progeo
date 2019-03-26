@extends('layout.user')


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
        var rt_promos = '{{route('print_promos')}}';
        var rt_promo_avis = '{{route('promo_rating', ['promo_id' => 'value'])}}';
        var rt_delPromoUser = '{{route('del_promo_user')}}';
        var rt_delFavorisUser = '{{route('user_favoris_delete')}}';
        var rt_update_avis = '{{route('avis_update')}}';
        var rt_delavispromo = '{{route('avis_delete')}}';

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
                <li id="button_favoris"><a onclick="afficheFavoris()" onmouseover="this.style.cursor='pointer'">Mes
                        favoris</a></li>
                <li id="button_promo"><a onclick="affichePromos()" onmouseover="this.style.cursor='pointer'">Mes
                        promotions</a></li>
                <li id="button_avis"><a onclick="afficheAvis()" onmouseover="this.style.cursor='pointer'">Mes avis</a>
                </li>
            </ul>
        </div>

        <div class="content">
            <div id="promos" class="flex-mes-infos">
                @if(isset($promos) && count($promos) > 0)

                    @foreach($promos as $promo)
                        <ul class="mes-infos-promo" id="etmerceee{{$promo->promo_id}}">
                            <li class="titre-mes-infos">Magasin : {{$promo->store_name}}</li>
                            <li class="name-promo">Promotion : {{$promo->promo_name}}</li>
                            <li class="code-promo">
                                <div class="bloc-note bloc-note2">
                                    <img src="{{asset('img/store/star-full.svg')}}">
                                    <img src="{{asset('img/store/star-full.svg')}}">
                                    <img src="{{asset('img/store/star-full.svg')}}">
                                    <img src="{{asset('img/store/star-full.svg')}}">
                                    <img src="{{asset('img/store/star-empty.svg')}}">
                                </div>
                            </li>
                            <li class="code-promo">Code : {{$promo->promotionCode}}</li>
                            <li><img class="calendar" src="{{asset('img/calendar.svg')}}"/>
                                <div class="date-fin-promo">Du {{date('d-m-Y', strtotime($promo->startDate))}} </div>
                            </li>
                            <li class="date-fin-promo">Au {{date('d-m-Y', strtotime($promo->endDate))}}</li>
                            <div class="bloc-btn-avis">
                                <li>
                                    <a class="btn-modif btn-avis"
                                       href="{{url('promo',  ['promo_id' => $promo->promo_id])}}">Laisser un avis
                                    </a>
                                </li>
                                <li class="btn-mes-promos-retirer">
                                    <a class="btn-supp-favoris"
                                            onclick="delPromoUser({{$promo->promo_id}})">Retirer
                                    </a>

                                </li>
                            </div>

                        </ul>


                    @endforeach

                    @else
                    <div class="bloc-vide">
                            <img class="img-vide" src="{{asset('img/image-vide.png')}}">
                            <p>Vous n'avez toujours pas de promotions ajoutés !</p>
                        </div>

                @endif
            </div>
            <div id="favoris" class="flex-mes-infos">
                @if(isset($favoris) && count($favoris) > 0)
                    @foreach($favoris as $favori)
                        <ul class="mes-infos-favoris" id="etmercee{{$favori->store_id}}">
                            <li class="titre-mes-infos"><a href="{{route('store_details', $favori->store_id)}}">{{$favori->store_name}}</a>  <img class="star"
                                                                                     src="{{asset('img/star.svg')}}"/>
                            </li>
                            <div class="bloc-infos-favoris">
                                <div>
                                    <li class="name-promo">{{$favori->address}}</li>
                                    <li class="code-promo">{{$favori->postalCode}} {{$favori->city_name}}</li>
                                    <li><img src="{{asset('img/store.svg')}}"/> {{$favori->category_name}}</li>
                                </div>
                                <div>
                                    <li><img src="{{asset('img/add.svg')}}"/> {{$favori->subcategory_name}}</li>
                                    <li class="name-promo">{{$favori->address}}</li>
                                    <li class="code-promo">{{$favori->postalCode}} {{$favori->city_name}}</li>
                                </div>
                            </div>
                            <li><a class="btn-supp-favoris"
                                   onclick="delFavorisStore({{$favori->store_id}})">Supprimer</a></li>
                        </ul>
                    @endforeach

                @else
                    <div class="bloc-vide">
                        <img class="img-vide" src="{{asset('img/image-vide.png')}}">
                        <p>Vous n'avez toujours pas de magasins favoris !</p>
                    </div>

                @endif

            </div>
            <div id="avis" class="flex-mes-infos">
                @if(isset($avis) && count($avis) > 0)
                    @foreach($avis as $avi)
                        <ul class="mes-infos-avis" id="etmerce{{$avi->promotion_id}}">
                            <li class="titre-mes-infos">{{$avi->date}}</li>
                            <li class="code-promo">
                                <div class="bloc-note">
                                    @if($avi->rating == 1)
                                        <img src="{{asset('img/store/star-full.svg')}}">
                                        <img src="{{asset('img/store/star-empty.svg')}}">
                                        <img src="{{asset('img/store/star-empty.svg')}}">
                                        <img src="{{asset('img/store/star-empty.svg')}}">
                                        <img src="{{asset('img/store/star-empty.svg')}}">
                                    @elseif($avi->rating == 2)
                                        <img src="{{asset('img/store/star-full.svg')}}">
                                        <img src="{{asset('img/store/star-full.svg')}}">
                                        <img src="{{asset('img/store/star-empty.svg')}}">
                                        <img src="{{asset('img/store/star-empty.svg')}}">
                                        <img src="{{asset('img/store/star-empty.svg')}}">
                                    @elseif($avi->rating == 3)
                                        <img src="{{asset('img/store/star-full.svg')}}">
                                        <img src="{{asset('img/store/star-full.svg')}}">
                                        <img src="{{asset('img/store/star-full.svg')}}">
                                        <img src="{{asset('img/store/star-empty.svg')}}">
                                        <img src="{{asset('img/store/star-empty.svg')}}">
                                    @elseif($avi->rating == 4)
                                        <img src="{{asset('img/store/star-full.svg')}}">
                                        <img src="{{asset('img/store/star-full.svg')}}">
                                        <img src="{{asset('img/store/star-full.svg')}}">
                                        <img src="{{asset('img/store/star-full.svg')}}">
                                        <img src="{{asset('img/store/star-empty.svg')}}">
                                    @elseif($avi->rating == 5)
                                        <img src="{{asset('img/store/star-full.svg')}}">
                                        <img src="{{asset('img/store/star-full.svg')}}">
                                        <img src="{{asset('img/store/star-full.svg')}}">
                                        <img src="{{asset('img/store/star-full.svg')}}">
                                        <img src="{{asset('img/store/star-full.svg')}}">
                                    @endif

                                </div>
                            </li>
                            <li class="name-promo">Promo : {{$avi->name}}</li>
                            <div id="div_comment">
                                <li class="txt-avis" id="comment">
                                    {{$avi->comment}}
                                </li>
                            </div>

                            <div class="bloc-btn-avis">
                                <li class="btn-mes-avis-modifier"><a class="btn-modif" id="modif" onclick="modifAvis({{$avi->promotion_id}})">Modifier</a></li>
                                <li class="btn-mes-avis-supprimer">
                                   <a class="btn-supp" onclick="delAvisPromo({{$avi->promotion_id}})">Supprimer</a></li>
                                </li>
                            </div>
                        </ul>
                    @endforeach
                @else
                    <div class="bloc-vide">
                        <img class="img-vide" src="{{asset('img/image-vide.png')}}">
                        <p>Vous n'avez toujours pas d'avis ajoutés !</p>
                    </div>
                @endif

            </div>

        <!--@yield('mes_infos')-->
            <script>



                document.getElementById("promos").style.display = "none";
                document.getElementById('favoris').style.display = "flex";
                document.getElementById('avis').style.display = "none";
                document.getElementById('button_favoris').style.borderBottom = "2px solid #0063B2";

                function affichePromos() {
                    document.getElementById("promos").style.display = "flex";
                    document.getElementById('favoris').style.display = "none";
                    document.getElementById('avis').style.display = "none";
                    document.getElementById('button_promo').style.borderBottom = "2px solid #0063B2";
                    document.getElementById('button_favoris').style.borderBottom = "none";
                    document.getElementById('button_avis').style.borderBottom = "none";
                }

                function afficheFavoris() {
                    document.getElementById("promos").style.display = "none";
                    document.getElementById('favoris').style.display = "flex";
                    document.getElementById('avis').style.display = "none";
                    document.getElementById('button_promo').style.borderBottom = "none";
                    document.getElementById('button_favoris').style.borderBottom = "2px solid #0063B2";
                    document.getElementById('button_avis').style.borderBottom = "none";
                }

                function afficheAvis() {
                    document.getElementById("promos").style.display = "none";
                    document.getElementById('favoris').style.display = "none";
                    document.getElementById('avis').style.display = "flex";
                    document.getElementById('button_promo').style.borderBottom = "none";
                    document.getElementById('button_favoris').style.borderBottom = "none";
                    document.getElementById('button_avis').style.borderBottom = "2px solid #0063B2";
                }

                function delPromoUser(promo_id) {
                    tmp1 = promo_id;
                    axios.post(rt_delPromoUser, {
                        promo_id: promo_id,
                        _token: token,
                    })
                        .then(delDivPromo)
                        .catch(function (error) {
                            console.log(error);
                        });
                }

                function delDivPromo() {


                    console.log(document.getElementById('etmerceee'+tmp1));

                    document.getElementById('etmerceee'+tmp1).remove();
                    console.log(document.getElementsByClassName('mes-infos-promo'));

                    if(document.getElementsByClassName('mes-infos-promo').length == 0){
                        console.log('ya pas de ul');

                        let ch = '<div class="bloc-vide">' +
                            '    <img class="img-vide" src="img/image-vide.png">' +
                            '    <p>Vous n\'avez toujours pas de promotions ajoutés !</p>' +
                            '</div>';

                        document.getElementById("promos").innerHTML = ch;
                    }

                }

                function delFavorisStore(store_id) {
                    console.log(store_id);
                    tmp2 = store_id;

                    axios.post(rt_delFavorisUser, {
                        store_id: store_id,
                        _token: token,
                    })
                        .then(delDivFavoris)
                        .catch(function (error) {
                            console.log(error);
                        });
                }

                function delDivFavoris() {

                    console.log(document.getElementById('etmercee'+tmp2));

                    document.getElementById('etmercee'+tmp2).remove();
                    console.log(document.getElementsByClassName('mes-infos-favoris'));

                    if(document.getElementsByClassName('mes-infos-favoris').length == 0){
                        console.log('ya pas de ul');

                        let ch = '<div class="bloc-vide">' +
                            '    <img class="img-vide" src="img/image-vide.png">' +
                            '    <p>Vous n\'avez toujours pas de magasins favoris !</p>' +
                            '</div>';

                        document.getElementById("favoris").innerHTML = ch;
                    }
                }

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

                function delAvisPromo(promo_id) {
                    tmp3 = promo_id;

                    delDivAvis();
                    axios.post(rt_delavispromo, {
                        promo_id: promo_id,
                        _token: token,
                    })
                        .then(delDivAvis)
                        .catch(function (error) {
                            console.log(error);
                        });
                }

                function delDivAvis() {

                    console.log(document.getElementById('etmerce'+tmp3));

                    document.getElementById('etmerce'+tmp3).remove();
                    console.log(document.getElementsByClassName('mes-infos-avis'));

                    if(document.getElementsByClassName('mes-infos-avis').length == 0){
                        console.log('ya pas de ul');

                        let ch = '<div class="bloc-vide">' +
                            '    <img class="img-vide" src="img/image-vide.png">' +
                            '    <p>Vous n\'avez toujours pas laissé d\'avis !</p>' +
                            '</div>';

                        document.getElementById("avis").innerHTML = ch;
                    }
                }

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

                function modifAvis(promo_id){

                    document.getElementById('comment').innerHTML = "";

                    let textarea = document.createElement('textarea');
                    textarea.setAttribute("placeholder", "Saisissez votre nouveau commentaire...");

                    let rating_arr = [1, 2, 3, 4, 5];

                    let select = document.createElement('select');
                    select.style.marginLeft = "100px";


                    let default_option = document.createElement('option');
                    default_option.textContent = 'Veuillez choisir une note';

                    select.appendChild(default_option);


                    for(let i in rating_arr){
                        let option = document.createElement('option');
                        option.textContent = rating_arr[i];
                        option.setAttribute('value', rating_arr[i]);
                        select.appendChild(option);

                    }


                    document.getElementById('modif').textContent = "Envoyer";

                    document.getElementById('modif').onclick = () => {

                        axios.post(rt_update_avis, {
                            promo_id: promo_id,
                            comment: textarea.value,
                            rating: select.value,
                            _token: token,
                        })
                            .then(document.location.reload(true))
                            .catch(function (error) {
                                console.log(error);
                            });
                    }

                    document.getElementById('comment').appendChild(textarea);
                    document.getElementById('comment').appendChild(select);
                }




            </script>
        </div>
    </div>
@endsection

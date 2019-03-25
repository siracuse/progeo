@extends('layout.manager')

@section('content')
    {{--<h1>Accueil Manager {{ Auth::user()->name }}</h1>

    <h3>Liste des fonctionnalités</h3>

        <a href="{{url ('manager\add_store')}}">Ajouter un magasin</a>

    <hr>

    <h3>Liste des magasins</h3>--}}

    <table class="table">
        <thead>
        <tr>
            <th scope="col">Magasin</th>
            <th scope="col">Catégorie/Sous-Catégorie</th>
            <th scope="col">CP - Ville</th>
            {{--<th scope="col">Promotion</th>--}}
        </tr>
        </thead>
        <tbody>
        @foreach($stores as $store)
            <tr>
                <td><a href="{{url ('store', ['store_id' => $store->id])}}">{{$store->store_name}}</a></td>
                <td>{{$store->cat_name}} / {{$store->subcat_name}}</td>
                <td>{{$store->postalCode}} - {{$store->city_name}}</td>
                <td class="action-table">
                    <a class="btn-modif" href="{{url ('manager\edit_store', ['store_id' => $store->id])}}">
                        Modifier
                        <img src="{{asset('img/pencil-edit-button.svg')}}">
                    </a>
                    <a class="btn-supp" onclick="return myFunction();" href="{{url ('manager\delete_store', ['store_id' => $store->id])}}">
                        Supprimer
                        <img src="{{asset('img/cancel.svg')}}">
                    </a>
                </td>

                <td><a class="btn-add-promo" href="{{url ('manager\add_promo', ['store_id' => $store->id])}}">Ajouter une promotion</a>
                    {{--<a href="{{url ('/manager/get_promos')}}">Consulter</a>--}}
                </td>
            </tr>
        @endforeach

        </tbody>
    </table>
@endsection
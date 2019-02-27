@extends('layouts.app')

@section('content')
    <h1>Accueil Manager {{ Auth::user()->name }}</h1>

    <h3>Liste des fonctionnalités</h3>

        <a href="{{url ('manager\add_store')}}">Ajouter un magasin</a>

    <hr>

    <h3>Liste des magasins</h3>

    <table class="table">
        <thead>
        <tr>
            <th scope="col">Magasin</th>
            <th scope="col">Catégorie/Sous-Catégorie</th>
            <th scope="col">CP - Ville</th>
            <th scope="col">Action</th>
            <th scope="col">Promotion</th>
        </tr>
        </thead>
        <tbody>
        @foreach($stores as $store)
            <tr>
                <td>{{$store->store_name}}</td>
                <td>{{$store->cat_name}} / {{$store->subcat_name}}</td>
                <td>{{$store->postalCode}} - {{$store->city_name}}</td>
                <td>
                    <a href="{{url ('manager\edit_store', ['store_id' => $store->id])}}">Modifier</a>
                    <a href="{{url ('manager\delete_store', ['store_id' => $store->id])}}">Supprimer</a>
                </td>
                <td><a href="{{url ('manager\add_promo', ['store_id' => $store->id])}}">Ajouter</a> /
                    <a href="{{url ('/manager/get_promos')}}">Consulter</a>
                </td>
            </tr>
        @endforeach

        </tbody>
    </table>
@endsection
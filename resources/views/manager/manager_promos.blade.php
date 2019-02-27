@extends('layouts.app')

@section('content')
    <h3>Liste des promos</h3>

    <a href="{{url ('manager')}}">Retour</a><br><br>

    <table class="table">
        <thead>
        <tr>
            <th scope="col">Nom de la promo</th>
            <th scope="col">Magasin</th>
            <th scope="col">Date debut -> Expiration</th>
            <th scope="col">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($promos as $promo)
            <tr>
                <td>{{$promo->promo_name}}</td>
                <td>{{$promo->store_name}}</td>
                <td>{{$promo->startDate}} -> {{$promo->endDate}}</td>
                <td> <a href="{{url ('manager\refresh_promos', ['promo_id' => $promo->promo_id])}}">Réactiver</a></td>
            </tr>
        @endforeach

        </tbody>
    </table>

@endsection
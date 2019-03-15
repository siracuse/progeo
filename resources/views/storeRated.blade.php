@extends('layout.app')

@section('content')

    <div class="header-store">
        <img src="{{asset('img/otacos1.jpg')}}">
        <img src="{{asset('img/otacos2.jpg')}}">
    </div>

    <a class="btn1 btn-favoris" href="">Favoris</a>

    <div class="container-store">
        <h1 class="center">{{$store->name}}</h1>


        <div class="bloc-avis">
            @foreach($promotions as $promotion)
                <div class="avis">

                </div>
            @endforeach
        </div>
    </div>

@endsection
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
            <form>
                <label>Laisser un avis</label>
                <textarea></textarea>
                <button type="submit" class="btn1 btn-form">
                    Envoyer
                </button>
            </form>
            @foreach($ratings as $rating)
                <div class="avis">
                    <p>{{$rating->name}}</p>
                    {{$rating->rating}}
                    <div class="bloc-note">
                        <img src="{{asset('img/store/star-full.svg')}}">
                        <img src="{{asset('img/store/star-full.svg')}}">
                        <img src="{{asset('img/store/star-full.svg')}}">
                        <img src="{{asset('img/store/star-full.svg')}}">
                        <img src="{{asset('img/store/star-empty.svg')}}">
                    </div>
                    <p>{{$rating->comment}}</p>
                </div><br><br><br>
            @endforeach
        </div>
    </div>

@endsection
@extends('layout.app')

@section('content')
    <div class="header-store">
        <img src="{{asset('img/otacos1.jpg')}}">
        <img src="{{asset('img/otacos2.jpg')}}">
    </div>

    <a class="btn1 btn-favoris" href="">Favoris</a>

    <div class="container-store">
        <h1 class="center">{{$store->name}}</h1>


        <div class="bloc-info-store">
            <form class="full" method="post" action="{{ route ('rating_new') }}">
                {{ csrf_field() }}
                <label class="full" for="code">Code avis</label>
                <input id="code" name="code" type="number">

                <label class="full" for="comment">Laisser un avis</label>
                <textarea class="full" id="comment" name="comment"></textarea>
                <br><br>
                <input id="promo_id" name="promo_id" type="hidden" value={{$promo_id}}>
                <p>Sélectionner une note:</p>

                <div>
                    <input type="radio" id="1" name="rating" value="1"
                           checked>
                    <label for="1">1</label>
                </div>

                <div>
                    <input type="radio" id="2" name="rating" value="2">
                    <label for="2">2</label>
                </div>

                <div>
                    <input type="radio" id="3" name="rating" value="3">
                    <label for="3">3</label>
                </div>

                <div>
                    <input type="radio" id="4" name="rating" value="4">
                    <label for="4">4</label>
                </div>

                <div>
                    <input type="radio" id="5" name="rating" value="5">
                    <label for="5">5</label>
                </div>
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
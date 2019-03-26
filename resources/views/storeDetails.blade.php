@extends('layout.app')

@section('content')
    {{--{{$store->name}}<br>
    {{$store->address}}<br>
    {{$city->name}}<br>
    {{$store->phone}}<br>
    {{$store->email}}<br>
    {{$category->name}}<br>
    {{$subcategory->name}}<br>
    @foreach($promotions as $promotion)
        {{$promotion->name}}<br>
        {{date('d-m-Y', strtotime($promotion->startDate))}}<br>
        {{date('d-m-Y', strtotime($promotion->endDate))}}<br>
    @endforeach--}}

    <div class="header-store">
        <img src="{{asset($img_1)}}">
        <img src="{{asset($img_2)}}">
    </div>

    @if (Auth::user())
    <a class="btn1 btn-favoris" href="{{route('user_favoris_update', ['store_id' => $store->id, 'user_id' => Auth::user()->id]) }}">Favoris</a>
    @endif

    <div class="container-store">
        <h1 class="center">{{$store->name}}</h1>
        <div class="bloc-info-store">
            <div>
                <img src="{{asset('img/store/call-answer.svg')}}">
                <h4>{{$store->phone}}</h4>
            </div>
            <div>
                <img src="{{asset('img/store/skyline.svg')}}">
                <h4>{{$city->name}}</h4>
            </div>
            <div>
                <img src="{{asset('img/store/envelope.svg')}}">
                <h4>{{$city->name}}</h4>
            </div>
            <div>
                <img src="{{asset('img/store/map-marker.svg')}}">
                <h4>{{$store->address}}</h4>
            </div>
            <div>
                <img src="{{asset('img/store/store.svg')}}">
                <h4>{{$category->name}}</h4>
            </div>
            <div>
                <img src="{{asset('img/store/add.svg')}}">
                <h4>{{$subcategory->name}}</h4>
            </div>
        </div>

        <div class="bloc-promo">
            @foreach($promotions as $promotion)
                <div class="promotion">
                    <h3 class="center">{{$promotion->name}}</h3>
                    <div class="bloc-date-promo">
                        <p>Date de début : {{date('d-m-Y', strtotime($promotion->startDate))}}</p>
                        <p>Date de fin : {{date('d-m-Y', strtotime($promotion->endDate))}}</p>
                    </div>
                    <div class="bloc-note">
                        <img src="{{asset('img/store/star-full.svg')}}">
                        <img src="{{asset('img/store/star-full.svg')}}">
                        <img src="{{asset('img/store/star-full.svg')}}">
                        <img src="{{asset('img/store/star-full.svg')}}">
                        <img src="{{asset('img/store/star-empty.svg')}}">
                    </div>
                    <div class="bloc-btn">
                        <a class="btn1" href="{{route('user_promotion_get', ['promo_id' => $promotion->id])}}">Obtenir code</a>
                        <a class="btn1" href="{{ route('promo_rating', ['promo_id' => $promotion->id]) }}">Laisser un avis</a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

@endsection


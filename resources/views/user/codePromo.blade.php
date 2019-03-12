@extends('user.home')


@section('mes_infos')

    <style>
        .mes_infos li {
            border: none;
        }

        .promotions {
            border-bottom: 2px solid #0063B2;
        }
    </style>



    <div class="flex-mes-infos">
    @foreach($promos as $promo)

        <ul>
            <li class="store-promo">{{$promo->store_name}}</li>
            <li class="name-promo">Nom : {{$promo->promo_name}}</li>
            <li class="code-promo">Code : {{$promo->promotionCode}}</li>
            <li class="date-promo">Du {{$promo->startDate}}</li>
            <li>Au {{$promo->endDate}}</li>
        </ul>
    @endforeach
    </div>

@endsection
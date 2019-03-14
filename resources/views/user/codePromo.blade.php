<!--@extends('user.home')

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
            <li class="date-promo">Du {{date('d-m-Y', strtotime($promo->startDate))}} </li>
            <li>Au {{date('d-m-Y', strtotime($promo->endDate))}}</li>
            <li><a class="btn-inscription" href="{{url ('user/codePromo',
                    ['store_id' => $promo->store_id, 'user_id' => $promo->user_id, 'promo_id' => $promo->promo_id]
                    )}}">
                        Retirer</a>
           </li>
        </ul>
    @endforeach
    </div>

@endsection -->
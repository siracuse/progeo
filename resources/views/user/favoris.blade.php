<!-- @extends('user.home')


@section('mes_infos')

    <style>
        .mes_infos li {
            border: none;
        }


        .favoris {
            border-bottom: 2px solid #0063B2;
        }
    </style>

    <div class="flex-mes-infos">
        @foreach($favoris as $favori )
            <ul>
                <li class="store-promo">{{$favori->store_name}}</li>
                <li class="name-promo">{{$favori->address}}</li>
                <li class="code-promo">{{$favori->postalCode}}</li>
                <li class="date-promo">{{$favori->city_name}}</li>
                <li>{{$favori->category_name}}</li>
                <li>{{$favori->subcategory_name}}</li>
                <li><a class="btn-inscription" href="{{url ('user\favoris\delete',

                                ['store_id' => $favori->store_id, 'user_id' => Auth::user()->id]
                            )}}">Supprimer</a></li>
            </ul>
        @endforeach
    </div>
@endsection -->
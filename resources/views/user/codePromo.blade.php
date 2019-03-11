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
    <h2> Mes Code Promo </h2>
    <table>
        <tbody>
        <tr>
            <td style="width:200px;"><b>Nom Magasin</b></td>
            <td style="width:200px;"><b>Pormotion</b></td>
            <td style="width:200px;"><b>Code Promo</b></td>
            <td style="width:200px;"><b>Période</b></td>
        </tr>

        @foreach($promos as $promo)
            <tr>
                <td>{{$promo->store_name}}</td>
                <td>{{$promo->promo_name}}</td>
                <td>{{$promo->promotionCode}}</td>
                <td>{{$promo->startDate}} / {{$promo->endDate}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
@endsection
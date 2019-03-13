@extends('layout.user')


@section('content')

    <h2> Mes Code Promo </h2>
    <table>
        <tbody>
        <tr>
            <td style="width:170px;"><b>Magasin</b></td>
            <td style="width:200px;"><b>Nom Promotion</b></td>
            <td style="width:150px;"><b>Code Promo</b></td>
            <td style="width:250px;"><b>Période</b></td>
            <td style="width:250px;"><b>Action</b></td>
        </tr>

        @foreach($promos as $promo)
            <tr>

                <td>{{$promo->store_name}}</td>
                <td>{{$promo->promo_name}}</td>
                <td>{{$promo->promotionCode}}</td>
                {{--<td>{{$promo->startDate}} / {{$promo->endDate}}</td>--}}
                <td>
                    du {{date('d-m-Y', strtotime($promo->startDate))}} au
                    {{date('d-m-Y', strtotime($promo->endDate))}}
                </td>
                <td>
                    <a href="{{url ('user/codePromo',
                    ['store_id' => $promo->store_id, 'user_id' => $promo->user_id, 'promo_id' => $promo->promo_id]
                    )}}">
                        Retirer</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
@endsection
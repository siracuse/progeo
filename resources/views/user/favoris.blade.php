@extends('user.home')


@section('mes_infos')

    <style>
        .mes_infos li {
            border: none;
        }

        .favoris {
            border-bottom: 2px solid #0063B2;
        }
    </style>
    <h2> Mes Favoris </h2>
    <table>
        <tbody>
        <tr>
            <td style="width:200px;"><b>Nom Magasin</b></td>
            <td style="width:350px;"><b>Adresse</b></td>
            <td style="width:350px;"><b>Ville</b></td>
            <td style="width:350px;"><b>Action</b></td>
        </tr>

        @foreach($favoris as $favori )
                    <tr>
                        <td>{{$favori->store_name}}</td>
                        <td>{{$favori->address}}</td>
                        <td>{{$favori->city_name}} - {{$favori->postalCode}}</td>
                        <td>
                            <a href="{{url ('user\favoris\delete',
                                ['store_id' => $favori->store_id, 'user_id' => Auth::user()->id]
                            )}}">Supprimer</a>
                        </td>
                    </tr>
        @endforeach
        </tbody>
    </table>
@endsection
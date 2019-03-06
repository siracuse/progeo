@extends('layouts.user')


@section('content')

    <h2> Mes Favoris </h2>
    <table>
        <tbody>
        <tr>
            <td style="width:200px;"><b>Nom Magasin</b></td>
            <td style="width:350px;"><b>Adresse</b></td>
            <td style="width:350px;"><b>Action</b></td>
        </tr>

        @foreach($favoris as $favori )
            @foreach($favori->userSecond as $user)
                @if ($user->pivot->favoris === 1 && $user->name === Auth::user()->name )
                    <tr>
                        <td>{{$favori->name}}</td>
                        <td>{{$favori->address}}</td>
                        <td>
                            <a href="{{url ('user\favoris\delete',
                                ['store_id' => $favori->id, 'user_id' => Auth::user()->id]
                            )}}">Supprimer</a>
                        </td>
                    </tr>
                @endif
            @endforeach
        @endforeach
        </tbody>
    </table>
@endsection
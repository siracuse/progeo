@extends('layouts.user')


@section('content')

    <h2> Mes Favoris </h2>
    <table>
        <tbody>
        <tr>
            <td style="width:200px;"><b>Nom Magasin</b></td>
            <td style="width:200px;"><b>SIRET</b></td>
            <td style="width:200px;"><b>Nom User</b></td>
            {{--<td style="width:200px;"><b>Action</b></td>--}}
        </tr>

        @foreach($favoris as $favori )
            @foreach($favori->userSecond as $user)
                @if ($user->pivot->favoris === 1 && $user->name === Auth::user()->name )
                    <tr>
                        <td>{{$favori->name}}</td>
                        <td>{{$favori->siret}}</td>
                        <td>{{$user->name}}</td>
                    </tr>
                @endif
            @endforeach
        @endforeach
        </tbody>
    </table>
@endsection
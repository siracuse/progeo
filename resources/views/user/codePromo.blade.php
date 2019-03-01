@extends('layouts.user')


@section('content')

    <h2> Mes Code Promo </h2>
    <table>
        <tbody>
        <tr>
            <td style="width:200px;"><b>Nom Magasin</b></td>
            <td style="width:200px;"><b>SIRET</b></td>
            <td style="width:200px;"><b>Code Promo</b></td>
            <td style="width:200px;"><b>Nom User</b></td>
        </tr>

        {{--@foreach($favoris as $favori )--}}
            {{--@foreach($favori->userSecond as $user)--}}
                {{--@if ($user->pivot->favoris === 1 && $user->name === Auth::user()->name )--}}
                    {{--<tr>--}}
                        {{--<td>{{$favori->name}}</td>--}}
                        {{--<td>{{$favori->siret}}</td>--}}
                        {{--<td>{{$user->name}}</td>--}}
                    {{--</tr>--}}
                {{--@endif--}}
            {{--@endforeach--}}
        {{--@endforeach--}}



        @foreach($codePromos as $codePromo )
            @foreach($codePromo->userSecond as $user)
                @if ($user->pivot->codePromo === 1 && $user->name === Auth::user()->name )
                    <tr>
                        <td>{{$codePromo->name}}</td>
                        <td>{{$codePromo->siret}}</td>
                        <td>{{$codePromo->codePromo}}</td>
                        <td>{{$user->name}}</td>
                    </tr>
                @endif
            @endforeach
        @endforeach
        </tbody>
    </table>
@endsection
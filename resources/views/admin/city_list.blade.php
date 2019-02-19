@extends('layout.app')


@section('content')
    <h2> Liste des villes </h2>
    <a href="{{url ('admin\city\new')}}">Ajouter une ville +</a><br><br>
    <table>
        <tbody>
        <tr>
            <td style="width:50px;"><b>ID</b></td>
            <td style="width:100px;"><b>Nom</b></td>
            <td style="width:150px;"><b>Actions</b></td>
        </tr>
        @foreach($cities as $city )
            <tr>
                <td>{{$city->id}} </td>
                <td>{{$city->name}} </td>
                <td>
                    <a href="{{url ('admin\city\edit', ['city_id' => $city->id])}}">Modifier</a>/
                    <a href="{{url ('admin\city\delete', ['city_id' => $city->id])}}">Supprimer</a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    {{$cities->links()}}
@endsection
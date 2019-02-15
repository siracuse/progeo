@extends('layout.app')

@section('content')
    <h2> Liste des Magasins </h2>
    <a href="{{url ('admin\store\new')}}">Ajouter un magasin +</a><br><br>
    <table>
        <tbody>
        <tr>
            <td style="width:100px;"><b>Magasin</b></td>
            <td style="width:100px;"><b>Responsable</b></td>
            <td style="width:200px;"><b>Adresse</b></td>
            <td style="width:70px;"><b>Téléphone</b></td>
            <td style="width:50px;"><b>Email</b></td>
            <td style="width:130px;"><b>Actions</b></td>
        </tr>
        @foreach($stores as $store )
            <tr>
                <td>{{$store->name}} </td>
                <td>{{$store->user->name}} </td>
                <td>{{$store->address}} </td>
                <td>{{$store->phone}} </td>
                <td>{{$store->email}} </td>
                <td>
                    <a href="{{url ('admin\store\edit', ['store_id' => $store->id])}}">Modifier</a> /
                    <a href="{{url ('admin\store\delete', ['store_id' => $store->id])}}">Supprimer</a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table><br><br>
    {{$stores->links()}}
@endsection
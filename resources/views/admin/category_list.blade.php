@extends('layout.app')


@section('content')
    <h2> Liste des catégories </h2>
    <a href="{{url ('admin\category\new')}}">Ajouter une catégorie +</a><br><br>
    <table>
        <tbody>
        <tr>
            <td style="width:50px;"><b>ID</b></td>
            <td style="width:100px;"><b>Nom</b></td>
            <td style="width:150px;"><b>Actions</b></td>
        </tr>
        @foreach($categories as $category )
        <tr>
            <td>{{$category->id}} </td>
            <td>{{$category->name}} </td>
            <td>
                <a href="{{url ('admin\category\edit', ['category_id' => $category->id])}}">Modifier</a>/
                <a href="{{url ('admin\category\delete', ['category_id' => $category->id])}}">Supprimer</a>
            </td>
        </tr>
        @endforeach
        </tbody>
    </table>
@endsection
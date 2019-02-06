@extends('layout.app')

@section('content')

    <h2> Liste des sous-catégories </h2>
    <a href="{{url ('admin\subcategory\new')}}">Ajouter une sous-catégorie +</a><br><br>
    <table>
        <tbody>
        <tr>
            <td style="width:50px;"><b>ID</b></td>
            <td style="width:150px;"><b>Nom</b></td>
            <td style="width:150px;"><b>Catégorie</b></td>
            <td style="width:150px;"><b>Actions</b></td>
        </tr>
        @foreach($categories as $category )
            @foreach($category->subcategories as $subcategory)
                <tr>
                    <td>{{$subcategory->id}} </td>
                    <td>{{$subcategory->name}} </td>
                    <td>{{$category->name}} </td>
                    <td>
                        <a href="{{url ('admin\subcategory\edit', ['subcategory_id' => $subcategory->id])}}">Modifier</a> /
                        <a href="{{url ('admin\subcategory\delete', ['subcategory_id' => $subcategory->id])}}">Supprimer</a>
                    </td>
                </tr>
            @endforeach
        @endforeach
        </tbody>
    </table>
@endsection
@extends('layouts.app')

@section('content')

    <a href="{{url ('manager')}}">Retour</a><br><br>
    <h2>Ajout d'un nouveau magasin</h2>

    <form method="post" action="{{ route ('manager_add_store') }}" enctype="multipart/form-data">
        {{ csrf_field() }}
        <label for="name">Nom :</label>
        <input type="text" class="form-control" id="name" name="name" value="bob">

        <label for="address">Adresse :</label>
        <input type="text" class="form-control" id="address" name="address" value="bob">

        <label for="phone">Téléphone :</label>
        <input type="text" class="form-control" id="phone" name="phone" value="0202020202">

        <label for="email">Email :</label>
        <input type="text" class="form-control" id="email" name="email" value="bob@gmail.com">

        <label for="siret">SIRET :</label>
        <input type="text" class="form-control" id="siret" name="siret" value="02022">

        <label for="photoInside">Photo 1 (intérieur du magasin) :</label>
        <input type="file" class="form-control" id="photoInside" name="photoInside">

        <label for="photoOutside">Photo 2 (extérieur du magasin) :</label>
        <input type="file" class="form-control" id="photoOutside" name="photoOutside">

        <label for="latitude">Latitude :</label>
        <input type="text" class="form-control" id="latitude" name="latitude" value="50">

        <label for="longitude">Longitude :</label>
        <input type="text" class="form-control" id="longitude" name="longitude" value="50">

        <label for="city_name">Ville :</label>
        <input type="text" class="form-control" id="city_name" name="city_name">

        <br><label for="category_id">Catégorie :</label><br>
        <select id="category_id" name="category_id">
            @foreach($categories as $category )
                <option value={{$category->id}}>{{$category->name}}</option>
            @endforeach
        </select>

        <br><br><label for="subcategory_id">Sous-Catégorie :</label><br>
        <select id="subcategory_id" name="subcategory_id">
            @foreach($subcategories as $subcategory )
                <option value={{$subcategory->id}}>{{$subcategory->name}}</option>
            @endforeach
        </select>

        <br><br><input type="submit" value="Ajouter"><br><br><br><br><br><br>
    </form>
@endsection
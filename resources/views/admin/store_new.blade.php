@extends ('layout.app')

@section ('content')
    <a href="{{url ('admin\store\list')}}">Retour</a><br><br>
    <h2>Ajout d'un Magasin</h2>

    <form method="post" action="{{ route ('store_new') }}">
        {{ csrf_field() }}
        <label for="name">Nom :</label>
        <input type="text" class="form-control" id="name" name="name">

        <label for="address">Adresse :</label>
        <input type="text" class="form-control" id="address" name="address">

        <label for="phone">Téléphone :</label>
        <input type="text" class="form-control" id="phone" name="phone">

        <label for="email">Email :</label>
        <input type="text" class="form-control" id="email" name="email">

        <label for="siret">SIRET :</label>
        <input type="text" class="form-control" id="siret" name="siret">

        <label for="photoInside">Photo 1 :</label>
        <input type="text" class="form-control" id="photoInside" name="photoInside">

        <label for="photoOutside">Photo 2 :</label>
        <input type="text" class="form-control" id="photoOutside" name="photoOutside">

        <label for="latitude">Latitude :</label>
        <input type="text" class="form-control" id="latitude" name="latitude">

        <label for="longitude">Longitude :</label>
        <input type="text" class="form-control" id="longitude" name="longitude">

        <label for="city_id">Ville :</label>
        <input type="text" class="form-control" id="city_id" name="city_id">

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

        <br><br><label for="user_id">Responsable :</label>
        <input type="text" class="form-control" id="user_id" name="user_id">

        <br><br><input type="submit" value="Ajouter"><br><br><br><br><br><br>
    </form>
@endsection
@extends ('layout.app')

@section ('content')

    <a href="{{url ('admin\promotion\list')}}">Retour</a><br><br>
    <h2>Ajout d'une promotion</h2>

    <form method="post" action="{{ route ('promotion_new') }}">
        {{ csrf_field() }}
        <label for="name">Nom :</label>
        <input type="text" class="form-control" id="name" name="name" value="bob">

        <label for="dateStart">Date début :</label>
        <input type="text" class="form-control" id="dateStart" name="dateStart" value="2005-02-07 07:46:21">

        <label for="dateEnd">Date fin :</label>
        <input type="text" class="form-control" id="dateEnd" name="dateEnd" value="2005-02-07 07:46:21">

        <label for="photo1">Photo 1 :</label>
        <input type="text" class="form-control" id="photo1" name="photo1" value="bob">

        <label for="photo2">Photo 2 :</label>
        <input type="text" class="form-control" id="photo2" name="photo2" value="bob">

        <label for="storeName">Nom du magasin :</label>
        <input type="text" class="form-control" id="storeName" name="storeName" value="Hotel F1">

        <p>Activer directement la promotion ? :</p>
        <input type="radio" id="oui" name="activated" value="1" checked>
        <label for="oui">Oui</label>
        <input type="radio" id="non" name="activated" value="0" >
        <label for="non">Non</label>

        <br><br><input type="submit" value="Ajouter"><br><br><br><br><br><br>
    </form>
@endsection
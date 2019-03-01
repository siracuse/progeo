@extends ('layout.app')

@section ('content')
    <a href="{{url ('admin\city\list')}}">Retour</a><br><br>
    <h2>Ajout d'une ville</h2>

    <form method="post" action="{{ route ('city_new') }}">
        {{ csrf_field() }}
        <label for="name">Nom :</label>
        <input type="text" class="form-control" id="name" name="name">

        <label for="insee">INSEE :</label>
        <input type="text" class="form-control" id="insee" name="insee">

        <label for="cp">Code postal :</label>
        <input type="text" class="form-control" id="postalCode" name="postalCode">

        <label for="latitude">Latitude :</label>
        <input type="text" class="form-control" id="latitude" name="latitude">

        <label for="longitude">Longitude :</label>
        <input type="text" class="form-control" id="longitude" name="longitude">


        @if ($errors->has('name'))
            <br><span class="help-block">
                <strong>{{$errors->first('name')}}</strong>
            </span>
        @endif

        <br><br><input type="submit" value="Ajouter">
    </form>
@endsection
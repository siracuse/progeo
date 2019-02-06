@extends ('layout.app')

@section ('content')
    <a href="{{url ('admin\city\list')}}">Retour</a><br><br>
    <h2> Edition de la catégorie {{ $city->name}}</h2>

    <form method="post" action="{{ route ('city_edit_post') }}">

        <input type="hidden" name="city_id" value="{{$city->id}}">
        {{ csrf_field() }}
        <label for="name">Nom :</label>
        <input type="text" class="form-control" id="name" name="name"
               value="{{old('name', $city->name)}}">

        <label for="insee">INSEE :</label>
        <input type="text" class="form-control" id="insee" name="insee"
               value="{{old('name', $city->insee)}}">

        <label for="postalCode">Code Postal :</label>
        <input type="text" class="form-control" id="postalCode" name="postalCode"
               value="{{old('name', $city->postalCode)}}">

        <label for="latitude">Latitude :</label>
        <input type="text" class="form-control" id="latitude" name="latitude"
               value="{{old('name', $city->latitude)}}">

        <label for="longitude">Longitude :</label>
        <input type="text" class="form-control" id="longitude" name="longitude"
               value="{{old('name', $city->longitude)}}">

        @if ($errors->has('name'))
            <br><span class="help-block">
                <strong>{{$errors->first('name')}}</strong>
            </span>
        @endif

        <br><br><input type="submit" value="Modifier">
    </form>
@endsection
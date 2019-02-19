@extends ('layout.app')

@section ('content')
    <a href="{{url ('admin\category\list')}}">Retour</a><br><br>
    <h2>Ajout d'une catégorie</h2>

    <form method="post" action="{{ route ('category_new') }}">
        {{ csrf_field() }}
        <label for="name">Nom :</label>
        <input type="text" class="form-control" id="name" name="name">
        @if ($errors->has('name'))
            <br><span class="help-block">
                <strong>{{$errors->first('name')}}</strong>
            </span>
        @endif

        <br><br><input type="submit" value="Ajouter">
    </form>
@endsection
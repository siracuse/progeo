@extends ('layout.app')

@section ('content')
    <a href="{{url ('admin\subcategory\list')}}">Retour</a><br><br>
    <h2>Ajout d'une sous-catégorie</h2>

    <form method="post" action="{{ route ('subcategory_new') }}">
        {{ csrf_field() }}
        <label for="name">Nom :</label>
        <input type="text" class="form-control" id="name" name="name">
        @if ($errors->has('name'))
            <br><span class="help-block">
                <strong>{{$errors->first('name')}}</strong>
            </span>
        @endif
        <br><br><label for="categorie">Catégorie :</label>
        <select id="categorie" name="categorie">
            @foreach($categories as $category )
                <option value={{$category->id}}>{{$category->name}}</option>
            @endforeach
        </select>
        <br><br><input type="submit" value="Ajouter">
    </form>
@endsection
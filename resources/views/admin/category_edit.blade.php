@extends ('layout.app')

@section ('content')
    <a href="{{url ('admin\category\list')}}">Retour</a><br><br>
    <h2> Edition de la catégorie {{ $category->name}}</h2>

    <form method="post" action="{{ route ('category_edit_post') }}">

        <input type="hidden" name="category_id" value="{{$category->id}}">
        {{ csrf_field() }}
        <label for="name">Nom :</label>
        <input type="text" class="form-control" id="name" name="name"
               value="{{old('name', $category->name)}}"
        >
        @if ($errors->has('name'))
            <br><span class="help-block">
                <strong>{{$errors->first('name')}}</strong>
            </span>
        @endif

        <br><br><input type="submit" value="Modifier">
    </form>
@endsection
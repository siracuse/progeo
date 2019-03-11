@extends ('layout.app')

@section ('content')

    {{--{{$category}}<br><br>--}}
    {{--{{$subcategory}}--}}

    <a href="{{url ('admin\subcategory\list')}}">Retour</a><br><br>
    <h2> Edition de la catégorie {{ $subcategory->name}}</h2>

    <form method="post" action="{{ route ('subcategory_edit_post') }}">

        <input type="hidden" name="subcategory_id" value="{{$subcategory->id}}">
        {{ csrf_field() }}
        <label for="name">Nom :</label>
        <input type="text" class="form-control" id="name" name="name"
               value="{{old('name', $subcategory->name)}}"
        >
        @if ($errors->has('name'))
            <br><span class="help-block">
                <strong>{{$errors->first('name')}}</strong>
            </span>
        @endif
        <br><br><label for="categorie">Catégorie :</label>
        <select id="categorie" name="categorie">
            @foreach($categories as $thecategory )
                @if($thecategory->id === $category->id)
                    <option value={{$thecategory->id}} selected>{{$thecategory->name}}</option>
                @else
                <option value={{$thecategory->id}}>{{$thecategory->name}}</option>
                @endif
            @endforeach
        </select>
        <br><br><input type="submit" value="Modifier">
    </form>
@endsection
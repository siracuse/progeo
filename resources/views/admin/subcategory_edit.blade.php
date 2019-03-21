@extends ('layout.admin')

@section ('content')

    <div class="content mt-3">
        <div class="animated fadeIn">
            <div class="row">
                <div class=" col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <strong>Modification </strong> de la sous-catégorie {{ $subcategory->name}}
                        </div>
                        <div class="card-body card-block">
                            <form method="post" action="{{ route ('subcategory_edit_post') }}" class="form-horizontal">
                                <input type="hidden" name="subcategory_id" value="{{$subcategory->id}}">
                                {{ csrf_field() }}
                                <div class="row form-group">
                                    <div class="col col-md-3"><label for="name" class=" form-control-label">Nom</label></div>
                                    <div class="col-12 col-md-9"><input type="text" id="name" name="name" placeholder="Nom" class="form-control" value="{{old('name', $subcategory->name)}}" required></div>
                                </div>
                                @if ($errors->has('name'))
                                    <br><span class="help-block">
                                        <strong>{{$errors->first('name')}}</strong>
                                    </span>
                                @endif

                                <div class="row form-group">
                                    <div class="col col-md-3"><label for="categorie" class=" form-control-label">Catégorie</label></div>
                                    <div class="col-12 col-md-9">
                                        <select name="categorie" id="categorie" class="form-control">
                                            @foreach($categories as $thecategory )
                                                @if($thecategory->id === $category->id)
                                                    <option value={{$thecategory->id}} selected>{{$thecategory->name}}</option>
                                                @else
                                                    <option value={{$thecategory->id}}>{{$thecategory->name}}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <input type="submit" value="Ajouter" name="submit" class="btn btn-primary btn-sm">
                                <a href="../list"><input type="button" value="Annuler"  class="btn btn-danger btn-sm"></a>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{--<a href="{{url ('admin\subcategory\list')}}">Retour</a><br><br>--}}
    {{--<h2> Edition de la catégorie {{ $subcategory->name}}</h2>--}}

    {{--<form method="post" action="{{ route ('subcategory_edit_post') }}">--}}

        {{--<input type="hidden" name="subcategory_id" value="{{$subcategory->id}}">--}}
        {{--{{ csrf_field() }}--}}
        {{--<label for="name">Nom :</label>--}}
        {{--<input type="text" class="form-control" id="name" name="name"--}}
               {{--value="{{old('name', $subcategory->name)}}"--}}
        {{-->--}}
        {{--@if ($errors->has('name'))--}}
            {{--<br><span class="help-block">--}}
                {{--<strong>{{$errors->first('name')}}</strong>--}}
            {{--</span>--}}
        {{--@endif--}}
        {{--<br><br><label for="categorie">Catégorie :</label>--}}
        {{--<select id="categorie" name="categorie">--}}
            {{--@foreach($categories as $thecategory )--}}
                {{--@if($thecategory->id === $category->id)--}}
                    {{--<option value={{$thecategory->id}} selected>{{$thecategory->name}}</option>--}}
                {{--@else--}}
                {{--<option value={{$thecategory->id}}>{{$thecategory->name}}</option>--}}
                {{--@endif--}}
            {{--@endforeach--}}
        {{--</select>--}}
        {{--<br><br><input type="submit" value="Modifier">--}}
    {{--</form>--}}
@endsection
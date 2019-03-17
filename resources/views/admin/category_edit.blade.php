@extends ('layout.admin')

@section ('content')
    <div class="content mt-3">
        <div class="animated fadeIn">
            <div class="row">
                <div class=" col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <strong>Ajout </strong> d'une catégorie
                        </div>
                        <div class="card-body card-block">
                            <form method="post" action="{{ route ('category_edit_post') }}" class="form-horizontal">
                                <input type="hidden" name="category_id" value="{{$category->id}}">
                                {{ csrf_field() }}
                                <div class="row form-group">
                                    <div class="col col-md-3"><label for="name" class=" form-control-label">Nom</label></div>
                                    <div class="col-12 col-md-9"><input type="text" id="name" name="name" placeholder="Nom" class="form-control" value="{{old('name', $category->name)}}"></div>
                                </div>

                                @if ($errors->has('name'))
                                    <br><span class="help-block">
                                        <strong>{{$errors->first('name')}}</strong>
                                    </span>
                                @endif

                                <input type="submit" value="Modifier" name="submit" class="btn btn-primary btn-sm">
                                <input type="reset" value="Annuler"  class="btn btn-danger btn-sm">

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
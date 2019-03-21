@extends ('layout.admin')

@section ('content')
    <div class="content mt-3">
        <div class="animated fadeIn">
            <div class="row">
                <div class=" col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <strong>Ajout </strong> d'une sous-catégorie
                        </div>
                        <div class="card-body card-block">
                            <form method="post" action="{{ route ('subcategory_new') }}" class="form-horizontal">
                                {{ csrf_field() }}
                                <div class="row form-group">
                                    <div class="col col-md-3"><label for="name" class=" form-control-label">Nom</label></div>
                                    <div class="col-12 col-md-9"><input type="text" id="name" name="name" placeholder="Nom" class="form-control" required></div>
                                </div>

                                <div class="row form-group">
                                    <div class="col col-md-3"><label for="categorie" class=" form-control-label">Catégorie</label></div>
                                    <div class="col-12 col-md-9">
                                        <select name="categorie" id="categorie" class="form-control">
                                            @foreach($categories as $category )
                                                <option value={{$category->id}}>{{$category->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <input type="submit" value="Ajouter" name="submit" class="btn btn-primary btn-sm">
                                <a href="./list"><input type="button" value="Annuler"  class="btn btn-danger btn-sm"></a>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
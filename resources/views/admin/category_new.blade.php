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
                            <form method="post" action="{{ route ('category_new') }}" class="form-horizontal">
                                {{ csrf_field() }}
                                <div class="row form-group">
                                    <div class="col col-md-3"><label for="name" class=" form-control-label">Nom</label></div>
                                    <div class="col-12 col-md-9"><input type="text" id="name" name="name" placeholder="Nom" class="form-control" required></div>
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
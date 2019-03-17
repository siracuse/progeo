@extends ('layout.admin')

@section ('content')
    <div class="content mt-3">
        <div class="animated fadeIn">
            <div class="row">
                <div class=" col-lg-12">

                    <div class="card">
                        <div class="card-header">
                            <strong>Ajout </strong> d'un magasin
                        </div>
                        <div class="card-body card-block">
                            <form action="{{ route('promotion_new')}}" method="post" class="form-horizontal">
                                {{ csrf_field() }}
                                <div class="row form-group">
                                    <div class="col col-md-3"><label for="name" class=" form-control-label">Nom</label></div>
                                    <div class="col-12 col-md-9"><input type="text" id="name" name="name" placeholder="Nom" class="form-control" value="azed"></div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3"><label for="dateStart" class=" form-control-label">Date début</label></div>
                                    <div class="col-12 col-md-9"><input type="text" id="dateStart" name="dateStart" placeholder="Adresse" class="form-control" value="2005-02-07 07:46:21"></div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3"><label for="dateEnd" class=" form-control-label">Date fin</label></div>
                                    <div class="col-12 col-md-9"><input type="text" id="dateEnd" name="dateEnd" placeholder="Ville" class="form-control" value="2005-02-07 07:46:21"></div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3"><label for="photo1" class=" form-control-label">Photo 1</label></div>
                                    <div class="col-12 col-md-9"><input type="text" id="photo1" name="photo1" placeholder="Photo 1" class="form-control" value="azed"></div>
                                </div>
                                {{--<div class="row form-group">--}}
                                {{--<div class="col col-md-3"><label for="file-input" class=" form-control-label">File input</label></div>--}}
                                {{--<div class="col-12 col-md-9"><input type="file" id="file-input" name="file-input" class="form-control-file"></div>--}}
                                {{--</div>--}}
                                <div class="row form-group">
                                    <div class="col col-md-3"><label for="photo2" class=" form-control-label">Photo 2</label></div>
                                    <div class="col-12 col-md-9"><input type="text" id="photo2" name="photo2" placeholder="Photo 2" class="form-control" value="azed"></div>
                                </div>
                                {{--<div class="row form-group">--}}
                                {{--<div class="col col-md-3"><label for="file-input" class=" form-control-label">File input</label></div>--}}
                                {{--<div class="col-12 col-md-9"><input type="file" id="file-input" name="file-input" class="form-control-file"></div>--}}
                                {{--</div>--}}
                                <div class="row form-group">
                                    <div class="col col-md-3"><label for="storeName" class=" form-control-label">Nom du magasin</label></div>
                                    <div class="col-12 col-md-9"><input type="text" id="storeName" name="storeName" placeholder="Nom du magasin" class="form-control" value="Barton Hoppe"></div>
                                </div>

                                <div class="row form-group">
                                    <div class="col col-md-3"><label class=" form-control-label">Activer la promotion ?</label></div>
                                    <div class="col col-md-9">
                                        <div class="form-check">
                                            <div class="radio">
                                                <label for="oui" class="form-check-label ">
                                                    <input type="radio" id="oui" name="activated" value="1" class="form-check-input" checked>Oui
                                                </label>
                                            </div>
                                            <div class="radio">
                                                <label for="non" class="form-check-label ">
                                                    <input type="radio" id="non" name="activated" value="0" class="form-check-input">Non
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <input type="submit" value="Ajouter" name="submit" class="btn btn-primary btn-sm">
                                <input type="reset" value="Annuler"  class="btn btn-danger btn-sm">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
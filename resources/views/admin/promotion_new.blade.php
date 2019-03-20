@extends ('layout.admin')

@section ('content')
    <div class="content mt-3">
        <div class="animated fadeIn">
            <div class="row">
                <div class=" col-lg-12">

                    <div class="card">
                        <div class="card-header">
                            <strong>Ajout </strong> d'une promotion
                        </div>
                        <div class="card-body card-block">
                            <form action="{{ route('promotion_new')}}" method="post" class="form-horizontal">
                                {{ csrf_field() }}
                                <div class="row form-group">
                                    <div class="col col-md-3"><label for="name" class=" form-control-label">Nom</label></div>
                                    <div class="col-12 col-md-9"><input type="text" id="name" name="name" placeholder="Nom" class="form-control" required></div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3"><label for="dateStart" class=" form-control-label">Date début</label></div>
                                    <div class="col-12 col-md-9"><input type="datetime-local" id="dateStart" name="dateStart" placeholder="Date de début" class="form-control" required></div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3"><label for="dateEnd" class=" form-control-label">Date fin</label></div>
                                    <div class="col-12 col-md-9"><input type="datetime-local" id="dateEnd" name="dateEnd" placeholder="Date de fin" class="form-control" required></div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3"><label for="photo1" class=" form-control-label">Photo 1</label></div>
                                    <div class="col-12 col-md-9"><input type="text" id="photo1" name="photo1" placeholder="Photo 1" class="form-control" required></div>
                                </div>
                                {{--<div class="row form-group">--}}
                                {{--<div class="col col-md-3"><label for="file-input" class=" form-control-label">File input</label></div>--}}
                                {{--<div class="col-12 col-md-9"><input type="file" id="file-input" name="file-input" class="form-control-file"></div>--}}
                                {{--</div>--}}
                                <div class="row form-group">
                                    <div class="col col-md-3"><label for="photo2" class=" form-control-label">Photo 2</label></div>
                                    <div class="col-12 col-md-9"><input type="text" id="photo2" name="photo2" placeholder="Photo 2" class="form-control" required></div>
                                </div>
                                {{--<div class="row form-group">--}}
                                {{--<div class="col col-md-3"><label for="file-input" class=" form-control-label">File input</label></div>--}}
                                {{--<div class="col-12 col-md-9"><input type="file" id="file-input" name="file-input" class="form-control-file"></div>--}}
                                {{--</div>--}}
                                @if (session('error'))
                                    <br><div class="alert alert-danger">
                                        {{ session('error') }}
                                    </div>
                                @endif
                                <div class="row form-group">
                                    <div class="col col-md-3"><label for="storeName" class=" form-control-label">Nom du magasin</label></div>
                                    <div class="col-12 col-md-9"><input type="text" id="storeName" name="storeName" placeholder="Nom du magasin" class="form-control" required></div>
                                </div>

                                <div class="row form-group">
                                    <div class="col col-md-3"><label class=" form-control-label">Activer directement la promotion ?</label></div>
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
                                <a href="./list"><input type="button" value="Annuler"  class="btn btn-danger btn-sm"></a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
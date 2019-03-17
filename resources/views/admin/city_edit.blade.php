@extends ('layout.admin')

@section ('content')
    <div class="content mt-3">
        <div class="animated fadeIn">
            <div class="row">
                <div class=" col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <strong>Ajout </strong> d'une ville
                        </div>
                        <div class="card-body card-block">
                            <form method="post" action="{{ route ('city_edit_post') }}" class="form-horizontal">
                                <input type="hidden" name="city_id" value="{{$city->id}}">
                                {{ csrf_field() }}
                                <div class="row form-group">
                                    <div class="col col-md-3"><label for="name" class=" form-control-label">Nom</label></div>
                                    <div class="col-12 col-md-9"><input type="text" id="name" name="name" placeholder="Nom" class="form-control" value="{{old('name', $city->name)}}"></div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3"><label for="insee" class=" form-control-label">INSEE</label></div>
                                    <div class="col-12 col-md-9"><input type="text" id="insee" name="insee" placeholder="INSEE" class="form-control" value="{{old('name', $city->insee)}}"></div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3"><label for="postalCode" class=" form-control-label">Code Postal</label></div>
                                    <div class="col-12 col-md-9"><input type="text" id="postalCode" name="postalCode" placeholder="Code Postal" class="form-control" value="{{old('name', $city->postalCode)}}"></div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3"><label for="latitude" class=" form-control-label">Latitude</label></div>
                                    <div class="col-12 col-md-9"><input type="text" id="latitude" name="latitude" placeholder="Latitude" class="form-control" value="{{old('name', $city->latitude)}}"></div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3"><label for="longitude" class=" form-control-label">Longitude</label></div>
                                    <div class="col-12 col-md-9"><input type="text" id="longitude" name="longitude" placeholder="Longitude" class="form-control" value="{{old('name', $city->longitude)}}"></div>
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
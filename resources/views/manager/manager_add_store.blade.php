@extends('layout.manager')

@section('content')


    <div class="container-form">
        <div class="panel-heading">Ajout d'un nouveau magasin</div>

<<<<<<< HEAD
        <label for="address">Adresse :</label>
        <input type="text" class="form-control" id="address" name="address" required >
=======
        <form method="post" action="{{ route ('manager_add_store') }}" enctype="multipart/form-data">
            {{ csrf_field() }}
>>>>>>> ea6da389cab0ddb454e1ec94f8694625fbae78bc

            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                <label for="name" class="col-md-4 control-label">Nom</label>

                <div class="col-md-6">
                    <input id="name" name="name" type="text" class="form-control" value="bob" autofocus>

                    @if ($errors->has('name'))
                        <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                    @endif
                </div>
            </div>
            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                <label for="name" class="col-md-4 control-label">Adresse</label>

                <div class="col-md-6">
                    <input id="address" name="address" type="text" class="form-control" value="bob" autofocus>

                    @if ($errors->has('name'))
                        <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                    @endif
                </div>
            </div>
            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                <label for="name" class="col-md-4 control-label">Téléphone</label>

<<<<<<< HEAD
       <!-- <label for="latitude">Latitude :</label>
        <input type="text" class="form-control" id="latitude" name="latitude" value="50"> -->

       <!-- <label for="longitude">Longitude :</label>
        <input type="text" class="form-control" id="longitude" name="longitude" value="50"> -->

        <input id="latitude" name="latitude" type="hidden">
        <input id="longitude" name="longitude" type="hidden">

        <label for="city_name">Ville :</label>
        <input type="text" class="form-control" id="city_name" name="city_name" required onchange="testAdddress()">
=======
                <div class="col-md-6">
                    <input id="phone" name="phone" value="0202020202" type="text" class="form-control" autofocus>

                    @if ($errors->has('name'))
                        <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                    @endif
                </div>
            </div>
            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                <label for="name" class="col-md-4 control-label">Email</label>

                <div class="col-md-6">
                    <input id="email" name="email" value="bob@gmail.com" type="text" class="form-control" autofocus>
>>>>>>> ea6da389cab0ddb454e1ec94f8694625fbae78bc

                    @if ($errors->has('name'))
                        <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                    @endif
                </div>
            </div>
            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                <label for="name" class="col-md-4 control-label">SIRET</label>

                <div class="col-md-6">
                    <input id="siret" name="siret" value="02022" type="text" class="form-control" autofocus>

<<<<<<< HEAD
        <br><br><input type="submit" value="Ajouter"><br><br><br><br><br><br>
    </form>
@endsection

<script>


    function testAdddress(){
        let address = document.getElementById('address').value;
        address=address.replace(/ /g,"+");
        let city = document.getElementById('city_name').value;
        let full_address = address + ',' + city;

        let addressGPS = 'https://nominatim.openstreetmap.org/search?q='+ full_address +'&format=json&polygon=1&addressdetails=0';
        $get(addressGPS, null, printTest , error);
    }

    function printTest() {
        let json = JSON.parse(xhttp.responseText);
        console.log('json', json);
        console.log('---------');
        console.log('lat/long', json[0].lat + '/' + json[0].lon);

        document.getElementById('latitude').value = json[0].lat;
        document.getElementById('longitude').value = json[0].lon;
    }

</script>
=======
                    @if ($errors->has('name'))
                        <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                    @endif
                </div>
            </div>
            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                <label for="name" class="col-md-4 control-label">Photo 1 (intérieur du magasin) :</label>

                <div class="col-md-6">
                    <input type="file" class="form-control" id="photoInside" name="photoInside">

                    @if ($errors->has('name'))
                        <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                    @endif
                </div>
            </div>
            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                <label for="name" class="col-md-4 control-label">Photo 2 (extérieur du magasin) :</label>

                <div class="col-md-6">
                    <input type="file" class="form-control" id="photoOutside" name="photoOutside">

                    @if ($errors->has('name'))
                        <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                    @endif
                </div>
            </div>
            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                <label for="name" class="col-md-4 control-label">Latitude</label>

                <div class="col-md-6">
                    <input id="latitude" name="latitude" value="50" type="text" class="form-control" autofocus>

                    @if ($errors->has('name'))
                        <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                    @endif
                </div>
            </div>
            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                <label for="name" class="col-md-4 control-label">Longitude</label>

                <div class="col-md-6">
                    <input id="longitude" name="longitude" value="50" type="text" class="form-control" autofocus>

                    @if ($errors->has('name'))
                        <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                    @endif
                </div>
            </div>
            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                <label for="name" class="col-md-4 control-label">Ville</label>

                <div class="col-md-6">
                    <input id="city_name" name="city_name" type="text" class="form-control" autofocus>

                    @if ($errors->has('name'))
                        <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                    @endif
                </div>
            </div>

            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                <label for="name" class="col-md-4 control-label">Catégorie</label>

                <div class="col-md-6">
                    <select id="category_id" name="category_id">
                        @foreach($categories as $category )
                            <option value={{$category->id}}>{{$category->name}}</option>
                        @endforeach
                    </select>

                    @if ($errors->has('name'))
                        <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                    @endif
                </div>
            </div>

            {{--<br><label for="category_id">Catégorie :</label><br>
            <select id="category_id" name="category_id">
                @foreach($categories as $category )
                    <option value={{$category->id}}>{{$category->name}}</option>
                @endforeach
            </select>--}}

            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                <label for="name" class="col-md-4 control-label">Sous-catégorie</label>

                <div class="col-md-6">
                    <select id="subcategory_id" name="subcategory_id">
                        @foreach($subcategories as $subcategory )
                            <option value={{$subcategory->id}}>{{$subcategory->name}}</option>
                        @endforeach
                    </select>

                    @if ($errors->has('name'))
                        <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                    @endif
                </div>
            </div>

            {{--<br><br><label for="subcategory_id">Sous-Catégorie :</label><br>
            <select id="subcategory_id" name="subcategory_id">
                @foreach($subcategories as $subcategory )
                    <option value={{$subcategory->id}}>{{$subcategory->name}}</option>
                @endforeach
            </select>--}}
            <button type="submit" class="btn1 btn-form">
                Ajouter
            </button>

        </form>
    </div>
@endsection
>>>>>>> ea6da389cab0ddb454e1ec94f8694625fbae78bc

@extends('layout.manager')

@section('content')


    <div class="container-form">
        <div class="panel-heading">Ajout d'un nouveau magasin</div>

        <form method="post" action="{{ route ('manager_add_store') }}" enctype="multipart/form-data">
            {{ csrf_field() }}

            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                <label for="name" class="col-md-4 control-label">Nom *</label>

                <div class="col-md-6">
                    <input id="name" name="name" type="text" class="form-control" value="bob" required autofocus>

                    @if ($errors->has('name'))
                        <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                    @endif
                </div>
            </div>
            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                <label for="name" class="col-md-4 control-label">Adresse *</label>

                <div class="col-md-6">
                    <input id="address" name="address" type="text" class="form-control" value="bob" required onchange="testAdddress()" autofocus>

                    @if ($errors->has('name'))
                        <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                    @endif
                </div>
            </div>
            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                <label for="name" class="col-md-4 control-label">Téléphone *</label>

                <div class="col-md-6">
                    <input id="phone" name="phone" value="0202020202" type="text" required class="form-control" autofocus>

                    @if ($errors->has('name'))
                        <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                    @endif
                </div>
            </div>
            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                <label for="name" class="col-md-4 control-label">Email *</label>

                <div class="col-md-6">
                    <input id="email" name="email" value="bob@gmail.com" type="text" class="form-control" autofocus>

                    @if ($errors->has('name'))
                        <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                    @endif
                </div>
            </div>
            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                <label for="name" class="col-md-4 control-label">SIRET *</label>

                <div class="col-md-6">
                    <input id="siret" name="siret" value="02022" type="text" required class="form-control" autofocus>

                    @if ($errors->has('name'))
                        <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                    @endif
                </div>
            </div>
            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                <label for="name" class="col-md-4 control-label">Photo 1 (intérieur du magasin) *</label>

                <div class="col-md-6">
                    <input type="file" class="form-control" id="photoInside" required name="photoInside">

                    @if ($errors->has('name'))
                        <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                    @endif
                </div>
            </div>
            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                <label for="name" class="col-md-4 control-label">Photo 2 (extérieur du magasin) *</label>

                <div class="col-md-6">
                    <input type="file" class="form-control" id="photoOutside" required name="photoOutside">

                    @if ($errors->has('name'))
                        <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                    @endif
                </div>
            </div>

            <input id="latitude" name="latitude" type="hidden">
            <input id="longitude" name="longitude" type="hidden">

            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                <label for="name" class="col-md-4 control-label">Ville *</label>

                <div class="col-md-6">
                    <input id="city_name" name="city_name" type="text" class="form-control" required onchange="testAdddress()" autofocus>

                    @if ($errors->has('name'))
                        <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                    @endif
                </div>
            </div>

            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                <label for="name" class="col-md-4 control-label">Catégorie *</label>

                <div class="col-md-6">
                    <select id="category_id" required name="category_id">
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
                <label for="name" class="col-md-4 control-label">Sous-catégorie *</label>

                <div class="col-md-6">
                    <select id="subcategory_id" required name="subcategory_id">
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

        <i>* Champ obligatoire</i>
    </div>
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
@extends ('layout.manager')

@section ('content')
    <div class="container-form">
        <div class="panel-heading">Edition du Magasin:  {{ $store->name}}</div>
        {{--<h2> Edition du Magasin:  {{ $store->name}}</h2>--}}

        <form method="post" action="{{ route ('manager_edit_store_post') }}" enctype="multipart/form-data">

            <input type="hidden" name="store_id" value="{{$store->id}}">
            {{ csrf_field() }}
            <div class="form-group">
                <label for="name">Nom :</label>
                <input type="text" class="form-control" id="name" name="name"
                       value="{{old('name', $store->name)}}">
            </div>

            <div class="form-group">
                <label for="address">Adresse :</label>
                <input type="text" class="form-control" id="address" name="address"
                       value="{{old('name', $store->address)}}" onchange="testAdddress()">
            </div>

            <div class="form-group">
                <label for="phone">Téléphone :</label>
                <input type="tel" class="form-control" id="phone" name="phone"
                       value="{{old('name', $store->phone)}}">
            </div>

            <div class="form-group">
                <label for="email">Email :</label>
                <input type="email" class="form-control" id="email" name="email"
                       value="{{old('name', $store->email)}}">
            </div>

            <div class="form-group">
                <label for="siret">SIRET :</label>
                <input type="number" class="form-control" id="siret" name="siret"
                       value="{{old('name', $store->siret)}}">
            </div>

            <div class="form-group">
                <label for="photoInside">Photo 1:</label>
                <input type="file" class="form-control" id="photoInside" name="photoInside"
                       value="{{old('name', $store->photoInside)}}">
            </div>

            <div class="form-group">
                <label for="photoOutside">Photo 2:</label>
                <input type="file" class="form-control" id="photoOutside" name="photoOutside"
                       value="{{old('name', $store->photoOutside)}}">
            </div>

            <input id="latitude" name="latitude" type="hidden">
            <input id="longitude" name="longitude" type="hidden">

            <div class="form-group">
                <label for="city_id">Ville:</label>
                <input type="text" class="form-control" id="city_name" name="city_name"
                       value="{{old('name', $city->name)}}" onchange="testAdddress()">
            </div>

            <div class="form-group">
                <label for="category_id">Catégorie :</label>
                <select id="category_id" name="category_id">
                    @foreach($categories as $thecategory )
                        @if($thecategory->id === $category->id)
                            <option value={{$thecategory->id}} selected>{{$thecategory->name}}</option>
                        @else
                            <option value={{$thecategory->id}}>{{$thecategory->name}}</option>
                        @endif
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="subcategory_id">Sous-Catégorie :</label>
                <select id="subcategory_id" name="subcategory_id">
                    @foreach($subcategories as $thesubcategory )
                        @if($thesubcategory->id === $subcategory->id)
                            <option value={{$thesubcategory->id}} selected>{{$thesubcategory->name}}</option>
                        @else
                            <option value={{$thesubcategory->id}}>{{$thesubcategory->name}}</option>
                        @endif
                    @endforeach
                </select>
            </div>



            <input type="hidden" name="user_id" value="{{$user->id}}">

            <button type="submit" class="btn1 btn-form">
                Modifier
            </button>
        </form>
    </div>
@endsection

<script>
    function testAdddress(){


        let address = document.getElementById('address').value;
        let city = document.getElementById('city_name').value;
        address=address.replace(/ /g,"+");
        let full_address = address + ',' + city;

        if(address && city){
            console.log('remplis');
            console.log(full_address);

            let addressGPS = 'https://nominatim.openstreetmap.org/search?q='+ full_address +'&format=json&polygon=1&addressdetails=0';
            $get(addressGPS, null, printTest , error);
        }

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

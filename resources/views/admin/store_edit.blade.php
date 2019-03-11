@extends ('layout.app')

@section ('content')

    <a href="{{url ('admin\store\list')}}">Retour</a><br><br>
    <h2> Edition du Magasin:  {{ $store->name}}</h2>

    <form method="post" action="{{ route ('store_edit_post') }}">

        <input type="hidden" name="store_id" value="{{$store->id}}">
        {{ csrf_field() }}
        <label for="name">Nom :</label>
        <input type="text" class="form-control" id="name" name="name"
               value="{{old('name', $store->name)}}">

        <label for="address">Adresse :</label>
        <input type="text" class="form-control" id="address" name="address"
               value="{{old('name', $store->address)}}">

        <label for="phone">Téléphone :</label>
        <input type="tel" class="form-control" id="phone" name="phone"
               value="{{old('name', $store->phone)}}">

        <label for="email">Email :</label>
        <input type="email" class="form-control" id="email" name="email"
               value="{{old('name', $store->email)}}">

        <label for="siret">SIRET :</label>
        <input type="number" class="form-control" id="siret" name="siret"
               value="{{old('name', $store->siret)}}">

        <label for="photoInside">Photo 1:</label>
        <input type="text" class="form-control" id="photoInside" name="photoInside"
               value="{{old('name', $store->photoInside)}}">

        <label for="photoOutside">Photo 2:</label>
        <input type="text" class="form-control" id="photoOutside" name="photoOutside"
               value="{{old('name', $store->photoOutside)}}">

        <label for="latitude">Latitude:</label>
        <input type="number" class="form-control" id="latitude" name="latitude"
               value="{{old('name', $store->latitude)}}">

        <label for="longitude">Longitude:</label>
        <input type="number" class="form-control" id="longitude" name="longitude"
               value="{{old('name', $store->longitude)}}">

        <label for="city_id">Ville:</label>
        <input type="text" class="form-control" id="city_id" name="city_id"
               value="{{old('name', $store->city_id)}}">

        <br><br><label for="category_id">Catégorie :</label>
        <select id="category_id" name="category_id">
            @foreach($categories as $thecategory )
                @if($thecategory->id === $category->id)
                    <option value={{$thecategory->id}} selected>{{$thecategory->name}}</option>
                @else
                    <option value={{$thecategory->id}}>{{$thecategory->name}}</option>
                @endif
            @endforeach
        </select>

        <br><br><label for="subcategory_id">Sous-Catégorie :</label>
        <select id="subcategory_id" name="subcategory_id">
            @foreach($subcategories as $thesubcategory )
                @if($thesubcategory->id === $subcategory->id)
                    <option value={{$thesubcategory->id}} selected>{{$thesubcategory->name}}</option>
                @else
                    <option value={{$thesubcategory->id}}>{{$thesubcategory->name}}</option>
                @endif
            @endforeach
        </select>

        <br><br><label for="user_id">Responsable :</label>
        <select id="user_id" name="user_id">
            @foreach($users as $theuser )
                @if($theuser->id === $user->id)
                    <option value={{$theuser->id}} selected>{{$theuser->name}}</option>
                @else
                    <option value={{$theuser->id}}>{{$theuser->name}}</option>
                @endif
            @endforeach
        </select>

        <br><br><input type="submit" value="Modifier"><br><br><br><br><br><br><br><br><br><br>
    </form>
@endsection
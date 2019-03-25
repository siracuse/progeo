@extends ('layout.admin')

@section ('content')

    <div class="content mt-3">
        <div class="animated fadeIn">
            <div class="row">
                <div class=" col-lg-12">

                    <div class="card">
                        <div class="card-header">
                            <strong>Modification </strong> du magasin {{ $store->name}}
                        </div>
                        <div class="card-body card-block">
                            <form action="{{ route ('store_edit_post') }}" method="post" class="form-horizontal">
                                <input type="hidden" name="store_id" value="{{$store->id}}">
                                {{ csrf_field() }}
                                <div class="row form-group">
                                    <div class="col col-md-3"><label for="name" class=" form-control-label">Nom</label></div>
                                    <div class="col-12 col-md-9"><input type="text" id="name" name="name" placeholder="Nom" class="form-control" value="{{old('name', $store->name)}}"></div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3"><label for="address" class=" form-control-label">Adresse</label></div>
                                    <div class="col-12 col-md-9"><input type="text" id="address" name="address" placeholder="Adresse" class="form-control" value="{{old('name', $store->address)}}"></div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3"><label for="city_name" class=" form-control-label">Ville</label></div>
                                    <div class="col-12 col-md-9"><input type="text" id="city_name" name="city_name" placeholder="Ville" class="form-control" value="{{old('name', $store->city_id)}}"></div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3"><label for="phone" class=" form-control-label">Téléphone</label></div>
                                    <div class="col-12 col-md-9"><input type="number" id="phone" name="phone" placeholder="Téléphone" class="form-control" value="{{old('name', $store->phone)}}"></div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3"><label for="email" class=" form-control-label">Email</label></div>
                                    <div class="col-12 col-md-9"><input type="email" id="email" name="email" placeholder="Email" class="form-control" value="{{old('name', $store->email)}}"></div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3"><label for="siret" class=" form-control-label">SIRET</label></div>
                                    <div class="col-12 col-md-9"><input type="number" id="siret" name="siret" placeholder="SIRET" class="form-control" value="{{old('name', $store->siret)}}"></div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3"><label for="photoInside" class=" form-control-label">Photo 1</label></div>
                                    <div class="col-12 col-md-9"><input type="text" id="photoInside" name="photoInside" placeholder="Photo 1" class="form-control" value="{{old('name', $store->photoInside)}}"></div>
                                </div>
                                {{--<div class="row form-group">--}}
                                {{--<div class="col col-md-3"><label for="file-input" class=" form-control-label">File input</label></div>--}}
                                {{--<div class="col-12 col-md-9"><input type="file" id="file-input" name="file-input" class="form-control-file"></div>--}}
                                {{--</div>--}}
                                <div class="row form-group">
                                    <div class="col col-md-3"><label for="photoOutside" class=" form-control-label">Photo 2</label></div>
                                    <div class="col-12 col-md-9"><input type="text" id="photoOutside" name="photoOutside" placeholder="Photo 2" class="form-control" value="{{old('name', $store->photoOutside)}}"></div>
                                </div>
                                {{--<div class="row form-group">--}}
                                {{--<div class="col col-md-3"><label for="file-input" class=" form-control-label">File input</label></div>--}}
                                {{--<div class="col-12 col-md-9"><input type="file" id="file-input" name="file-input" class="form-control-file"></div>--}}
                                {{--</div>--}}
                                <div class="row form-group">
                                    <div class="col col-md-3"><label for="latitude" class=" form-control-label">Latitude</label></div>
                                    <div class="col-12 col-md-9"><input type="text" id="latitude" name="latitude" placeholder="Latitude" class="form-control" value="{{old('name', $store->longitude)}}"></div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3"><label for="longitude" class=" form-control-label">Longitude</label></div>
                                    <div class="col-12 col-md-9"><input type="text" id="longitude" name="longitude" placeholder="Longitude" class="form-control" value="{{old('name', $store->latitude)}}"></div>
                                </div>


                                <div class="row form-group">
                                    <div class="col col-md-3"><label for="category_id" class=" form-control-label">Catégorie</label></div>
                                    <div class="col-12 col-md-9">
                                        <select name="category_id" id="category_id" class="form-control">
                                            @foreach($categories as $thecategory )
                                                @if($thecategory->id === $category->id)
                                                    <option value={{$thecategory->id}} selected>{{$thecategory->name}}</option>
                                                @else
                                                    <option value={{$thecategory->id}}>{{$thecategory->name}}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="row form-group">
                                    <div class="col col-md-3"><label for="subcategory_id" class=" form-control-label">Sous-Catégorie</label></div>
                                    <div class="col-12 col-md-9">
                                        <select name="subcategory_id" id="subcategory_id" class="form-control">
                                            @foreach($subcategories as $thesubcategory )
                                                @if($thesubcategory->id === $subcategory->id)
                                                    <option value={{$thesubcategory->id}} selected>{{$thesubcategory->name}}</option>
                                                @else
                                                    <option value={{$thesubcategory->id}}>{{$thesubcategory->name}}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="row form-group">
                                    <div class="col col-md-3"><label for="user_id" class=" form-control-label">Responsable</label></div>
                                    <div class="col-12 col-md-9">
                                        <select name="user_id" id="user_id" class="form-control">
                                            @foreach($users as $theuser )
                                                @if($theuser->id === $user->id)
                                                    <option value={{$theuser->id}} selected>{{$theuser->name}}</option>
                                                @else
                                                    <option value={{$theuser->id}}>{{$theuser->name}}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <input type="submit" value="Modifier" name="submit" class="btn btn-primary btn-sm">
                                <a href="../list"><input type="button" value="Annuler"  class="btn btn-danger btn-sm"></a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
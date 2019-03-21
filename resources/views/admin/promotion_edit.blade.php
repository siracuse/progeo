@extends ('layout.admin')

@section ('content')
    <div class="content mt-3">
        <div class="animated fadeIn">
            <div class="row">
                <div class=" col-lg-12">

                    <div class="card">
                        <div class="card-header">
                            <strong>Modification </strong> d'une promotion
                        </div>
                        <div class="card-body card-block">
                            <form action="{{ route('promotion_edit_post')}}" method="post" class="form-horizontal">
                                <input type="hidden" name="promotion_id" value="{{$promotion->id}}">
                                {{ csrf_field() }}
                                <div class="row form-group">
                                    <div class="col col-md-3"><label for="name" class=" form-control-label">Nom</label></div>
                                    <div class="col-12 col-md-9"><input type="text" id="name" name="name" placeholder="Nom" class="form-control" value="{{old('name', $promotion->name)}}" required></div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3"><label for="dateStart" class=" form-control-label">Date début</label></div>
                                    <div class="col-12 col-md-9"><input type="text" id="dateStart" name="dateStart" placeholder="Date de début" class="form-control" value="{{old('name', $promotion->startDate)}}" required></div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3"><label for="dateEnd" class=" form-control-label">Date fin</label></div>
                                    <div class="col-12 col-md-9"><input type="text" id="dateEnd" name="dateEnd" placeholder="Date de fin" class="form-control" value="{{old('name', $promotion->endDate)}}" required></div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3"><label for="photo1" class=" form-control-label">Photo 1</label></div>
                                    <div class="col-12 col-md-9"><input type="text" id="photo1" name="photo1" placeholder="Photo 1" class="form-control" value="{{old('name', $promotion->photo1)}}"></div>
                                </div>
                                {{--<div class="row form-group">--}}
                                {{--<div class="col col-md-3"><label for="file-input" class=" form-control-label">File input</label></div>--}}
                                {{--<div class="col-12 col-md-9"><input type="file" id="file-input" name="file-input" class="form-control-file"></div>--}}
                                {{--</div>--}}
                                <div class="row form-group">
                                    <div class="col col-md-3"><label for="photo2" class=" form-control-label">Photo 2</label></div>
                                    <div class="col-12 col-md-9"><input type="text" id="photo2" name="photo2" placeholder="Photo 2" class="form-control" value="{{old('name', $promotion->photo2)}}"></div>
                                </div>
                                {{--<div class="row form-group">--}}
                                {{--<div class="col col-md-3"><label for="file-input" class=" form-control-label">File input</label></div>--}}
                                {{--<div class="col-12 col-md-9"><input type="file" id="file-input" name="file-input" class="form-control-file"></div>--}}
                                {{--</div>--}}
                                <div class="row form-group">
                                    <div class="col col-md-3"><label for="storeName" class=" form-control-label">Nom du magasin</label></div>
                                    <div class="col-12 col-md-9"><input type="text" id="storeName" name="storeName" placeholder="Nom du magasin" class="form-control" value="{{old('name', $promotion->store->name)}}" required></div>
                                </div>

                                <div class="row form-group">
                                    <div class="col col-md-3"><label class=" form-control-label">Activer directement la promotion ?</label></div>
                                    <div class="col col-md-9">
                                        @if ($promotion->activated === 0)
                                            <div class="form-check">
                                                <div class="radio">
                                                    <label for="oui" class="form-check-label ">
                                                        <input type="radio" id="oui" name="activated" value="1" class="form-check-input" >Oui
                                                    </label>
                                                </div>
                                                <div class="radio">
                                                    <label for="non" class="form-check-label ">
                                                        <input type="radio" id="non" name="activated" value="0" class="form-check-input" checked>Non
                                                    </label>
                                                </div>
                                            </div>
                                        @else
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
                                        @endif
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

    {{--<a href="{{url ('admin\promotion\list')}}">Retour</a><br><br>--}}
    {{--<h2>Modification</h2>--}}

    {{--<form method="post" action="{{ route ('promotion_edit_post') }}">--}}

        {{--<input type="hidden" name="promotion_id" value="{{$promotion->id}}">--}}
        {{--{{ csrf_field() }}--}}

        {{--<label for="name">Nom :</label>--}}
        {{--<input type="text" class="form-control" value="{{old('name', $promotion->name)}}" id="name" name="name">--}}

        {{--<label for="dateStart">Date début :</label>--}}
        {{--<input type="text" class="form-control" value="{{old('startDate', $promotion->startDate)}}" id="dateStart" name="dateStart">--}}

        {{--<label for="dateEnd">Date fin :</label>--}}
        {{--<input type="text" class="form-control" value="{{old('endDate', $promotion->endDate)}}" id="dateEnd" name="dateEnd">--}}

        {{--<label for="photo1">Photo 1 :</label>--}}
        {{--<input type="text" class="form-control" value="{{old('photo1', $promotion->photo1)}}" id="photo1" name="photo1">--}}

        {{--<label for="photo2">Photo 2 :</label>--}}
        {{--<input type="text" class="form-control" value="{{old('photo2', $promotion->photo2)}}" id="photo2" name="photo2">--}}

        {{--<label for="storeName">Nom du magasin :</label>--}}
        {{--<input type="text" class="form-control" id="storeName" name="storeName" value="{{old('storeName', $promotion->store->name)}}">--}}

        {{--<p>Publication :</p>--}}
        {{--@if ($promotion->activated === 0)--}}
            {{--<input type="radio" id="oui" name="activated" value="1">--}}
            {{--<label for="oui">Oui</label>--}}
            {{--<input type="radio" id="non" name="activated" value="0" checked>--}}
            {{--<label for="non">Non</label>--}}
        {{--@else--}}
            {{--<input type="radio" id="oui" name="activated" value="1" checked>--}}
            {{--<label for="oui">Oui</label>--}}
            {{--<input type="radio" id="non" name="activated" value="0">--}}
            {{--<label for="non">Non</label>--}}
        {{--@endif--}}

        {{--<br><br><input type="submit" value="Ajouter"><br><br><br><br><br><br>--}}
    {{--</form>--}}
@endsection
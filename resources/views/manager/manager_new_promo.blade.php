@extends('layout.manager')

@section('content')
    <div class="container-form">
        <div class="panel-heading">Ajout d'une promotion pour {{$store->name}}</div>

        <form method="post" action="{{ route ('manager_add_promo_post', ['store_id' => $store->id]) }}" enctype="multipart/form-data">
            {{ csrf_field() }}

            <div class="form-group">
                <label for="name">Nom *</label>
                <input type="text" class="form-control" id="name" required name="name" value="bob">
            </div>

            <div class="form-group">
                <label for="photo1">Photo :</label>
                <input type="file" class="form-control" id="photo" name="photo" >
            </div>

            {{--<div class="form-group">--}}
                <p class="active-promo-texte">Activer directement la promotion ? *</p>
            {{--</div>--}}
            <div class="form-group">
                <div>
                <input class="input-radio" type="radio" id="oui" name="activated" value="1" checked>
                <label for="oui">Oui</label>
                </div>
            </div>
            <div class="form-group">
                <div>
                <input class="input-radio" type="radio" id="non" name="activated" value="0" >
                <label for="non">Non</label>
                </div>
            </div>

            <input type="hidden" name="store_id" value="{{$store->id}}">

            <button type="submit" class="btn1 btn-form">
                Ajouter
            </button>
        </form>

        <i>* Champ obligatoire</i>
    </div>

@endsection
@extends ('layout.app')

@section ('content')
    <a href="{{url ('admin\promotion\list')}}">Retour</a><br><br>
    <h2>Modification</h2>

    <form method="post" action="{{ route ('promotion_edit_post') }}">

        <input type="hidden" name="promotion_id" value="{{$promotion->id}}">
        {{ csrf_field() }}

        <label for="name">Nom :</label>
        <input type="text" class="form-control" value="{{old('name', $promotion->name)}}" id="name" name="name">

        <label for="dateStart">Date début :</label>
        <input type="text" class="form-control" value="{{old('startDate', $promotion->startDate)}}" id="dateStart" name="dateStart">

        <label for="dateEnd">Date fin :</label>
        <input type="text" class="form-control" value="{{old('endDate', $promotion->endDate)}}" id="dateEnd" name="dateEnd">

        <label for="photo1">Photo 1 :</label>
        <input type="text" class="form-control" value="{{old('photo1', $promotion->photo1)}}" id="photo1" name="photo1">

        <label for="photo2">Photo 2 :</label>
        <input type="text" class="form-control" value="{{old('photo2', $promotion->photo2)}}" id="photo2" name="photo2">

        <label for="storeName">Nom du magasin :</label>
        <input type="text" class="form-control" id="storeName" name="storeName" value="{{old('storeName', $promotion->store->name)}}">

        <p>Publication :</p>
        @if ($promotion->activated === 0)
            <input type="radio" id="oui" name="activated" value="1">
            <label for="oui">Oui</label>
            <input type="radio" id="non" name="activated" value="0" checked>
            <label for="non">Non</label>
        @else
            <input type="radio" id="oui" name="activated" value="1" checked>
            <label for="oui">Oui</label>
            <input type="radio" id="non" name="activated" value="0">
            <label for="non">Non</label>
        @endif

        <br><br><input type="submit" value="Ajouter"><br><br><br><br><br><br>
    </form>
@endsection
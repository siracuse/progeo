@extends('layout.manager')

@section('content')
    <div class="panel-heading">Liste des promos</div>


    <table class="table">
        <thead>
        <tr>
            <th scope="col">Nom de la promo</th>
            <th scope="col">Magasin</th>
            <th scope="col">Date debut -> Expiration</th>
            <th scope="col">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($promos as $promo)
            <tr>
                <td>{{$promo->promo_name}}</td>
                <td>{{$promo->store_name}}</td>
                <td>{{$promo->startDate}} -> {{$promo->endDate}}</td>
                @if($promo->activated == 0)
                    <td> <a class="btn-add-promo" href="{{url ('manager\refresh_promos', ['promo_id' => $promo->promo_id, 'activated' => 'no'])}}">Réactiver</a></td>
                @else
                    <td> <a class="btn-supp" href="{{url ('manager\refresh_promos', ['promo_id' => $promo->promo_id, 'activated' => 'yes'])}}">Désactiver</a></td>
                @endif
            </tr>
        @endforeach

        </tbody>
    </table>



@endsection
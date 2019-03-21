@extends('layout.admin')

@section('content')
    <div class="content mt-3">
        <div class="animated fadeIn">
            <div class="row">
                <div class=" col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <strong class="card-title">Liste des villes</strong>
                            <a href="{{url ('admin\city\new')}}" class="pull-right">Ajouter une ville +</a>
                        </div>
                        <div class="card-body">
                            <table class="table table-striped">
                                <thead>
                                <tr>
                                    <th scope="col">Nom</th>
                                    <th scope="col">Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($cities as $city )
                                    <tr>
                                        <td>{{$city->name}} </td>
                                        <td>
                                            <a href="{{url ('admin\city\edit', ['city_id' => $city->id])}}">Modifier</a> /
                                            <a href="{{url ('admin\city\delete', ['city_id' => $city->id])}}">Supprimer</a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        {{$cities->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
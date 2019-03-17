@extends('layout.admin')

@section('content')
    <div class="content mt-3">
        <div class="animated fadeIn">
            <div class="row">
                <div class=" col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <strong class="card-title">Liste des Magasins</strong>
                            <a href="{{url ('admin\store\new')}}" class="pull-right">Ajouter un magasin +</a>
                        </div>
                        <div class="card-body">
                            <table class="table table-striped">
                                <thead>
                                <tr>
                                    <th scope="col">Magasin</th>
                                    <th scope="col">Responsable</th>
                                    <th scope="col">Adresse</th>
                                    <th scope="col">Téléphone</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Actions</th>
                                </tr>
                                </thead>
                                <tbody>

                                @foreach($stores as $store )
                                    <tr>
                                        <td>{{$store->name}} </td>
                                        <td>{{$store->user->name}} </td>
                                        <td>{{$store->address}} </td>
                                        <td>{{$store->phone}} </td>
                                        <td>{{$store->email}} </td>
                                        <td>
                                            <a href="{{url ('admin\store\edit', ['store_id' => $store->id])}}">Modifier</a> /
                                            <a href="{{url ('admin\store\delete', ['store_id' => $store->id])}}">Supprimer</a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{$stores->links()}}
@endsection
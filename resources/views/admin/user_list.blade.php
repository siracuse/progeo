@extends('layout.admin')

@section('content')
    <div class="content mt-3">
        <div class="animated fadeIn">
            <div class="row">
                <div class=" col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <strong class="card-title">Liste des Utilisateurs</strong>
                            <a href="{{url ('admin\user\new')}}" class="pull-right">Ajouter un utilisateur +</a>
                        </div>
                        <div class="card-body">
                            <table class="table table-striped">
                                <thead>
                                <tr>
                                    <th scope="col">Nom</th>
                                    <th scope="col">Prénom</th>
                                    <th scope="col">Téléphone</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Responsable</th>
                                    <th scope="col">Actions</th>
                                </tr>
                                </thead>
                                <tbody>

                                @foreach($users as $user )
                                    <tr>
                                        <td>{{$user->name}} </td>
                                        <td>{{$user->firstname}} </td>
                                        <td>{{$user->phone}} </td>
                                        <td>{{$user->email}} </td>
                                        <td>{{$user->is_resp}} </td>
                                        <td>
                                            <button type="button" class="btn btn-warning" disabled>
                                                <a class="myBt" href="{{url ('admin\user\edit', ['user_id' => $user->id])}}">Modifier</a>
                                            </button>
                                            /
                                            <button type="button" class="btn btn-danger" disabled>
                                                <a onclick="return myFunction();" class="myBt" href="{{url ('admin\user\delete', ['user_id' => $user->id])}}">Supprimer</a>
                                            </button>
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

@endsection
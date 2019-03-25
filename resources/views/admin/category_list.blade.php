@extends('layout.admin')

@section('content')
    <div class="content mt-3">
        <div class="animated fadeIn">
            <div class="row">
                <div class=" col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <strong class="card-title">Liste des catégories</strong>
                            <a href="{{url ('admin\category\new')}}" class="pull-right">Ajouter une catégorie +</a>
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
                                @foreach($categories as $category )
                                    <tr>
                                        <td>{{$category->name}} </td>
                                        <td>
                                            <button type="button" class="btn btn-warning" disabled>
                                                <a class="myBt" href="{{url ('admin\category\edit', ['category_id' => $category->id])}}">Modifier
                                                </a>
                                            </button>
                                                /
                                            <button type="button" class="btn btn-danger" disabled>
                                                <a onclick="return myFunction();" class="myBt" href="{{url ('admin\category\delete', ['category_id' => $category->id])}}">Supprimer</a>
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
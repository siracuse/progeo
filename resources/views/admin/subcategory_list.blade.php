@extends('layout.admin')

@section('content')
    <div class="content mt-3">
        <div class="animated fadeIn">
            <div class="row">
                <div class=" col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <strong class="card-title">Liste des sous-catégories</strong>
                            <a href="{{url ('admin\subcategory\new')}}" class="pull-right">Ajouter une sous-catégorie +</a>
                        </div>
                        <div class="card-body">
                            <table class="table table-striped">
                                <thead>
                                <tr>
                                    <th scope="col">Nom</th>
                                    <th scope="col">Catégorie</th>
                                    <th scope="col">Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($subcategories as $subcategory )
                                    <tr>
                                        <td>{{$subcategory->name}} </td>
                                        <td>{{$subcategory->category->name}} </td>
                                        <td>
                                            <button type="button" class="btn btn-warning" disabled>
                                                <a class="myBt" href="{{url ('admin\subcategory\edit', ['subcategory_id' => $subcategory->id])}}">Modifier</a>
                                            </button>
                                            /
                                            <button type="button" class="btn btn-danger" disabled>
                                                <a onclick="return myFunction();" class="myBt" href="{{url ('admin\subcategory\delete', ['subcategory_id' => $subcategory->id])}}">Supprimer</a>
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
    {{----}}
    {{--<h2> Liste des sous-catégories </h2>--}}
    {{--<a href="{{url ('admin\subcategory\new')}}">Ajouter une sous-catégorie +</a><br><br>--}}
    {{--<table>--}}
        {{--<tbody>--}}
        {{--<tr>--}}
            {{--<td style="width:50px;"><b>ID</b></td>--}}
            {{--<td style="width:150px;"><b>Nom</b></td>--}}
            {{--<td style="width:150px;"><b>Catégorie</b></td>--}}
            {{--<td style="width:150px;"><b>Actions</b></td>--}}
        {{--</tr>--}}
        {{--@foreach($subcategories as $subcategory )--}}
            {{--<tr>--}}
                {{--<td>{{$subcategory->id}} </td>--}}
                {{--<td>{{$subcategory->name}} </td>--}}
                {{--<td>{{$subcategory->category->name}} </td>--}}
                {{--<td>--}}
                    {{--<a href="{{url ('admin\subcategory\edit', ['subcategory_id' => $subcategory->id])}}">Modifier</a> /--}}
                    {{--<a href="{{url ('admin\subcategory\delete', ['subcategory_id' => $subcategory->id])}}">Supprimer</a>--}}
                {{--</td>--}}
            {{--</tr>--}}
        {{--@endforeach--}}
        {{--</tbody>--}}
    {{--</table>--}}
@endsection
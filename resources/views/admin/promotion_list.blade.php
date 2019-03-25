@extends('layout.admin')


@section('content')
    <div class="content mt-3">
        <div class="animated fadeIn">
            <div class="row">
                <div class=" col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <strong class="card-title">Liste des promotions</strong>
                            <a href="{{url ('admin\promotion\new')}}" class="pull-right">Ajouter une promotion +</a>
                        </div>
                        <div class="card-body">
                            <table class="table table-striped">
                                <thead>
                                <tr>
                                    <th scope="col">Nom</th>
                                    <th scope="col">Date début</th>
                                    <th scope="col">Date fin</th>
                                    <th scope="col">Magasin</th>
                                    <th scope="col">Publier</th>
                                    <th scope="col">Code Promo</th>
                                    <th scope="col">Code Avis</th>
                                    <th scope="col">Actions</th>
                                </tr>
                                </thead>
                                <tbody>

                                @foreach($promotions as $promotion )
                                    <tr>
                                        <td>{{$promotion->name}} </td>
                                        <td>{{$promotion->startDate}} </td>
                                        <td>{{$promotion->endDate}} </td>
                                        <td>{{$promotion->store->name}} </td>
                                        <td>{{$promotion->activated}} </td>
                                        <td>{{$promotion->promotionCode}} </td>
                                        <td>{{$promotion->opinionCode}} </td>
                                        <td>
                                            <button type="button" class="btn btn-warning" disabled>
                                                <a class="myBt" href="{{url ('admin\promotion\edit', ['promotion_id' => $promotion->id])}}">Modifier</a>
                                            </button>
                                            /
                                            <button type="button" class="btn btn-danger" disabled>
                                                <a onclick="return myFunction();" class="myBt" href="{{url ('admin\promotion\delete', ['promotion_id' => $promotion->id])}}">Supprimer</a>
                                            </button>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        {{--{{$promotions->links()}}--}}
                    </div>
                </div>
            </div>
        </div>
    </div>


    {{--<h2> Liste des promotions </h2>--}}

    {{--<a href="{{url ('admin\promotion\new')}}">Ajouter une promotion +</a><br><br>--}}
    {{--<table>--}}
        {{--<tbody>--}}
        {{--<tr>--}}
            {{--<td style="width:50px;"><b>ID</b></td>--}}
            {{--<td style="width:100px;"><b>Nom</b></td>--}}
            {{--<td style="width:100px;"><b>Date début</b></td>--}}
            {{--<td style="width:100px;"><b>Date fin</b></td>--}}
            {{--<td style="width:100px;"><b>Magasin</b></td>--}}
            {{--<td style="width:100px;"><b>Publier</b></td>--}}
            {{--<td style="width:100px;"><b>Code Promo</b></td>--}}
            {{--<td style="width:100px;"><b>Code Avis</b></td>--}}
            {{--<td style="width:150px;"><b>Actions</b></td>--}}
        {{--</tr>--}}
        {{--@foreach($promotions as $promotion )--}}
            {{--<tr>--}}
                {{--<td>{{$promotion->id}} </td>--}}
                {{--<td>{{$promotion->name}} </td>--}}
                {{--<td>{{$promotion->startDate}} </td>--}}
                {{--<td>{{$promotion->endDate}} </td>--}}
                {{--<td>{{$promotion->store->name}} </td>--}}
                {{--<td>{{$promotion->activated}} </td>--}}
                {{--<td>{{$promotion->promotionCode}} </td>--}}
                {{--<td>{{$promotion->opinionCode}} </td>--}}
                {{--<td>--}}
                    {{--<a href="{{url ('admin\promotion\edit', ['promotion_id' => $promotion->id])}}">Modifier</a>/--}}
                    {{--<a href="{{url ('admin\promotion\delete', ['promotion_id' => $promotion->id])}}">Supprimer</a>--}}
                {{--</td>--}}
            {{--</tr>--}}
        {{--@endforeach--}}
        {{--</tbody>--}}
    {{--</table>--}}

    {{--@if (session('error'))--}}
        {{--<br><div class="alert alert-danger">--}}
            {{--{{ session('error') }}--}}
        {{--</div>--}}
    {{--@endif--}}

    {{--{{$promotions->links()}}--}}
@endsection
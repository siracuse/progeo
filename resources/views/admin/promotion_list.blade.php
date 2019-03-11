@extends('layout.app')


@section('content')

    <h2> Liste des promotions </h2>

    <a href="{{url ('admin\promotion\new')}}">Ajouter une promotion +</a><br><br>
    <table>
        <tbody>
        <tr>
            <td style="width:50px;"><b>ID</b></td>
            <td style="width:100px;"><b>Nom</b></td>
            <td style="width:100px;"><b>Date début</b></td>
            <td style="width:100px;"><b>Date fin</b></td>
            <td style="width:100px;"><b>Magasin</b></td>
            <td style="width:100px;"><b>Publier</b></td>
            <td style="width:100px;"><b>Code Promo</b></td>
            <td style="width:100px;"><b>Code Avis</b></td>
            <td style="width:150px;"><b>Actions</b></td>
        </tr>
        @foreach($promotions as $promotion )
            <tr>
                <td>{{$promotion->id}} </td>
                <td>{{$promotion->name}} </td>
                <td>{{$promotion->startDate}} </td>
                <td>{{$promotion->endDate}} </td>
                <td>{{$promotion->store->name}} </td>
                <td>{{$promotion->activated}} </td>
                <td>{{$promotion->promotionCode}} </td>
                <td>{{$promotion->opinionCode}} </td>
                <td>
                    <a href="{{url ('admin\promotion\edit', ['promotion_id' => $promotion->id])}}">Modifier</a>/
                    <a href="{{url ('admin\promotion\delete', ['promotion_id' => $promotion->id])}}">Supprimer</a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    @if (session('error'))
        <br><div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    {{--{{$promotions->links()}}--}}
@endsection
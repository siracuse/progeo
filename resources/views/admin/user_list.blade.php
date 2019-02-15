@extends('layout.app')

@section('content')
    {{--{{$users}}--}}
    @foreach($users as $user )
        {{$user}}<br><br>
    @endforeach
    {{--<h2> Liste des Utilisateurs </h2>--}}
    {{--<a href="{{url ('admin\user\new')}}">Ajouter un utilisateur +</a><br><br>--}}
    {{--<table>--}}
        {{--<tbody>--}}
        {{--<tr>--}}
            {{--<td style="width:50px;"><b>ID</b></td>--}}
            {{--<td style="width:100px;"><b>Nom</b></td>--}}
            {{--<td style="width:100px;"><b>Prénom</b></td>--}}
            {{--<td style="width:100px;"><b>Téléphone</b></td>--}}
            {{--<td style="width:100px;"><b>Email</b></td>--}}
            {{--<td style="width:100px;"><b>Responsable</b></td>--}}
            {{--<td style="width:150px;"><b>Actions</b></td>--}}
        {{--</tr>--}}
        {{--@foreach($users as $user )--}}
            {{--<tr>--}}
                {{--<td>{{$user->id}} </td>--}}
                {{--<td>{{$user->name}} </td>--}}
                {{--<td>{{$user->firstname}} </td>--}}
                {{--<td>{{$user->phone}} </td>--}}
                {{--<td>{{$user->email}} </td>--}}
                {{--<td>{{$user->is_resp}} </td>--}}
                {{--<td>--}}
                    {{--<a href="{{url ('admin\user\edit', ['user_id' => $user->id])}}">Modifier</a>/--}}
                    {{--<a href="{{url ('admin\user\delete', ['user_id' => $user->id])}}">Supprimer</a>--}}
                {{--</td>--}}
            {{--</tr>--}}
        {{--@endforeach--}}
        {{--</tbody>--}}
    {{--</table><br><br><br><br><br><br><br><br>--}}
@endsection
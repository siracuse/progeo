@extends ('layout.admin')

@section ('content')
    {{--<a href="{{url ('admin\store\list')}}">Magasin</a><br>--}}
    {{--<a href="{{url ('admin\user\list')}}">User</a><br>--}}
    {{--<a href="{{url ('admin\city\list')}}">Ville</a><br>--}}
    {{--<a href="{{url ('admin\category\list')}}">Catégorie</a><br>--}}
    {{--<a href="{{url ('admin\subcategory\list')}}">Sous catégorie</a><br>--}}
    {{--<a href="{{url ('admin\promotion\list')}}">Promotion</a><br><br><br><br><br>--}}

    <h2>Statistiques</h2><br>

    <p>Nb magasin : {{$stores}}</p>
    <p>Nb utilisateur : {{$users}}</p>

@endsection
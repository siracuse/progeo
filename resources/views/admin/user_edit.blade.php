@extends ('layout.app')

@section ('content')
    <a href="{{url ('admin\user\list')}}">Retour</a><br><br>
    <h2> Edition de l'utilisateur {{ $user->name}}</h2>

    <form method="post" action="{{ route ('user_edit_post') }}">

        <input type="hidden" name="user_id" value="{{$user->id}}">
        {{ csrf_field() }}
        <label for="name">Nom :</label>
        <input type="text" class="form-control" id="name" name="name" value="{{old('name', $user->name)}}">

        <label for="firstname">Prénom :</label>
        <input type="text" class="form-control" id="firstname" name="firstname" value="{{old('name', $user->firstname)}}">

        <label for="phone">Téléphone :</label>
        <input type="tel" class="form-control" id="phone" name="phone" value="{{old('name', $user->phone)}}">

        <label for="email">Email :</label>
        <input type="email" class="form-control" id="email" name="email" value="{{old('name', $user->email)}}">

        <p>Responsable :</p>
        @if ($user->is_resp === 0)
            <input type="radio" id="oui" name="is_resp" value="1">
            <label for="oui">Oui</label>
            <input type="radio" id="non" name="is_resp" value="0" checked>
            <label for="non">Non</label>
        @else
            <input type="radio" id="oui" name="is_resp" value="1" checked>
            <label for="oui">Oui</label>
            <input type="radio" id="non" name="is_resp" value="0">
            <label for="non">Non</label>
        @endif

        <br><br><input type="submit" value="Modifier">
    </form>
@endsection
@extends ('layout.user')

@section ('content')
    <h2> Gestion du compte</h2>

    <form method="post" action="{{ route ('user_edit_post_account') }}">

        <input type="hidden" name="user_id" value="{{$user->id}}">
        {{ csrf_field() }}

        <label for="name">Nom :</label>
        <input type="text" class="form-control" id="name" name="name"
               value="{{old('name', $user->name)}}"
        >
        <br><br>
        <label for="firstname">Prénom :</label>
        <input type="text" class="form-control" id="firstname" name="firstname"
               value="{{old('firstname', $user->firstname)}}"
        >
        <br><br>
        <label for="phone">Téléphone :</label><br><br>
        <input type="text" class="form-control" id="phone" name="phone"
               value="{{old('phone', $user->phone)}}"
        >
        <br><br>
        <label for="email">Mail :</label>
        <input type="text" class="form-control" id="email" name="email"
               value="{{old('email', $user->email)}}"
        >

        <br><br><input type="submit" value="Modifier">
    </form>
@endsection
@extends ('layout.user')

@section ('content')
    <h2> Modifier le mot de passe</h2>

    <form method="post" action="{{ route ('user_edit_post_password') }}">
        {{ csrf_field() }}

        <label for="password">Mot de passe actuel :</label>
        <input type="password" class="form-control" id="password" name="password">

        <label for="newpassword">Nouveau mot de passe :</label>
        <input type="password" class="form-control" id="newpassword" name="newpassword">

        <label for="newpasswordseconde">Saisissez une seconde fois le nouveau mot de passe :</label><br><br>
        <input type="password" class="form-control" id="newpasswordseconde" name="newpasswordseconde">

        @if (session('error'))
            <br><div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif
        <br><br><input type="submit" value="Modifier">
    </form>
@endsection
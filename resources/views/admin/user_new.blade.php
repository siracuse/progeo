@extends ('layout.app')

@section ('content')
    <a href="{{url ('admin\user\list')}}">Retour</a><br><br>
    <h2>Ajout d'un utilisateur</h2>

    <form method="post" action="{{ route ('user_new') }}">
        {{ csrf_field() }}
        <label for="name">Nom :</label>
        <input type="text" class="form-control" id="name" name="name">

        <label for="firstname">Prénom :</label>
        <input type="text" class="form-control" id="firstname" name="firstname">

        <label for="phone">Téléphone :</label>
        <input type="tel" class="form-control" id="phone" name="phone">

        <label for="email">Email :</label>
        <input type="email" class="form-control" id="email" name="email">

        @if (session('error'))
            <br><div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif

        <label for="password">Mot de passe :</label>
        <input type="password" class="form-control" id="password" name="password">

        <label for="passwordConfirmation">Confirmation mot de passe :</label>
        <input type="password" class="form-control" id="passwordConfirmation" name="passwordConfirmation">

        <p>Responsable :</p>
        <input type="radio" id="oui" name="is_resp" value="1">
        <label for="oui">Oui</label>
        <input type="radio" id="non" name="is_resp" value="0">
        <label for="non">Non</label>

        <br><br><input type="submit" value="Ajouter" name="submit"><br><br><br><br><br><br><br><br>
    </form>
@endsection
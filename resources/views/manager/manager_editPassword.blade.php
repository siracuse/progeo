@extends ('layout.manager')

@section ('content')
    <div class="container">
        <div class="panel-heading"> Modifier le mot de passe</div>

        <form class="form-horizontal" method="post" action="{{ route ('manager_edit_post_password') }}">
            {{ csrf_field() }}

            <div class="full">
                <label class="col-md-4 control-label" for="password">Mot de passe actuel :</label>
                <div class="col-md-6">
                    <input type="password" class="form-control" id="password" name="password">
                </div>
            </div>

            <div class="full">
                <label class="col-md-4 control-label" for="newpassword">Nouveau mot de passe :</label>
                <div class="col-md-6">
                    <input type="password" class="form-control" id="newpassword" name="newpassword">
                </div>
            </div>

            <div class="full">
                <label class="col-md-4" for="newpasswordseconde">Saisissez une seconde fois le nouveau mot de passe :</label>
                <div class="col-md-6">
                    <input type="password" class="form-control" id="newpasswordseconde" name="newpasswordseconde">
                </div>
            </div>

            @if (session('error'))
                <br><div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif
            <button type="submit" class="btn1 btn-form">
                Modifier
            </button>
        </form>
    </div>
@endsection
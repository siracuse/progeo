@extends ('layout.admin')

@section ('content')
    <div class="content mt-3">
        <div class="animated fadeIn">
            <div class="row">
                <div class=" col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <strong>Ajout </strong> d'un utilisateur
                        </div>
                        <div class="card-body card-block">
                            <form method="post" action="{{ route ('user_new') }}" class="form-horizontal">
                                {{ csrf_field() }}
                                <div class="row form-group">
                                    <div class="col col-md-3"><label for="name" class=" form-control-label">Nom</label></div>
                                    <div class="col-12 col-md-9"><input type="text" id="name" name="name" placeholder="Nom" class="form-control" required></div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3"><label for="firstname" class=" form-control-label">Prénom</label></div>
                                    <div class="col-12 col-md-9"><input type="text" id="firstname" name="firstname" placeholder="Prénom" class="form-control" required></div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3"><label for="phone" class=" form-control-label">Téléphone</label></div>
                                    <div class="col-12 col-md-9"><input type="tel" id="phone" name="phone" placeholder="Téléphone" class="form-control" required></div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3"><label for="email" class=" form-control-label">Email</label></div>
                                    <div class="col-12 col-md-9"><input type="email" id="email" name="email" placeholder="Email" class="form-control" required></div>
                                </div>
                                @if (session('error'))
                                    <br><div class="alert alert-danger">
                                        {{ session('error') }}
                                    </div>
                                @endif
                                <div class="row form-group">
                                    <div class="col col-md-3"><label for="password" class=" form-control-label">Mot de passe</label></div>
                                    <div class="col-12 col-md-9"><input type="password" id="password" name="password" placeholder="Mot de passe" class="form-control" required></div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3"><label for="passwordConfirmation" class=" form-control-label">Confirmation de mot de passe</label></div>
                                    <div class="col-12 col-md-9"><input type="password" id="passwordConfirmation" name="passwordConfirmation" placeholder="Confirmation de mot de passe" class="form-control" required></div>
                                </div>

                                <div class="row form-group">
                                    <div class="col col-md-3"><label class=" form-control-label">Responsable</label></div>
                                    <div class="col col-md-9">
                                        <div class="form-check">
                                            <div class="radio">
                                                <label for="non" class="form-check-label ">
                                                    <input type="radio" id="non" name="is_resp" value="0" class="form-check-input" checked>Non
                                                </label>
                                            </div>
                                            <div class="radio">
                                                <label for="oui" class="form-check-label ">
                                                    <input type="radio" id="oui" name="is_resp" value="1" class="form-check-input">Oui
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <input type="submit" value="Ajouter" name="submit" class="btn btn-primary btn-sm">
                                <a href="./list"><input type="button" value="Annuler"  class="btn btn-danger btn-sm"></a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
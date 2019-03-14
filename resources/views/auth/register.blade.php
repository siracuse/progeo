@extends('layout.app')

@section('content')
    <div class="container-form">
        <div class="panel-heading">Inscription</div>

        <form class="form-horizontal" method="POST" action="{{ route('register') }}">
            {{ csrf_field() }}
            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                <label for="name" class="col-md-4 control-label">Nom</label>

                <div class="col-md-6">
                    <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" autofocus>

                    @if ($errors->has('name'))
                        <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                    @endif
                </div>
            </div>

            <div class="form-group{{ $errors->has('first_name') ? ' has-error' : '' }}">
                <label for="first_name" class="col-md-4 control-label">Prenom</label>

                <div class="col-md-6">
                    <input id="first_name" type="text" class="form-control" name="first_name" value="{{ old('first_name') }}">

                    @if ($errors->has('first_name'))
                        <span class="help-block">
                                        <strong>{{ $errors->first('first_name') }}</strong>
                                    </span>
                    @endif
                </div>
            </div>

            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                <label for="email" class="col-md-4 control-label">E-Mail</label>

                <div class="col-md-6">
                    <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}">

                    @if ($errors->has('email'))
                        <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                    @endif
                </div>
            </div>

            <div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
                <label for="phone" class="col-md-4 control-label">Telephone</label>

                <div class="col-md-6">
                    <input id="phone" type="tel" class="form-control" name="phone" value="{{ old('phone') }}">

                    @if ($errors->has('phone'))
                        <span class="help-block">
                                        <strong>{{ $errors->first('phone') }}</strong>
                                    </span>
                    @endif
                </div>
            </div>

            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                <label for="password" class="col-md-4 control-label">Mot de passe</label>

                <div class="col-md-6">
                    <input id="password" type="password" class="form-control" name="password">

                    @if ($errors->has('password'))
                        <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                    @endif
                </div>
            </div>

            <div class="form-group">
                <label for="password-confirm" class="col-md-4 control-label">Confirmer mot de passe</label>

                <div class="col-md-6">
                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                </div>
            </div>
            <div class="test">
                <div>
                    <div class="col-sm-offset-2 col-sm-10">
                        <div class="checkbox">
                            <label>
                                <input name="is_resp" id="is_resp" value="1" type="checkbox" onChange="afficheStore()"> Je suis un responsable
                            </label>
                        </div>
                    </div>
                </div>



                <div id="store" style="display: none">
                    <div class="panel panel-default">
                        <div class="panel-heading">Ajout d'un magasin</div>
                        <div class="panel-body">
                            <div class="bloc-info">
                                <img src="{{asset('img/information.svg')}}">
                                <p>Veuillez renseigner le nom et le SIRET d'un magasin pour valider votre inscription en tant que responsable.</p>
                            </div>
                            <div class="form-group{{ $errors->has('store_name') ? ' has-error' : '' }}">
                                <label for="store_name" class="col-md-4 control-label">Nom du magasin</label>

                                <div class="col-md-6">
                                    <input id="store_name" type="text" class="form-control name-store" name="store_name" value="{{ old('store_name') }}">

                                    @if ($errors->has('store_name'))
                                        <span class="help-block">
                                                <strong>{{ $errors->first('store_name') }}</strong>
                                            </span>
                                    @endif
                                </div>
                            </div>
                            <div class="full {{ $errors->has('siret') ? ' has-error' : '' }}">
                                <label for="siret" class="col-md-4 control-label">SIRET</label>

                                <div class="col-md-6">
                                    <input id="store_name" type="text" class="form-control siret" name="siret" value="{{ old('siret') }}">

                                    @if ($errors->has('siret'))
                                        <span class="help-block">
                                                <strong>{{ $errors->first('siret') }}</strong>
                                            </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>



            <button type="submit" class="btn1 btn-form">
                S'inscrire
            </button>

        </form>
    </div>

    <script>
        function afficheStore() {
            if (!document.getElementById('is_resp').checked) {
                document.getElementById('store').style.display = "none";
            }
            else {
                document.getElementById('store').style.display = "block";
            }
        }
    </script>
@endsection
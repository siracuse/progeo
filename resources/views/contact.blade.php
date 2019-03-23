@extends('layout.app')

@section('content')
    <div class="container-form">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Contact</div>

                    @if(session('message'))
                        <div class='help-block'>
                            {{ session('message') }}
                        </div>
                    @endif

                    <div class="panel-body">
                        <form class="form-horizontal" method="POST" action="{{ route('contact.send') }}">
                            {{ csrf_field() }}

                            <div class="full{{ $errors->has('email') ? ' has-error' : '' }}">
                                <label for="email" class="col-md-4 control-label">Adresse mail</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>

                                    @if ($errors->has('email'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="full{{ $errors->has('name') ? ' has-error' : '' }}">
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

                            <div class="full {{ $errors->has('message') ? ' has-error' : '' }}">
                                <label for="message" class="col-md-4 control-label">Message</label>

                                <div class="col-md-6">
                                    <textarea id="message" type="text" class="form-control" name="message"  autofocus>{{ old('message') }}</textarea>

                                    @if ($errors->has('message'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('message') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <button type="submit" class="btn1 btn-form">
                                Envoyer
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
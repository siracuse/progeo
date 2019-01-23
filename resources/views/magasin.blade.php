@extends('template')

@section('contenu')
    <br>
    <div class="col-sm-offset-4 col-sm-4">
        <div class="panel panel-info">
            <div class="panel-heading">Ajout d'un magasin</div>
            <div class="panel-body">
                {!! Form::open(['route' => 'ajoutMagasin']) !!}

                {!! Form::label('Nom Magasin', 'Nom Magasin : ') !!}
                {!! Form::text('nomMag', 'Tacos') !!}

                {!! Form::label('Adresse', 'Adresse : ') !!}
                {!! Form::text('adrMag', 'chemin des Anglais') !!}

                {!! Form::label('Téléphone', 'Téléphone : ') !!}
                {!! Form::text('telMag', '05050505') !!}

                {!! Form::label('E-mail', 'E-mail : ') !!}
                {!! Form::email('mailMag', 'azed@gmail.com') !!}
                <br>
                {!! Form::label('SIRET', 'SIRET : ') !!}
                {!! Form::text('siret', '15151') !!}
                <br>
                {!! Form::label('Photo 1', 'Photo 1 : ') !!}
                {!! Form::text('photo1', 'azed') !!}
                <br>
                {!! Form::label('Photo 2', 'Photo 2 : ') !!}
                {!! Form::text('photo2', 'azed') !!}
                <br>
                {!! Form::label('Latitude', 'Latitude : ') !!}
                {!! Form::number('latitude', '15.2') !!}
                <br>
                {!! Form::label('Longitude', 'Longitude : ') !!}
                {!! Form::number('longitude', '15.2') !!}
                <br>
                {!! Form::label('INSEE', 'INSEE : ') !!}
                {!! Form::text('insee', '65155') !!}
                <br>
                {!! Form::label('Code Postal', 'Code Postal : ') !!}
                {!! Form::number('cp', '05055') !!}

                {!! Form::submit('Envoyer !', ['class' => 'btn btn-info pull-right']) !!}
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection
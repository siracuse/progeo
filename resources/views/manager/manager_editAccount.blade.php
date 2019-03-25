@extends ('layout.manager')

@section ('content')
    <div class="container">
        <div class="panel-heading"> Gestion du compte</div>

        <form class="form-horizontal" method="post" action="{{ route ('manager_edit_post_account') }}">
            <input type="hidden" name="user_id" value="{{$manager->id}}">
            {{ csrf_field() }}

            <div class="form-group">
                <label for="name" class="col-md-4 control-label">Nom :</label>
                <div class="col-md-6">
                    <input type="text" class="form-control" id="name" name="name" value="{{old('name', $manager->name)}}">
                </div>
            </div>
            <div class="form-group">
                <label for="firstname" class="col-md-4 control-label">Prénom :</label>
                <div class="col-md-6">
                    <input type="text" class="form-control" id="firstname" name="firstname" value="{{old('firstname', $manager->firstname)}}">
                </div>
            </div>
            <div class="form-group">
                <label for="phone" class="col-md-4 control-label">Téléphone :</label>
                <div class="col-md-6">
                    <input type="text" class="form-control" id="phone" name="phone" value="{{old('phone', $manager->phone)}}">
                </div>
            </div>
            <div class="form-group">
                <label for="email" class="col-md-4 control-label">Mail :</label>
                <div class="col-md-6">
                    <input type="text" class="form-control" id="email" name="email" value="{{old('email', $manager->email)}}">
                </div>
            </div>

            <button type="submit" class="btn1 btn-form" >
                Modifier
            </button>
        </form>
    </div>
@endsection
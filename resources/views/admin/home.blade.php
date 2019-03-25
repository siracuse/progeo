@extends ('layout.admin')

@section ('content')
    {{--<a href="{{url ('admin\store\list')}}">Magasin</a><br>--}}
    {{--<a href="{{url ('admin\user\list')}}">User</a><br>--}}
    {{--<a href="{{url ('admin\city\list')}}">Ville</a><br>--}}
    {{--<a href="{{url ('admin\category\list')}}">Catégorie</a><br>--}}
    {{--<a href="{{url ('admin\subcategory\list')}}">Sous catégorie</a><br>--}}
    {{--<a href="{{url ('admin\promotion\list')}}">Promotion</a><br><br><br><br><br>--}}

    <h2 class="titleStat">Statistiques</h2><br>

    <div class="col-sm-12 mb-4">
        <div class="card-group">

            <div class="card col-lg-2 col-md-6 no-padding bg-flat-color-1">
                <div class="card-body">
                    <div class="h1 text-muted text-right mb-4">
                        <i class="fa fa-home text-light"></i>
                    </div>

                    <div class="h4 mb-0 text-light">
                        <span class="count">{{$stores}}</span>
                    </div>
                    <small class="text-uppercase font-weight-bold text-light">Magasins</small>
                    <div class="progress progress-xs mt-3 mb-0 bg-light" style="width: 40%; height: 5px;"></div>
                </div>
            </div>

            <div class="card col-lg-2 col-md-6 no-padding no-shadow">
                <div class="card-body bg-flat-color-2">
                    <div class="h1 text-muted text-right mb-4">
                        <i class="fa fa-user text-light"></i>
                    </div>
                    <div class="h4 mb-0 text-light">
                        <span class="count">{{$users}}</span>
                    </div>
                    <small class="text-uppercase font-weight-bold text-light">Utilisateurs</small>
                    <div class="progress progress-xs mt-3 mb-0 bg-light" style="width: 40%; height: 5px;"></div>
                </div>
            </div>

            <div class="card col-lg-2 col-md-6 no-padding no-shadow">
                <div class="card-body bg-flat-color-3">
                    <div class="h1 text-right mb-4">
                        <i class="fa fa-user text-light"></i>
                    </div>
                    <div class="h4 mb-0 text-light">
                        <span class="count">{{$managers}}</span>
                    </div>
                    <small class="text-light text-uppercase font-weight-bold">Responsables de magasin</small>
                    <div class="progress progress-xs mt-3 mb-0 bg-light" style="width: 40%; height: 5px;"></div>
                </div>
            </div>

            <div class="card col-lg-2 col-md-6 no-padding no-shadow">
                <div class="card-body bg-flat-color-5">
                    <div class="h1 text-right text-light mb-4">
                        <i class="fa fa-tag"></i>
                    </div>
                    <div class="h4 mb-0 text-light">
                        <span class="count">{{$codepromo}}</span>
                    </div>
                    <small class="text-uppercase font-weight-bold text-light">Code Promo récupéré</small>
                    <div class="progress progress-xs mt-3 mb-0 bg-light" style="width: 40%; height: 5px;"></div>
                </div>
            </div>

            <div class="card col-lg-2 col-md-6 no-padding no-shadow">
                <div class="card-body bg-flat-color-4">
                    <div class="h1 text-right text-light mb-4">
                        <i class="fa fa-tag"></i>
                    </div>
                    <div class="h4 mb-0 text-light">
                        <span class="count">{{$promo}}</span>
                    </div>
                    <small class="text-uppercase font-weight-bold text-light">Promotions activées</small>
                    <div class="progress progress-xs mt-3 mb-0 bg-light" style="width: 40%; height: 5px;"></div>
                </div>
            </div>

            <div class="card col-lg-2 col-md-6 no-padding no-shadow">
                <div class="card-body bg-flat-color-1">
                    <div class="h1 text-light text-right mb-4">
                        <i class="fa fa-comments-o"></i>
                    </div>
                    <div class="h4 mb-0 text-light">
                        <span class="count">{{$avis}}</span>
                    </div>
                    <small class="text-light text-uppercase font-weight-bold">Commentaires</small>
                    <div class="progress progress-xs mt-3 mb-0 bg-light" style="width: 40%; height: 5px;"></div>
                </div>
            </div>

        </div>
    </div>


@endsection
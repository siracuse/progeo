@extends('layout.app')

@section('content')

    <div class="header-store">
        <img src="{{asset('img/otacos1.jpg')}}">
        <img src="{{asset('img/otacos2.jpg')}}">
    </div>

    <a class="btn1 btn-favoris" href="">Favoris</a>

    <div class="container-store">
        <h1 class="center">{{$store->name}}</h1>


        <div class="bloc-avis">
            <form>
                <label>Laisser un avis</label>
                <textarea></textarea>
                <button type="submit" class="btn1 btn-form">
                    Envoyer
                </button>
            </form>
            @foreach($promotions as $promotion)
                <div class="avis">
                    <p>Jean Michel Michou</p>
                    <div class="bloc-note">
                        <img src="{{asset('img/store/star-full.svg')}}">
                        <img src="{{asset('img/store/star-full.svg')}}">
                        <img src="{{asset('img/store/star-full.svg')}}">
                        <img src="{{asset('img/store/star-full.svg')}}">
                        <img src="{{asset('img/store/star-empty.svg')}}">
                    </div>
                    <p>gr iohjio fjhigfhfjh igfjhif hkgh gkijio jij iogjh gfhj gfiohjgiofh gkhj gkjh fghjifghj iofjhiotjh iofjh
                    gnidugiudgfugj uodjgorgjodogij jfj fdgjfgj idjfiojiorjgifjg ijfi jgfjg jdjfgjfkgj kdj jdoj gf jdr jdj ioj oiio</p>
                </div>
            @endforeach
        </div>
    </div>

@endsection
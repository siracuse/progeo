@extends('layout.app')

@section('content')
    {{$store->name}}<br>
    {{$store->address}}<br>
    {{$store->phone}}<br>
    {{$store->email}}<br>
    {{$category->name}}<br>
    {{$subcategory->name}}<br>
    @foreach($promotions as $promotion)
        {{$promotion->name}}<br>
    @endforeach
@endsection

@extends('base')

@section('title', $sauce -> name)

@section('content')

    <h1>{{$sauce -> name}}</h1>

        <p><strong>Fabricant:</strong> {{ $sauce->manufacturer }}</p>
        <p><strong>Description:</strong> {{ $sauce->description }}</p>
        <p><strong>Ingrédient principal:</strong> {{ $sauce->mainPepper }}</p>
        <img src="{{ $sauce->imageUrl }}" alt="Image de la sauce {{ $sauce->name }}">
        <p><strong>Heat:</strong> {{ $sauce->heat }}/10</p>
        <p><strong>Likes:</strong> {{ $sauce->likes }}</p>
        <p><strong>Dislikes:</strong> {{ $sauce->dislikes }}</p>
    
@endsection

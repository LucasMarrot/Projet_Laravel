@extends('base')

@section('title', 'Accueil des sauces')

@section('content')

    <h1>Les sauces</h1>

    @foreach ($sauces as $sauce)
        <article>
            <h2>{{ $sauce->name }}</h2>
            <p><strong>Fabricant:</strong> {{ $sauce->manufacturer }}</p>
            <p><strong>Description:</strong> {{ $sauce->description }}</p>
            <p><strong>Ingrédient principal:</strong> {{ $sauce->mainPepper }}</p>
            <img src="{{ $sauce->imageUrl }}" alt="Image de la sauce {{ $sauce->name }}">
            <p><strong>Heat:</strong> {{ $sauce->heat }}/10</p>
            <p><strong>Likes:</strong> {{ $sauce->likes }}</p>
            <p><strong>Dislikes:</strong> {{ $sauce->dislikes }}</p>
            <a href="{{ route('sauce.show', ['sauce' => $sauce->id]) }}">Voir la sauce</a>
        </article>
    @endforeach

    {{ $sauces -> links() }}
    
@endsection

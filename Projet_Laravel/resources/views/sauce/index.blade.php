@extends('base')

@section('title', 'Accueil des sauces')

@section('content')

    @foreach ($sauces as $sauce)
        <div class="sauce">
            <h2>{{ $sauce->name }}</h2>
            <p><strong>Fabricant:</strong> {{ $sauce->manufacturer }}</p>
            <p><strong>Description:</strong> {{ $sauce->description }}</p>
            <p><strong>Ingrédient principal:</strong> {{ $sauce->mainPepper }}</p>
            <img src="{{ $sauce->imageUrl }}" alt="Image de la sauce {{ $sauce->name }}">
            <div class="heat" style="font-size: 24px; text-align: center;">
                <span style="color: {{ $sauce->heat <= 3 ? '#f5d547' : ($sauce->heat <= 6 ? '#ffa500' : '#ff6347') }}">{{ $sauce->heat }}/10</span>
                <i class="fas fa-fire" style="color: {{ $sauce->heat <= 3 ? '#f5d547' : ($sauce->heat <= 6 ? '#ffa500' : '#ff6347') }}"></i>
            </div>
            <div class="reactions">
                <div class="like">
                    <i class="fas fa-thumbs-up"></i> {{ $sauce->likes }}
                </div>
                <div class="dislike">
                    <i class="fas fa-thumbs-down"></i> {{ $sauce->dislikes }}
                </div>
            </div>
            
            <a class="view-more" href="{{ route('sauce.show', ['sauce' => $sauce->id]) }}">Voir la sauce</a>
        </div>
    @endforeach

    {{ $sauces -> links() }}
    
@endsection

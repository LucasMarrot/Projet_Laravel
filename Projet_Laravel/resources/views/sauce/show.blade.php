@extends('base')

@section('title', $sauce -> name)

@section('content')

    <div class="sauce-details">
        <div class="sauce-details-header">
            @auth
                @if((Auth::user()->id === $sauce->userId) || (Auth::user()->id === 1))
                    <h1>{{ $sauce->name }}</h1>                
                    <a class="primary-button-link" href="{{ route('sauces.edit', $sauce->id) }}" >
                        <span>Modifier la sauce</span>
                        <i class="fa fa-edit"></i>
                    </a>           
                @else
                    <h1>{{ $sauce->name }}</h1>                           
                @endif
            @endauth
        </div>
        <div class="sauce-details-content">
            <div class="sauce-details-info">
                <p><strong>Fabricant:</strong> {{ $sauce->manufacturer }}</p>
                <p><strong>Description:</strong> {{ $sauce->description }}</p>
                <p><strong>Ingrédient principal:</strong> {{ $sauce->mainPepper }}</p>
            </div>
            <div class="sauce-details-heat">
                <div class="sauce-details-heat-rating" style="background-color: {{ $sauce->heat <= 3 ? '#f5d547' : ($sauce->heat <= 6 ? '#ffa500' : '#ff6347') }}">
                    <i class="fas fa-fire"></i> {{ $sauce->heat }}/10
                </div>
            </div>
        </div>
        <div class="sauce-details-image">
            <img src="{{ $sauce->imageUrl }}" alt="Image de la sauce {{ $sauce->name }}">
        </div>
        <div class="sauce-details-reactions">
            <div class="sauce-details-like">
                <i class="fas fa-thumbs-up"></i> {{ $sauce->likes }}
            </div>
            <div class="sauce-details-like-bar" style="background-color: {{ ($sauce->likes > 0 || $sauce->dislikes > 0) ? '#f44336' : '#ddd' }};">
                <div class="sauce-details-like-fill" style="width: {{ ($sauce->likes + $sauce->dislikes) != 0 ? (($sauce->likes / ($sauce->likes + $sauce->dislikes)) * 100) : 0 }}%; background-color: {{ $sauce->likes > 0 ? '#4caf50' : ($sauce->dislikes > 0 ? '#f44336' : '#ddd') }};"></div>
            </div>
            <div class="sauce-details-dislike">
                <i class="fas fa-thumbs-down"></i> {{ $sauce->dislikes }}
            </div>
        </div>
    </div>
    
@endsection

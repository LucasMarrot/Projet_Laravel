@extends('base')

@section('title', $sauce -> name)

@section('content')

    <div class="sauce-details">
        <div class="sauce-details-header"> 
            <h1>{{ $sauce->name }}</h1> 
            @auth
                @if((Auth::user()->id == $sauce->userId) || (Auth::user()->id == 1))               
                    <a class="primary-button-link" href="{{ route('sauces.edit', $sauce->id) }}" >
                        <span>Modifier la sauce</span>
                        <i class="fa fa-edit"></i>
                    </a>
                    <a class="primary-button-link trash" href="{{ route('sauces.delete', $sauce->id) }}" >
                        <span>Supprimer la sauce</span>
                        <i class="fas fa-trash-alt"></i>
                    </a>      
                    @endif                                         
            @endauth
        </div>
        <div class="sauce-details-content">
            <div class="sauce-details-info">
                <p><strong>Fabricant:</strong> {{ $sauce->manufacturer }}</p>
                <p><strong>Description:</strong> {{ $sauce->description }}</p>
                <p><strong>Piment principal:</strong> {{ $sauce->mainPepper }}</p>
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
            @auth
            <a class="sauce-details-like{{ (is_null($sauce->usersLiked) || !in_array(Auth::user()->id, json_decode($sauce->usersLiked))) ? '' : '-active' }}" href="{{ route('sauces.like', $sauce->id) }}">
                <i class="fas fa-thumbs-up"></i> {{ $sauce->likes }}
            </a>
            @else
            <a class="sauce-details-like" href="{{ route('sauces.like', $sauce->id) }}">
                <i class="fas fa-thumbs-up"></i> {{ $sauce->likes }}
            </a>
            @endauth
            <div class="sauce-details-like-bar" style="background-color: {{ ($sauce->likes > 0 || $sauce->dislikes > 0) ? '#f44336' : '#ddd' }};">
                <div class="sauce-details-like-fill" style="width: {{ ($sauce->likes + $sauce->dislikes) != 0 ? (($sauce->likes / ($sauce->likes + $sauce->dislikes)) * 100) : 0 }}%; background-color: {{ $sauce->likes > 0 ? '#4caf50' : ($sauce->dislikes > 0 ? '#f44336' : '#ddd') }};"></div>
            </div>
            @auth
            <a class="sauce-details-dislike{{ (is_null($sauce->usersDisliked) || !in_array(Auth::user()->id, json_decode($sauce->usersDisliked))) ? '' : '-active' }}" href="{{ route('sauces.dislike', $sauce->id) }}">
                <i class="fas fa-thumbs-down"></i> {{ $sauce->dislikes }}
            </a>
            @else
            <a class="sauce-details-dislike" href="{{ route('sauces.dislike', $sauce->id) }}">
                <i class="fas fa-thumbs-down"></i> {{ $sauce->dislikes }}
            </a>
            @endauth
        </div>
    </div>
    
@endsection

@extends('base')

@section('title', 'Accueil des sauces')
@section('catalogue_active', 'active')

@section('content')

    <div class="sauce-container">
        @foreach ($sauces as $sauce)
            <div class="sauce">
                <div class="sauce-header" >
                    @if (session('status'))
                        <div class="success-message" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    @auth
                        @if((Auth::user()->id == $sauce->userId) || (Auth::user()->id == 1))
                            <h2 style="max-height: 8px;">{{ $sauce->name }}</h2>
                            <a class="primary-button-link" href="{{ route('sauces.edit', $sauce->id) }}" >
                                <i class="fa fa-edit"></i>
                            </a>           
                            <a class="primary-button-link trash" href="{{ route('sauces.delete', $sauce->id) }}" >
                                <i class="fas fa-trash-alt"></i>
                            </a>   
                        @else 
                            <h2>{{ $sauce->name }}</h2>                                     
                        @endif
                    @else 
                        <h2>{{ $sauce->name }}</h2> 
                    @endauth
                </div>
                <div class="info">
                    <p><strong>Fabricant:</strong> {{ $sauce->manufacturer }}</p>
                    <p><strong>Piment principal:</strong> {{ $sauce->mainPepper }}</p>
                </div>
                <div class="image">
                    <img src="{{ $sauce->imageUrl }}" alt="Image de la sauce {{ $sauce->name }}">
                </div>
                <div class="heat">
                    <span style="color: {{ $sauce->heat <= 3 ? '#f5d547' : ($sauce->heat <= 6 ? '#ffa500' : '#ff6347') }}">{{ $sauce->heat }}/10</span>
                    <i class="fas fa-fire" style="color: {{ $sauce->heat <= 3 ? '#f5d547' : ($sauce->heat <= 6 ? '#ffa500' : '#ff6347') }}"></i>
                </div>
                <div class="reactions">
                    @auth
                    <a class="like{{ (is_null($sauce->usersLiked) || !in_array(Auth::user()->id, json_decode($sauce->usersLiked))) ? '' : '-active' }}" href="{{ route('sauces.like', $sauce->id) }}">
                        <i class="fas fa-thumbs-up"></i> {{ $sauce->likes }}
                    </a>
                    <a class="dislike{{ (is_null($sauce->usersDisliked) || !in_array(Auth::user()->id, json_decode($sauce->usersDisliked))) ? '' : '-active' }}" href="{{ route('sauces.dislike', $sauce->id) }}">
                        <i class="fas fa-thumbs-down"></i> {{ $sauce->dislikes }}
                    </a>
                    @else
                    <a class="like" href="{{ route('sauces.like', $sauce->id) }}">
                        <i class="fas fa-thumbs-up"></i> {{ $sauce->likes }}
                    </a>
                    <a class="dislike" href="{{ route('sauces.dislike', $sauce->id) }}">
                        <i class="fas fa-thumbs-down"></i> {{ $sauce->dislikes }}
                    </a>
                    @endauth
                </div>
                
                <a class="secondary-button" href="{{ route('sauces.show', ['sauce' => $sauce->id]) }}">Voir plus</a>
                
            </div>
        @endforeach
    </div>

    {{ $sauces -> links() }}
    
@endsection

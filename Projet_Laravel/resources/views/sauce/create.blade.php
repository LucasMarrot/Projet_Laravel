@extends('base')

@section('title', 'Publier une sauce')

@section('content')
    <form method="POST" action="" enctype="multipart/form-data">
        @csrf
        <div>
            <label for="userId">UserId :</label>
            <input type="text" id="userId" name="userId" value="{{ old('userId') }}">
            @error('userId')
                {{ $message }}
            @enderror
        </div>
        <div>
            <label for="name">Nom de la sauce :</label>
            <input type="text" id="name" name="name" value="{{ old('name') }}">
            @error('name')
                {{ $message }}
            @enderror
        </div>
        <div>
            <label for="manufacturer">Fabricant :</label>
            <input type="text" id="manufacturer" name="manufacturer"  value="{{ old('manufacturer') }}">
            @error('manufacturer')
                {{ $message }}
            @enderror
        </div>
        <div>
            <label for="description">Description :</label>
            <textarea id="description" name="description"  value="{{ old('description') }}" ></textarea>
            @error('description')
                {{ $message }}
            @enderror
        </div>
        <div>
            <label for="mainPepper">Ingrédient principal :</label>
            <input type="text" id="mainPepper" name="mainPepper"  value="{{ old('mainPepper') }}">
            @error('mainPepper')
                {{ $message }}
            @enderror
        </div>
        <div>
            <label for="imageUrl">URL de l'image de la sauce :</label>
            <input type="text" id="imageUrl" name="imageUrl"  value="{{ old('imageUrl') }}">
            @error('imageUrl')
                {{ $message }}
            @enderror
        </div>
        <div>
            <label for="heat">Heat (1-10) :</label>
            <input type="number" id="heat" name="heat" min="1" max="10"  value="{{ old('heat') }}">
            @error('heat')
                {{ $message }}
            @enderror
        </div>
        <button type="submit">Enregistrer la sauce</button>
    </form>
  
@endsection

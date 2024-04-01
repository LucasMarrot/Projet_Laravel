<form method="POST" action="" enctype="multipart/form-data">
    @csrf
    <div>
        <label for="userId">UserId :</label>
        <input type="text" id="userId" name="userId" value="{{ old('userId', $sauce->userId) }}">
        @error('userId')
            {{ $message }}
        @enderror
    </div>
    <div>
        <label for="name">Nom de la sauce :</label>
        <input type="text" id="name" name="name" value="{{ old('name', $sauce->name) }}">
        @error('name')
            {{ $message }}
        @enderror
    </div>
    <div>
        <label for="manufacturer">Fabricant :</label>
        <input type="text" id="manufacturer" name="manufacturer"  value="{{ old('manufacturer', $sauce->manufacturer) }}">
        @error('manufacturer')
            {{ $message }}
        @enderror
    </div>
    <div>
        <label for="description">Description :</label>
        <textarea id="description" name="description" >{{ old('description', $sauce->description) }}</textarea>
        @error('description')
            {{ $message }}
        @enderror
    </div>
    <div>
        <label for="mainPepper">Ingrédient principal :</label>
        <input type="text" id="mainPepper" name="mainPepper"  value="{{ old('mainPepper', $sauce->mainPepper) }}">
        @error('mainPepper')
            {{ $message }}
        @enderror
    </div>
    <div>
        <label for="imageUrl">URL de l'image de la sauce :</label>
        <input type="text" id="imageUrl" name="imageUrl"  value="{{ old('imageUrl', $sauce->imageUrl) }}">
        @error('imageUrl')
            {{ $message }}
        @enderror
    </div>
    <div>
        <label for="heat">Heat (1-10) :</label>
        <input type="number" id="heat" name="heat" min="1" max="10"  value="{{ old('heat', $sauce->heat) }}">
        @error('heat')
            {{ $message }}
        @enderror
    </div>
    <button type="submit">
        @if ($sauce -> id)
            Modifier la sauce
        @else
            Créer la sauce
        @endif      
    </button>
</form>
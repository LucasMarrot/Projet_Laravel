<form method="POST" action="" enctype="multipart/form-data" class="sauce-form">
    @csrf
    <div class="form-group">
        <label for="userId">UserId :</label>
        <input type="text" id="userId" name="userId" value="{{ old('userId', $sauce->userId) }}">
        @error('userId')
            <span class="error-message">{{ $message }}</span>
        @enderror
    </div>
    <div class="form-group">
        <label for="name">Nom de la sauce :</label>
        <input type="text" id="name" name="name" value="{{ old('name', $sauce->name) }}">
        @error('name')
            <span class="error-message">{{ $message }}</span>
        @enderror
    </div>
    <div class="form-group">
        <label for="manufacturer">Fabricant :</label>
        <input type="text" id="manufacturer" name="manufacturer"  value="{{ old('manufacturer', $sauce->manufacturer) }}">
        @error('manufacturer')
            <span class="error-message">{{ $message }}</span>
        @enderror
    </div>
    <div class="form-group">
        <label for="description">Description :</label>
        <textarea id="description" name="description" >{{ old('description', $sauce->description) }}</textarea>
        @error('description')
            <span class="error-message">{{ $message }}</span>
        @enderror
    </div>
    <div class="form-group">
        <label for="mainPepper">Ingrédient principal :</label>
        <input type="text" id="mainPepper" name="mainPepper"  value="{{ old('mainPepper', $sauce->mainPepper) }}">
        @error('mainPepper')
            <span class="error-message">{{ $message }}</span>
        @enderror
    </div>
    <div class="form-group">
        <label for="imageUrl">URL de l'image de la sauce :</label>
        <input type="text" id="imageUrl" name="imageUrl"  value="{{ old('imageUrl', $sauce->imageUrl) }}">
        @error('imageUrl')
            <span class="error-message">{{ $message }}</span>
        @enderror
    </div>
    <div class="form-group">
        <label for="heat">Heat (1-10) :</label>
        <input type="number" id="heat" name="heat" min="1" max="10"  value="{{ old('heat', $sauce->heat) }}">
        @error('heat')
            <span class="error-message">{{ $message }}</span>
        @enderror
    </div>
    <button type="submit" class="view-more">
        @if ($sauce -> id)
            Modifier la sauce
        @else
            Créer la sauce
        @endif      
    </button>
</form>

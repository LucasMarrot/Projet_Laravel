<form method="POST" action="" enctype="multipart/form-data" class="sauce-form">
    @csrf
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
        <label for="mainPepper">Piment principal :</label>
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
        <label for="heat">Heat (1-10) : <span id="heat-value">{{ old('heat', $sauce->heat ? $sauce->heat : 5 ) }}</span></label>
        <input type="range" id="heat" name="heat" min="1" max="10"  value="{{ old('heat', $sauce->heat ? $sauce->heat : 5) }}">
        @error('heat')
            <span class="error-message">{{ $message }}</span>
        @enderror
    </div>
    <div class="form-button">
        <button type="submit" class="primary-button">
            @if ($sauce -> id)
                Modifier la sauce
            @else
                Créer la sauce
            @endif      
        </button>
    <div class="form-group">
</form>

<script>
    // Récupérer l'élément input range et l'élément span pour afficher la valeur
    const heatInput = document.getElementById('heat');
    const heatValue = document.getElementById('heat-value');

    // Mettre à jour la valeur affichée lorsque la valeur du slider change
    heatInput.addEventListener('input', function() {
        heatValue.textContent = this.value;
    });
</script>

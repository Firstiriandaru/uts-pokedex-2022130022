@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h1>Edit Pokemon</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('pokemon.update', $pokemon->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="row">
            <div class="col-md-6">
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name', $pokemon->name) }}">
                    @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="species" class="form-label">Species</label>
                    <input type="text" class="form-control @error('species') is-invalid @enderror" id="species" name="species" value="{{ old('species', $pokemon->species) }}">
                    @error('species')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="primary_type" class="form-label">Primary Type</label>
                    <select class="form-select @error('primary_type') is-invalid @enderror" id="primary_type" name="primary_type">
                        <option value="">Choose a type</option>
                        <option value="Grass" {{ old('primary_type', $pokemon->primary_type) == 'Grass' ? 'selected' : '' }}>Grass</option>
                        <option value="Fire" {{ old('primary_type', $pokemon->primary_type) == 'Fire' ? 'selected' : '' }}>Fire</option>
                        <option value="Water" {{ old('primary_type', $pokemon->primary_type) == 'Water' ? 'selected' : '' }}>Water</option>
                        <option value="Bug" {{ old('primary_type', $pokemon->primary_type) == 'Bug' ? 'selected' : '' }}>Bug</option>
                        <option value="Normal" {{ old('primary_type', $pokemon->primary_type) == 'Normal' ? 'selected' : '' }}>Normal</option>
                        <option value="Poison" {{ old('primary_type', $pokemon->primary_type) == 'Poison' ? 'selected' : '' }}>Poison</option>
                        <option value="Electric" {{ old('primary_type', $pokemon->primary_type) == 'Electric' ? 'selected' : '' }}>Electric</option>
                        <option value="Ground" {{ old('primary_type', $pokemon->primary_type) == 'Ground' ? 'selected' : '' }}>Ground</option>
                        <option value="Fairy" {{ old('primary_type', $pokemon->primary_type) == 'Fairy' ? 'selected' : '' }}>Fairy</option>
                        <option value="Fighting" {{ old('primary_type', $pokemon->primary_type) == 'Fighting' ? 'selected' : '' }}>Fighting</option>
                        <option value="Psychic" {{ old('primary_type', $pokemon->primary_type) == 'Psychic' ? 'selected' : '' }}>Psychic</option>
                        <option value="Rock" {{ old('primary_type', $pokemon->primary_type) == 'Rock' ? 'selected' : '' }}>Rock</option>
                        <option value="Ghost" {{ old('primary_type', $pokemon->primary_type) == 'Ghost' ? 'selected' : '' }}>Ghost</option>
                        <option value="Ice" {{ old('primary_type', $pokemon->primary_type) == 'Ice' ? 'selected' : '' }}>Ice</option>
                        <option value="Dragon" {{ old('primary_type', $pokemon->primary_type) == 'Dragon' ? 'selected' : '' }}>Dragon</option>
                        <option value="Dark" {{ old('primary_type', $pokemon->primary_type) == 'Dark' ? 'selected' : '' }}>Dark</option>
                        <option value="Steel" {{ old('primary_type', $pokemon->primary_type) == 'Steel' ? 'selected' : '' }}>Steel</option>
                        <option value="Flying" {{ old('primary_type', $pokemon->primary_type) == 'Flying' ? 'selected' : '' }}>Flying</option>
                    </select>
                    @error('primary_type')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="weight" class="form-label">Weight</label>
                    <input type="number" step="0.01" class="form-control @error('weight') is-invalid @enderror" id="weight" name="weight" value="{{ old('weight', $pokemon->weight) }}">
                    @error('weight')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="height" class="form-label">Height</label>
                    <input type="number" step="0.01" class="form-control @error('height') is-invalid @enderror" id="height" name="height" value="{{ old('height', $pokemon->height) }}">
                    @error('height')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="col-md-6">
                <div class="mb-3">
                    <label for="hp" class="form-label">HP</label>
                    <input type="number" class="form-control @error('hp') is-invalid @enderror" id="hp" name="hp" value="{{ old('hp', $pokemon->hp) }}">
                    @error('hp')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="attack" class="form-label">Attack</label>
                    <input type="number" class="form-control @error('attack') is-invalid @enderror" id="attack" name="attack" value="{{ old('attack', $pokemon->attack) }}">
                    @error('attack')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="defense" class="form-label">Defense</label>
                    <input type="number" class="form-control @error('defense') is-invalid @enderror" id="defense" name="defense" value="{{ old('defense', $pokemon->defense) }}">
                    @error('defense')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-check mb-3">
                    <input class="form-check-input @error('is_legendary') is-invalid @enderror" type="checkbox" id="is_legendary" name="is_legendary" value="1" {{ old('is_legendary', $pokemon->is_legendary) ? 'checked' : '' }}>
                    <label class="form-check-label" for="is_legendary">Legendary</label>
                    @error('is_legendary')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="photo" class="form-label">Photo</label>
                    <input class="form-control @error('photo') is-invalid @enderror" type="file" id="photo" name="photo" accept="image/*">
                    @error('photo')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror

                    @if ($pokemon->photo)
                        <div class="mt-2">
                            <img src="{{ $pokemon->photo ? asset('storage/' . str_replace('public/', '', $pokemon->photo)) : 'https://placehold.co/200' }}" alt="{{ $pokemon->name }}" width="100">
                        </div>
                    @endif
                </div>
            </div>
        </div>

        <button type="submit" class="btn btn-primary">Update Pokemon</button>
    </form>
</div>

@endsection

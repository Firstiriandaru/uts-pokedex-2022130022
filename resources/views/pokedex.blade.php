@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h1 class="text-center mb-4">Pokedex</h1>

    <div class="row row-cols-1 row-cols-md-3 g-4">
        @foreach($pokemons as $pokemon)
        <div class="col">
            <div class="card h-120">
                <a href="{{ route('pokemon.show', $pokemon->id) }}">
                    <img src="{{ $pokemon->photo ? asset('storage/' . str_replace('public/', '', $pokemon->photo)) : 'https://placehold.co/200' }}"
                         class="card-img-top" width="200"
                         alt="{{ $pokemon->name }}">
                </a>

                <div class="card-body text-start">
                    <h5 class="card-title">{{ $pokemon->name }}</h5>
                    <p class="card-text">
                        <strong>ID:</strong> #{{ Str::padLeft($pokemon->id, 4, '0') }}<br>
                        <strong>Type:</strong>
                        <span class="type-{{ strtolower($pokemon->primary_type) }}">
                            {{ $pokemon->primary_type }}
                        </span>
                    </p>
                </div>
            </div>
        </div>
        @endforeach
    </div>

    <div class="d-flex justify-content-center mt-4">
        {{ $pokemons->links() }}
    </div>
</div>
@endsection

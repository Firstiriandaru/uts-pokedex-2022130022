@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h1 class="text-center">{{ $pokemon->name }}'s Details</h1>

    <div class="row">
        <div class="col-md-4">
            <img src="{{ $pokemon->photo ? asset('storage/' . str_replace('public/', '', $pokemon->photo)) : 'https://placehold.co/200' }}"
                         class="card-img-top"
                         alt="{{ $pokemon->name }}">
        </div>

        <div class="col-md-8">
            <ul class="list-group">
                <li class="list-group-item"><strong>ID:</strong> {{ Str::padLeft($pokemon->id, 4, '0') }}</li>
                <li class="list-group-item"><strong>Name:</strong> {{ $pokemon->name }}</li>
                <li class="list-group-item"><strong>Species:</strong> {{ $pokemon->species }}</li>

                <li class="list-group-item">
                    <strong>Primary Type:</strong>
                    <span class="badge rounded-pill badge-type-{{ strtolower($pokemon->primary_type) }}">
                        {{ $pokemon->primary_type }}
                    </span>
                </li>

                <li class="list-group-item"><strong>Weight:</strong> {{ $pokemon->weight }} kg</li>
                <li class="list-group-item"><strong>Height:</strong> {{ $pokemon->height }} m</li>
                <li class="list-group-item"><strong>HP:</strong> {{ $pokemon->hp }}</li>
                <li class="list-group-item"><strong>Attack:</strong> {{ $pokemon->attack }}</li>
                <li class="list-group-item"><strong>Defense:</strong> {{ $pokemon->defense }}</li>

                <li class="list-group-item">
                    <strong>Legendary:</strong>
                    <span class="badge rounded-pill {{ $pokemon->is_legendary ? 'bg-success' : 'bg-secondary' }}">
                        {{ $pokemon->is_legendary ? 'Yes' : 'No' }}
                    </span>
                </li>
            </ul>

            <a href="{{ route('pokemon.index') }}" class="btn btn-primary mt-3">Back to List</a>
        </div>
    </div>
</div>
@endsection

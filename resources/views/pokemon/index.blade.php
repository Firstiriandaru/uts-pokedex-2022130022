@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h1>Pokemon List</h1>

    <a href="{{ route('pokemon.create') }}" class="btn btn-primary mb-3">Add New Pokemon</a>

    @if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif
    @if (session('success-delete'))
    <div class="alert alert-danger">
        {{ session('success-delete') }}
    </div>
    @endif

    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Species</th>
                <th>Primary Type</th>
                <th>Power</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($pokemons as $pokemon)
            <tr>
                <td>{{ Str::padLeft($pokemon->id, 4, '0') }}</td>
                <td>
                    <a href="{{ route('pokemon.show', $pokemon->id) }}" class="text-decoration-none">
                        {{ $pokemon->name }}
                    </a>
                </td>
                <td>{{ $pokemon->species }}</td>
                <td>
                    <span {{ ($pokemon->primary_type) }}">
                        {{ $pokemon->primary_type }}
                    </span>
                </td>
                <td>{{ $pokemon->hp + $pokemon->attack + $pokemon->defense }}</td>
                <td>
                    <a href="{{ route('pokemon.edit', $pokemon->id) }}" class="btn btn-warning">Edit</a>

                    <form action="{{ route('pokemon.destroy', $pokemon->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <div class="d-flex justify-content-center">
        {{ $pokemons->links() }}
    </div>

</div>

@endsection

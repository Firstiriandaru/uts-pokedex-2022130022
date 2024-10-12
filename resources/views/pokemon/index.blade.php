@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Pokemons</h1>
        <a class="btn btn-primary" href="{{ route('pokemon.create') }}">Add New Pokemon</a>
        <main>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Species</th>
                        <th>Primary Type</th>
                        <th>Weight</th>
                        <th>Height</th>
                        <th>HP</th>
                        <th>Attack</th>
                        <th>Defense</th>
                        <th>Legendary</th>
                        <th>Photo</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($pokemon as $pokemon)
                        <tr>
                            <td>{{ $pokemon->id }}</td>
                            <td>
                                <img src="{{ Storage::url($pokemon->photo) }}" class="img-thumbnail w-50">
                            </td>
                            <td>
                                <a href="{{ route('pokemon.show', $pokemon) }}">
                                    {{ $pokemon->name }}
                                </a>
                            </td>
                            <td>{{ $pokemon->name }}</td>
                            <td>{{ $pokemon->species }}</td>
                            <td>{{ $pokemon->primary_type }}</td>
                            <td>{{ $pokemon->weight }}</td>
                            <td>{{ $pokemon->height }}</td>
                            <td>{{ $pokemon->hp }}</td>
                            <td>{{ $pokemon->attack }}</td>
                            <td>{{ $pokemon->defense }}</td>
                            <td>{{ $pokemon->is_legendary }}</td>
                            <td>
                                <div class="btn-group" role="group">
                                    <a class="btn btn-warning" href="{{ route('pokemon.edit', $pokemon) }}">
                                        Edit
                                    </a>
                                    <form action="{{ route('pokemon.destroy', $pokemon) }}" method="POST">
                                        @csrf
                                        @method('delete')
                                        <button class="btn btn-danger" type="submit">Delete</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            {{ $pokemon->links() }}
        </main>
    </div>

@endsection

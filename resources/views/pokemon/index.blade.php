@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <h1>Pokemons List View</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-12 ">
                <div class="col-12 d-flex justify-content-end mb-3">
                    <a class="btn btn-primary mb-3 mt-3" href="{{ route('pokemon.create') }}">Add New Pokemon</a>
                </div>
            </div>
            <main>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Species</th>
                            <th>Primary Type</th>
                            <th>Power</th>
                            <th>Photo</th>
                            <th>Action</th>
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
    </div>

@endsection

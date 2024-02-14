@extends('layouts.app')

@section('main')
    <div class="container">
        <form action="{{ route('cocktails.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Nome</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name"
                    value="{{ old('name') }}">
            </div>
            @error('name')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <div class="mb-3">
                <label for="alcolico" class="form-label">Analcolico</label>
                <input type="checkbox" name="alcolico" id="alcolico" value="0">
            </div>
            @error('alcolico')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <div class="mb-3">
                @foreach ($ingredients as $ingredient)
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" value="{{ $ingredient->id }}" name="ingredients[]"
                            id="ingredient-{{ $ingredient->id }}"
                            {{ in_array($ingredient->id, old('ingredients', [])) ? 'checked' : '' }}>
                        <label class="form-check-label"
                            for="ingredient-{{ $ingredient->id }}">{{ $ingredient->name }}</label>
                    </div>
                @endforeach
            </div>

            @error('ingredients')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <div class="mb-3">
                <label for="img" class="form-label">Immagine alcolico</label>
                <input type="text" class="form-control @error('img') is-invalid @enderror" id="img" name="img"
                    value="{{ old('img') }}">
            </div>
            @error('img')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <input type="submit" value="Aggiungi" class="btn btn-primary">
        </form>
    </div>
@endsection

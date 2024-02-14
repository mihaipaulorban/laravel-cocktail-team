@extends('layouts.app')

@section('main')
    <div class="container">
        <form action="{{ route('cocktails.update', $cocktail) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="name" class="form-label">Nome</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name"
                    value="{{ old('name', $cocktail->name) }}">
            </div>
            @error('name')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror

            <div class="mb-3">
                @if ($cocktail->alcolico)
                    <label for="alcolico" class="form-label">Analcolico</label>
                    <input type="checkbox" name="alcolico" id="alcolico" value="0">
                @else
                    <label for="alcolico" class="form-label">Alcolico</label>
                    <input type="checkbox" name="alcolico" id="alcolico" value="1">
                @endif
            </div>
            @error('alcolico')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror


            <div class="mb-3">
                @foreach ($ingredients as $ingredient)
                    <div class="form-check form-check-inline">
                        @if ($errors->any())
                            <input class="form-check-input" type="checkbox" value="{{ $ingredient->id }}"
                                name="ingredients[]" id="ingredient-{{ $ingredient->id }}"
                                {{ in_array($ingredient->id, old('ingredients', [])) ? 'checked' : '' }}>
                            <label class="form-check-label"
                                for="ingredient-{{ $ingredient->id }}">{{ $ingredient->name }}</label>
                        @else
                            <input class="form-check-input" type="checkbox" value="{{ $ingredient->id }}"
                                name="ingredients[]" id="ingredient-{{ $ingredient->id }}"
                                {{ $cocktail->ingredients->contains($ingredient->id) ? 'checked' : '' }}>
                            <label class="form-check-label"
                                for="ingredient-{{ $ingredient->id }}">{{ $ingredient->name }}</label>
                        @endif
                    </div>
                @endforeach
            </div>

            @error('ingredients_new')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror


            <div class="mb-3">
                <label for="img" class="form-label">Immagine alcolico</label>
                <input type="text" class="form-control @error('img') is-invalid @enderror" id="img" name="img"
                    value="{{ old('img', $cocktail->img) }}">
            </div>
            @error('img')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <input type="submit" value="Modifica" class="btn btn-primary">
        </form>
    </div>
@endsection

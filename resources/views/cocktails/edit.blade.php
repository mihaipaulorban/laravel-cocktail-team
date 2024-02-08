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
                <label for="ingredients" class="form-label">Ingredienti</label>
                <input type="text" class="form-control @error('ingredients') is-invalid @enderror" id="ingredients"
                    name="ingredients" value="{{ old('ingredients', $cocktail->ingredients) }}">
            </div>
            @error('ingredients')
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

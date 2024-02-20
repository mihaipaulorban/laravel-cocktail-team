@extends('layouts.app')

@section('main')
<div class="container">
    <form action="{{ route('ingredients.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Nome</label>
            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name"
                value="{{ old('name') }}">
        </div>
        @error('name')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <input type="submit" value="Aggiungi" class="btn btn-primary">
    </form>
</div>
@endsection
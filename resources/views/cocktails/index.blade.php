@extends('layouts.app')

@section('main')
    <a href="{{ route('cocktails.create') }}" class="btn btn-primary btn-sm">Crea il tuo cocktail</a>
    <div class="container d-flex gap-4 flex-wrap mt-4">
        @foreach ($cocktails as $cocktail)
            <div class="card" style="width: 18rem;">
                <img src={{ $cocktail['img'] }} class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">{{ $cocktail['name'] }}</h5>
                    <p class="card-text">{{ $cocktail['ingredients'] }}</p>
                    <a href="#" class="btn btn-primary">Ordina</a>
                </div>
            </div>
        @endforeach
    </div>
@endsection

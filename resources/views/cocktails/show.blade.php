@extends('layouts.app')

@section('main')
    <div class="container d-flex justify-content-center gap-5">
        <div class="card" style="width: 18rem;">
            <img src={{ $cocktail['img'] }} class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title">{{ $cocktail['name'] }}</h5>
                <p class="card-text">{{ $cocktail['ingredients'] }}</p>
                @if ($cocktail->alcolico)
                    <p>Alcolico</p>
                @else
                    <p>Analcolico</p>
                @endif
                <a href="{{ route('cocktails.index') }}" class="btn btn-primary">Torna alla lista</a>
                <a class="btn btn-primary my-3" href="{{ route('cocktails.edit', $cocktail) }}">Modifica il Cocktail</a>
            </div>
        </div>
        <h3 class="m-5 text-danger ">Il cocktail {{ $cocktail['name'] }} ha i seguenti ingredienti
            {{ $cocktail['ingredients'] }} ed
            è @if ($cocktail->alcolico)
                Alcolico
            @else
                Analcolico
            @endif
        </h3>
    </div>
@endsection

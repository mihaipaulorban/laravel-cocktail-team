@extends('layouts.app')

@section('main')
    <ul>
        @foreach ($ingredients as $ingredient)
            <li class="mb-2">
                {{$ingredient->name}} 
                <div class="container">
                    <form action="{{ route('ingredients.destroy', $ingredient) }}" method="POST">
                        @csrf
                        @method('DELETE')

                        <button>delete</button>
                    </form>
                </div>
            </li>
        @endforeach
    </ul>
    <a href="{{ route('ingredients.create') }}" class="btn btn-primary btn-sm">Aggiungi ingredienti</a>
@endsection
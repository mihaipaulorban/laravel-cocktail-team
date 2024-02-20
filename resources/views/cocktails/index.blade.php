@extends('layouts.app')

@section('main')
   <div>
    <a href="{{ route('cocktails.create') }}" class="btn btn-primary btn-sm">Crea il tuo cocktail</a>
    <a href="{{ route('ingredients.index') }}" class="btn btn-primary btn-sm">Aggiungi un ingrediente</a>
   </div>
    <div class="container d-flex gap-4 flex-wrap mt-4">
        @foreach ($cocktails as $cocktail)
            <div class="card p-4" style="width: 18rem;">
                <img src={{ $cocktail['img'] }} class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">{{ $cocktail['name'] }}</h5>
                    <a href="{{ route('cocktails.show', $cocktail) }}" class="btn btn-primary my-2">Mostra</a>
                    <form action="{{ route('cocktails.destroy', $cocktail) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <input type="button" value="Cancella" class="btn btn-danger" data-bs-toggle="modal"
                            data-bs-target="#modal{{ $loop->iteration }}">
                        <!-- Modal -->
                        <div class="modal fade" id="modal{{ $loop->iteration }}" tabindex="-1"
                            aria-labelledby="modalLabel{{ $loop->iteration }}" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header bg-danger text-light">
                                        <h1 class="modal-title fs-5" id="modalLabel{{ $loop->iteration }}">Sei
                                            sicuro
                                            di voler cancellare
                                            il cocktail '{{ $cocktail->name }}'?</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-primary" data-bs-dismiss="modal">No</button>
                                        <input type="submit" value="Si" class="btn btn-danger">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        @endforeach
    </div>
@endsection

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    {{-- Includo gli assets con la direttiva @vite --}}
    @vite ('resources/js/app.js')
    <title>Laravel Cocktails</title>
</head>

<body>

    <header>
        <h1 class="text-center text-uppercase ">i miei cocktail</h1>
    </header>
    <main>
        <div class="container d-flex gap-4 flex-wrap">
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
    </main>
</body>

</html>
{{-- Questa é la sintassi per includere immagini dopo la compressione di vite --}}

{{-- <img src="{{ Vite::asset ('resources/img/logo-png') }}" alt=""> --}}

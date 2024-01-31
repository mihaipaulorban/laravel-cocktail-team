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

<body class="d-flex vh-100 justify-content-center align-items-center">
    <div class="container text-center">
        <div>
            <h1 class="display-1">Laravel Cocktails</h1>
        </div>
        <ul>
            @foreach ($cocktails as $cocktail)
                <li>{{ $cocktail['name'] }}</li>
            @endforeach
        </ul>

    </div>

    {{-- Questa é la sintassi per includere immagini dopo la compressione di vite --}}

    {{-- <img src="{{ Vite::asset ('resources/img/logo-png') }}" alt=""> --}}

</body>

</html>

<?php

namespace App\Http\Controllers\Guest;

// Controller per la pagina dei cocktail
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCocktailRequest;
use App\Http\Requests\UpdateCocktailsRequest;
// Model 
use App\Models\Cocktail;
use App\Models\Ingredient;
use Illuminate\Http\Request;

class CocktailsResController extends Controller
{

    // Rimanda alla pagina dei cocktail
    public function index()
    {
        $ingredients = Ingredient::all();
        $cocktails = Cocktail::all();
        return view('cocktails.index', compact('cocktails', 'ingredients'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $ingredients = Ingredient::all();

        return view('cocktails.create', compact('ingredients'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCocktailRequest $request)
    {


        $data = $request->validated();
        $newcocktail = new Cocktail();
        $newcocktail->fill($data);

        $newcocktail->save();

        if (isset($data['ingredients'])) {
            $newcocktail->ingredients()->sync($data['ingredients']);
        }

        return redirect()->route('cocktails.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $ingredients = Ingredient::all();
        $cocktail = Cocktail::findOrFail($id);
        return view('cocktails.show', compact('cocktail', 'ingredients'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Cocktail $cocktail)
    {
        $ingredients = Ingredient::all();
        return view('cocktails.edit', compact('cocktail', 'ingredients'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCocktailsRequest $request, Cocktail $cocktail)
    {
        $data = $request->validated();
        $cocktail->update($data);
        if (isset($data['ingredients'])) {
            $cocktail->ingredients()->sync($data['ingredients']);
        } else {
            $cocktail->ingredients()->sync([]);
        }
        return redirect()->route('cocktails.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Cocktail $cocktail)
    {
        $cocktail->delete();
        return redirect()->route('cocktails.index');
    }
}

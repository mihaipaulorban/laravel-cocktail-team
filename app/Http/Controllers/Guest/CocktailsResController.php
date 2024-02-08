<?php

namespace App\Http\Controllers\Guest;

// Controller per la pagina dei cocktail
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCocktailRequest;
// Model 
use App\Models\Cocktail;

use Illuminate\Http\Request;

class CocktailsResController extends Controller
{

    // Rimanda alla pagina dei cocktail
    public function index()
    {
        $cocktails = Cocktail::all();
        return view('cocktails.index', compact('cocktails'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('cocktails.create');
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

        return redirect()->route('cocktails.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $cocktail = Cocktail::findOrFail($id);
        return view('cocktails.show', compact('cocktail'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

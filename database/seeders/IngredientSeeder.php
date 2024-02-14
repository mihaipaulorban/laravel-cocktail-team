<?php

namespace Database\Seeders;

use App\Models\Ingredient;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class IngredientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $ingredients = ['Rum', 'Vodka', 'Lime', 'Gin', 'Pera'];

        foreach ($ingredients as $ingredient) {
            $new_ingredient = new Ingredient();
            $new_ingredient->name = $ingredient;
            $new_ingredient->slug = Str::slug($ingredient);
            $new_ingredient->save();
        }
    }
}

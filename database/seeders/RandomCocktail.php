<?php

namespace Database\Seeders;

use App\Models\Cocktail;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Faker\Generator as Faker;
use Illuminate\Database\Seeder;

class RandomCocktail extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker): void
    {
        for ($i = 0; $i < 5; $i++) {
            $newCocktail = new Cocktail();
            $newCocktail->name = $faker->randomElement(['Quattro Bianchi', 'Bellini', 'Margarita', 'Mojito']);
            $newCocktail->ingredients = $faker->randomElement(['Vodka-Rum-Triple Sec', 'Vodka-Pesca', 'Rum&Cola', 'Prosecco-Tequila-Gin']);
            $newCocktail->img = $faker->randomElement(['https://www.bing.com/th?id=OSK.HEROErId-_rF0M08d9emxmK5xpieEGDJ-600BqIYVYtrY9Q&pid=cdx&w=200&h=118&c=7', 'https://www.bing.com/th?id=OSK.HEROvQRHu96arVcaexeLzGSR0xKEwVmQ1aBSfgaeUfZL4to&pid=cdx&w=200&h=128&c=7', 'https://www.bing.com/th?id=OSK.HEROXTJs7tnzQZOIqTYgHSWs_EzpSjVumdKLjKKgYTr7bKc&pid=cdx&w=200&h=118&c=7', 'https://th.bing.com/th?id=OSK.2f7d79fd32a6aaca65e63ba46c386663&w=197&h=118&c=7&rs=2&qlt=80&o=6&cdv=1&pid=16.1']);
            $newCocktail->save();
        }
    }
}

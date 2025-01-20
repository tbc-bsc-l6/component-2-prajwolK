<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Http;
use App\Models\Food;

class FoodSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $response = Http::get('https://api.spoonacular.com/recipes/complexSearch',[
            'apiKey' => 'af68f1445e0a44e381f6cc994524c952',
            'number' => 30,
        ]);

        if($response->successful()){
            $foods = $response->json()['results'];

            foreach ($foods as $food) {
                $price = rand(5, 20);
                Food::create([
                    'name' => $food['title'],
                    'detail' => $food['summary'] ?? 'No details available',
                    'price' => $price,
                    'image' => $food['image'],
                ]);
            }
        }else {
            echo "Error fetching data from the API.";
        }
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Picture;

class FoodSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {   

        $faker = \Faker\Factory::create();

        $picture = new Picture;

        $response = $picture->search(['query' =>'food','per_page' => 10]);

        $foods = [];

        $fotos = $response['data']['photos'];

       

        for($i = 0 ; $i <= 50 ; $i++){

            $random = random_int(0, count($fotos) - 1 );

            $url = $fotos[$random]['src']['medium'];

            $food = [
                'name' => $faker->unique()->word(),
                'description' => $faker->text($maxNbChars = 200),
                'picture' => $url,
                'status' => 1
            ];
            $foods = [...$foods,$food];
        }
            
        \App\Models\Food::insert($foods);

    }
}

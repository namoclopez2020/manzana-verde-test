<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Food;
use App\Models\FoodUser;

class FoodUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = User::pluck('id');
        $foods = Food::pluck('id');

        for($i = 1 ; $i <= 30; $i++){
            $user_id = $users->random();
            $food_id = $foods->random();

            $registro_existente = FoodUser::where('user_id',$user_id)->where('food_id',$food_id)->exists();

            if(!$registro_existente){
                $eleccion = new FoodUser([
                    'user_id' => $user_id,
                    'food_id' => $food_id
                ]);
                $eleccion->save();
            }
           
        }
    }
}

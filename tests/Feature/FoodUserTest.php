<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use DB;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Testing\Fluent\AssertableJson;
use App\Models\Food;
use App\Models\FoodUser;


class FoodUserTest extends TestCase
{
    /** @test */
    public function unselected_food_list(){

        DB::beginTransaction();

        $user = User::create([
            "email" => "user@mail.com",
            "name" => "test",
            "password" => Hash::make('123456')
        ]);

        $credentials = [
            "email" => "user@mail.com",
            "password" => "123456"
        ];

        $response = $this->post('/api/auth/login', $credentials);
        
        $token = $response['access_token'];
        
        $response = $this->withHeaders([
            'Authorization' => $token,
        ])->get('/api/food/list');

        
        $response->assertStatus(200)->assertJson(fn (AssertableJson $json) =>
            $json->whereAllType([
                'data.list.current_page' => 'integer',
                'data.list.data' => 'array'
            ])
        );
        DB::rollback();
    }

    /** @test */
    public function selected_food_list_by_user(){

        DB::beginTransaction();

        $user = User::create([
            "email" => "user@mail.com",
            "name" => "test",
            "password" => Hash::make('123456')
        ]);

        $credentials = [
            "email" => "user@mail.com",
            "password" => "123456"
        ];

        $response = $this->post('/api/auth/login', $credentials);
        
        $token = $response['access_token'];
        
        $response = $this->withHeaders([
            'Authorization' => $token,
        ])->get('/api/food/list_of_user');

        

        $response->assertStatus(200)->assertJson(fn (AssertableJson $json) =>
            $json->whereAllType([
                'data.list.current_page' => 'integer',
                'data.list.data' => 'array'
            ])
        );

        DB::rollback();
    }

    /** @test */
    public function assign_food_to_user(){

        DB::beginTransaction();

        $user = User::create([
            "email" => "user@mail.com",
            "name" => "test",
            "password" => Hash::make('123456')
        ]);

        $credentials = [
            "email" => "user@mail.com",
            "password" => "123456"
        ];

        $response = $this->post('/api/auth/login', $credentials);
        
        $token = $response['access_token'];

        $foods = Food::pluck('id');
        $food_id = $foods->random();
        
        $response = $this->withHeaders([
            'Authorization' => $token,
        ])->post('/api/food/assign', [
            'food_id' => $food_id,
        ]);

        $response->assertStatus(200)->assertJson([
            'data' => [
                'message' => 'Comida asignada correctamente'
            ]
        ]);

        DB::rollback();
    }

    /** @test */
    public function unselect_food_of_user(){

        DB::beginTransaction();

        $user = User::create([
            "email" => "user@mail.com",
            "name" => "test",
            "password" => Hash::make('123456')
        ]);

        $credentials = [
            "email" => "user@mail.com",
            "password" => "123456"
        ];

        $response = $this->post('/api/auth/login', $credentials);
        
        $token = $response['access_token'];

        $foods = Food::pluck('id');
        $food_id = $foods->random();


        $comida_asignada = FoodUser::create([
            'food_id' => $food_id,
            'user_id' => $user->id,
            'status' => 1
        ]);
        
        $response = $this->withHeaders([
            'Authorization' => $token,
        ])->post('/api/food/delete', [
            'food_id' => $food_id,
        ]);

        $response->assertStatus(200)->assertJson([
            'data' => [
                'message' => 'Comida removida de la lista correctamente'
            ]
        ]);

        DB::rollback();
    }

    /** @test */
    public function unselect_food_that_is_not_of_user(){

        DB::beginTransaction();

        $user = User::create([
            "email" => "user@mail.com",
            "name" => "test",
            "password" => Hash::make('123456')
        ]);

        $credentials = [
            "email" => "user@mail.com",
            "password" => "123456"
        ];

        $response = $this->post('/api/auth/login', $credentials);
        
        $token = $response['access_token'];

        $foods = Food::pluck('id');
        $food_id = $foods->random();

        FoodUser::where('user_id',$user->id)->where('food_id',$food_id)->delete();
        
        $response = $this->withHeaders([
            'Authorization' => $token,
        ])->post('/api/food/delete', [
            'food_id' => $food_id,
        ]);

        $response->assertStatus(409)->assertJson(fn (AssertableJson $json) =>
            $json->whereAllType([
                'errors' => 'array',
            ])
        );

        DB::rollback();
    }
}

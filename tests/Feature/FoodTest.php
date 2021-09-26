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

class FoodTest extends TestCase
{
    /** @test */
    public function create_food(){

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

        $params = [
            'name' => 'comida nueva',
            'description' => 'descripcion de comida nueva',
            'picture' => 'https://images.pexels.com/photos/1260968/pexels-photo-1260968.jpeg?auto=compress&cs=tinysrgb&h=350'
        ];
        
        $response = $this->withHeaders([
            'Authorization' => $token,
        ])->post('/api/food/create', $params);

        $response->assertStatus(200)->assertJson([
            'data' => [
                'message' => 'Comida creada correctamente'
            ]
        ]);

        DB::rollback();
    }

    /** @test */
    public function generate_image(){

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

        $params = [
            'food' => 'pizza'
        ];

        $response = $this->withHeaders([
            'Authorization' => $token,
        ])->get('/api/food/generate_image?food='.$params['food']);

        $response->assertStatus(200)->assertJson(fn (AssertableJson $json) =>
            $json->whereAllType([
                'data.image' => 'array',
            ])
        );

        DB::rollback();
    }
}

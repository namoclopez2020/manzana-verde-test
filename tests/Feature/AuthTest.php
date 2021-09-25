<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use DB;

class AuthTest extends TestCase
{    
    /** @test */
    public function authenticated_to_a_user(){

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
        $response->assertStatus(200);
        $this->assertCredentials($credentials);

        DB::rollback();
    }

    /** @test */
    public function register_to_a_user(){

        DB::beginTransaction();

        $values = [
            "email" => "user@mail.com",
            "name" => "test",
            "password" => '123456',
            "c_password" => '123456'
        ];

        $response = $this->post('/api/auth/register', $values);
        $response->assertStatus(200);

        DB::rollback();
    }

    /** @test */
    public function not_authenticate_to_a_user_with_credentials_invalid(){

        DB::beginTransaction();

        $user = User::create([
            "email" => "user@mail.com",
            "name" => "test",
            "password" => Hash::make('12345678')
        ]);

        $credentials = [
            "email" => "user@mail.com",
            "password" => "123456"
        ];

        $response = $this->post('/api/auth/login', $credentials);
        $response->assertStatus(401);
        $this->assertInvalidCredentials($credentials);

        DB::rollback();
    }

    /** @test */
    public function the_email_is_required_for_authenticate(){

        DB::beginTransaction();

        $user = User::create([
            "email" => "user@mail.com",
            "name" => "test",
            "password" => Hash::make('12345678')
        ]);

        $credentials = [
            "email" => null,
            "password" => "12345678"
        ];

        $response = $this->post('/api/auth/login', $credentials);
        $response->assertStatus(422)->assertJson([
            "email" => [
                "El campo email es obligatorio."
            ]
        ]);
        
        DB::rollback();
    }

    /** @test */
    public function the_password_is_required_for_authenticate(){
        
        DB::beginTransaction();

        $user = User::create([
            "email" => "user@mail.com",
            "name" => "test",
            "password" => Hash::make('12345678')
        ]);

        $credentials = [
            "email" => "user@mail.com",
            "password" => null
        ];

        $response = $this->post('/api/auth/login', $credentials);
        $response->assertStatus(422)->assertJson([
            "password" => [
                "El campo password es obligatorio."
            ]
        ]);
       
        DB::rollback();
    }

}

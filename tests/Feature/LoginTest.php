<?php

namespace Tests\Feature;

use App\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class LoginTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_create_login()
    {
        factory(User::class)->create();
        $this->assertDatabaseHas('users', ['id' => 1]);
    }

    public function test_login()
    {
        $user = factory(User::class)->create();
        $response = $this->actingAs($user)->get('/');
        $response->assertStatus(200);
    }

    public function test_logout()
    {
        $response = $this->get('/login');
        $response->assertStatus(200);
    }
}

<?php

namespace Tests\Feature;

use App\Entities\History;
use App\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class HistoryTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_create_history()
    {
        factory(User::class)->create();
        factory(History::class)->create();
        $this->assertDatabaseHas('histories', ['id' => 1]);
    }
}

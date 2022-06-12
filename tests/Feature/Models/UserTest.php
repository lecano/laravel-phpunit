<?php

namespace Tests\Feature\Models;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserTest extends TestCase
{
    use RefreshDatabase;

    public function test_user()
    {
        User::factory()->create([
            'email' => 'admin@example.com'
        ]);

        $this->assertDatabaseHas('users', ['email' => 'admin@example.com']);

        $this->assertDatabaseMissing('users', ['email' => 'fake@example.com']);
    }
}

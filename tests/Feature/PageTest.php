<?php

namespace Tests\Feature;

use App\Models\Tag;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PageTest extends TestCase
{
    use RefreshDatabase;

    public function test_home()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function test_empty_home()
    {
        $response = $this->get('/');

        $response->assertStatus(200);

        $response->assertSee('No tags available.');
    }

    public function test_home_has_tags()
    {
        $tag = Tag::factory()->create();

        $this->get('/')
            ->assertStatus(200)
            ->assertSee($tag->name)
            ->assertDontSee('No tags available.');
    }

    public function test_about()
    {
        $response = $this->get('/about');

        $response->assertStatus(200);
    }
}

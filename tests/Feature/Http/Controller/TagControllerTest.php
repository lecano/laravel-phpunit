<?php

namespace Tests\Feature\Http\Controller;

use App\Models\Tag;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class TagControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_store()
    {
        $this->post('/tags', [
            'name' => 'php'
        ])->assertRedirect('/');

        $this->assertDatabaseHas('tags', ['name' => 'php']);
    }

    public function test_destroy()
    {
        $tag = Tag::factory()->create();

        $this->delete("tags/{$tag->id}")->assertRedirect('/');

        $this->assertDatabaseMissing('tags', ['name' => $tag->name]);
    }

    public function test_validate()
    {
        $this->post('/tags', [
            'name' => ''
        ])->assertSessionHasErrors('name');
    }
}

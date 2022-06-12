<?php

namespace Tests\Unit\Models;

use App\Models\Post;
use PHPUnit\Framework\TestCase;

class PostTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_set_name_in_lowercase()
    {
        $post = new Post;
        $post->name = 'Testing Lowercase';

        $this->assertEquals('testing lowercase', $post->name);
    }

    public function test_get_slug()
    {
        $post = new Post;
        $post->name = 'Testing Slug';

        $this->assertEquals('testing-slug', $post->slug);
    }

    public function test_get_url()
    {
        $post = new Post;
        $post->name = 'Testing Slug';

        $this->assertEquals('blog/testing-slug', $post->url());
    }
}

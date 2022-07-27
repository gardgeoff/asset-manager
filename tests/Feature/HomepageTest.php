<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class Homepagetest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_the_homepage_loads()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
        $response->assertSeeText("Home");
    }
}
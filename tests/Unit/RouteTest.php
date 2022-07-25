<?php

namespace Tests\Unit;

use App\Models\User;
use Tests\TestCase;


class RouteTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_login_form(){
        $response = $this->get("/login");
        $response->assertStatus(200);
    }
    public function test_register_form(){
        $response = $this->get("/register");
        $response->assertStatus(200);
    }
}

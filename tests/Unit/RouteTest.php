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
    public function test_login_form()
    {
        $response = $this->get("/login");
        $response->assertStatus(200);
    }
    public function test_register_form()
    {
        $response = $this->get("/register");
        $response->assertStatus(200);
    }
    public function test_it_stores_new_users()
    {
        $response = $this->post("/users", [
            "name" => "Geoff",
            "email" => "geofftest@email.com",
            "password" => 'testtest123',
            "password_confirmation" => "testtest123",
        ]);
        $response->assertRedirect("/login");
    }
    public function test_it_logs_in_existing_users()
    {
        $reponse = $this->post("/authenticate", [
            "email" => "test@test.com",
            "password" => "testtest"
        ]);
        $reponse->assertRedirect("/");
    }
}
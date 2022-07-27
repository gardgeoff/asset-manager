<?php

namespace Tests\Feature;

use App\Models\User;
use Tests\TestCase;

class LoginPageTest extends TestCase
{
    public function test_user_can_login_using_login_form()
    {
        $user = User::factory()->create();

        $response = $this->post("/users/authenticate", [
            "email" => $user->email,
            "password" => $user->password
        ]);

        $response->assertRedirect("/");
    }
    public function test_user_can_not_access_admin_page()
    {
        $user = User::factory()->create();

        $response = $this->post("/users/authenticate", [
            "email" => $user->email,
            "password" => $user->password
        ]);

        $this->get("/admin/users");
        $response->assertRedirect("/");
    }
}
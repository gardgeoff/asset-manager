<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AssetPageTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_admin_can_see_all_assets_page()
    {
       $user = User::find(2);
        $response = $this->actingAs($user)
                            ->get("/admin/assets");
        $response->assertSeeText("Assets");

    }
    public function test_admin_can_see_asset_create_page(){
        $user = User::find(2);
        $response = $this->actingAs($user)
            ->get("/admin/assets/create");
        $response->assertSeeText("Create New Asset");
    }
    public function test_admin_can_see_asset_edit_page(){
        $user = User::find(2);
        $response = $this->actingAs($user)
            ->get("/admin/assets/2/edit");
        $response->assertSeeText("Edit Asset");
    }

    

  
}

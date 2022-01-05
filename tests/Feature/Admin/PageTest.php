<?php

namespace Tests\Feature\Admin;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;

class PageTest extends TestCase
{

    use RefreshDatabase;
    /**
     * Test an admin can access admin routes
     * 
     * @return void
     */
    public function test_admin_can_access_admin_any_of_links()
    {
        $user = User::factory()->create(['is_admin' => true]);
        $response = $this->actingAs($user)
                        ->get(route('admin.pages.index'));
        $response->assertStatus(200);
    }

    /**
     * Test any user besides the admin can not access admin routes
     * 
     * @return void
     */
    public function test_admin_only_can_access_admin_links()
    {
        $user = User::factory()->create();
        $response = $this->actingAs($user)
                        ->get(route('admin.pages.index'));
        $response->assertStatus(403);
    }
}

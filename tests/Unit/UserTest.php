<?php

namespace Tests\Unit;

//use PHPUnit\Framework\TestCase;
use Tests\TestCase;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UserTest extends TestCase
{

    use RefreshDatabase;
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_can_create_admin_user()
    {
        $user = User::factory()->create(['is_admin' => true]);
        $this->assertDatabaseHas('users', [
            'email' => $user->email,
            'is_admin' => true
        ]);

        $this->assertIsBool($user->is_admin);
    }
}

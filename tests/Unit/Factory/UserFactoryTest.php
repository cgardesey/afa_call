<?php

namespace Tests\Unit\Factory;

use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Tests\TestCase;


class UserFactoryTest extends TestCase
{
    use RefreshDatabase; // This will reset the database after each test.

    /**
     * Test the UserFactory to create a user.
     *
     * @return void
     */
    public function testUserFactory()
    {
        // Use the UserFactory to create a user
        $user = User::factory()->create();

        // Assertions to test the user creation
        $this->assertInstanceOf(User::class, $user);
        $this->assertDatabaseHas('users', ['id' => $user->id]);
    }
}

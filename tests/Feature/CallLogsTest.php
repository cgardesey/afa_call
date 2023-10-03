<?php

namespace Tests\Feature;

use App\Models\CallLog;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CallLogsTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */

    use WithFaker, RefreshDatabase;

    /** @test */
    public function a_user_can_make_calls()
    {
        $this->withoutExceptionHandling();

        $user = User::factory()->create();

        $this->actingAs($user);

        $attributes = [
            'caller_phonenumber' => '0240000000',
            'callee_phonenumber' => '0540000000',
            'user_id' => $user->id
        ];
        $response = $this->post('/place-call', $attributes);


        $this->assertDatabaseHas('call_logs', $attributes);
    }

    /** @test */
    public function a_call_log_has_caller_ponenumber_and_callee_phonenumber()
    {
        $attributes = ['user_id' => User::factory()->create()->id];
        $this->post('place-call', $attributes)->assertSessionHasErrors(['caller_phonenumber', 'callee_phonenumber']);
    }
}

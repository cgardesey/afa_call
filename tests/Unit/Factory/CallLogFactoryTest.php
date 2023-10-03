<?php

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\CallLog;

class CallLogFactoryTest extends TestCase
{
    use RefreshDatabase; // This trait will refresh the database after each test

    /**
     * Test if the CallLogFactory generates a valid CallLog instance.
     *
     * @return void
     */
    public function test_call_log_factory_generates_valid_instance()
    {
        $callLog = CallLog::factory()->create();

        // Assert that the created CallLog instance exists in the database
        $this->assertDatabaseHas('call_logs', [
            'id' => $callLog->id,
            'caller_phonenumber' => $callLog->caller_phonenumber,
            'callee_phonenumber' => $callLog->callee_phonenumber,
            'call_id' => $callLog->call_id,
            'user_id' => $callLog->user_id,
        ]);
    }
}

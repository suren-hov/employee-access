<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Employee;
use App\Models\Room;

class RoomAccessTest extends TestCase
{
    public function test_prevents_overlapping_room_access()
    {
        $employee = Employee::factory()->create();
        $room = Room::factory()->create();

        $this->postJson('/api/room-accesses', [
            'employee_id' => $employee->id,
            'room_id' => $room->id,
            'day_of_week' => 'monday',
            'start_time' => '10:00',
            'end_time' => '12:00',
        ])->assertStatus(201);

        // This should fail due to overlap
        $response = $this->postJson('/api/room-accesses', [
            'employee_id' => $employee->id,
            'room_id' => $room->id,
            'day_of_week' => 'monday',
            'start_time' => '11:00',
            'end_time' => '13:00',
        ]);

        $response->assertStatus(422)
            ->assertJsonValidationErrors('overlap');

        $this->assertDatabaseCount('room_accesses', 1);
    }
}

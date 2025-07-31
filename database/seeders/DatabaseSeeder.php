<?php

namespace Database\Seeders;

use App\Models\Employee;
use App\Models\Room;
use App\Models\RoomAccess;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Employee::factory()->count(3)->create();
        Room::factory()->count(2)->create();

        RoomAccess::create([
            'employee_id' => 1,
            'room_id' => 1,
            'day_of_week' => 'monday',
            'start_time' => '10:00:00',
            'end_time' => '12:00:00',
        ]);
    }
}

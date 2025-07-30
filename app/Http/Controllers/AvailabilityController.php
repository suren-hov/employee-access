<?php

namespace App\Http\Controllers;

use App\Models\Room;
use Illuminate\Http\Request;
use App\Models\RoomAccess;

class AvailabilityController extends Controller
{
    public function employeeAvailableRooms(Request $request)
    {
        $request->validate([
            'employee_id' => 'required|exists:employees,id',
            'day_of_week' => 'required|string',
            'time' => 'required|date_format:H:i',
        ]);

        $rooms = Room::whereDoesntHave('roomAccesses', function ($query) use ($request) {
            $query->where('day_of_week', $request->day_of_week)
                ->where('employee_id', $request->employee_id)
                ->where('start_time', '<=', $request->time)
                ->where('end_time', '>', $request->time);
        })->get();

        return response()->json($rooms);
    }

    public function freeRoomsAt(Request $request)
    {
        $request->validate([
            'day_of_week' => 'required|string',
            'time' => 'required|date_format:H:i',
        ]);

        $rooms = Room::whereDoesntHave('roomAccesses', function ($query) use ($request) {
            $query->where('day_of_week', $request->day_of_week)
                ->where('start_time', '<=', $request->time)
                ->where('end_time', '>', $request->time);
        })->get();

        return response()->json($rooms);
    }
}

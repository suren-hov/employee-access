<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreRoomRequest;
use App\Models\Room;

class RoomController extends Controller
{
    public function store(StoreRoomRequest $request)
    {
        $room = Room::create($request->validated());
        return response()->json($room, 201);
    }
}

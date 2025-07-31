<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreRoomRequest;
use App\Http\Resources\RoomResource;
use App\Models\Room;

class RoomController extends Controller
{
    /**
     * @param StoreRoomRequest $request
     * @return RoomResource
     */
    public function store(StoreRoomRequest $request): RoomResource
    {
        $room = Room::create($request->validated());
        return new RoomResource($room);
    }
}

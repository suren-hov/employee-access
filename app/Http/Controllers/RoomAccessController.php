<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreRoomAccessRequest;
use App\Services\RoomAccessService;

class RoomAccessController extends Controller
{
    public function __construct(
        protected RoomAccessService $service
    ) {}

    public function store(StoreRoomAccessRequest $request)
    {
        $access = $this->service->assign($request->validated());
        return response()->json($access, 201);
    }
}

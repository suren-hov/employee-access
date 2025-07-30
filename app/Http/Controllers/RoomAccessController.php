<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreRoomAccessRequest;
use App\Models\RoomAccess;
use App\Services\RoomAccessService;

class RoomAccessController extends Controller
{
    public function __construct(
        protected RoomAccessService $service
    ) {}

    public function store(StoreRoomAccessRequest $request)
    {
        $this->authorize('create', RoomAccess::class);
        $access = $this->service->assign($request->validated());
        return response()->json($access, 201);
    }
}

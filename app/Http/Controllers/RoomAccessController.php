<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreRoomAccessRequest;
use App\Http\Resources\RoomAccessResource;
use App\Services\RoomAccessService;
use Illuminate\Validation\ValidationException;

class RoomAccessController extends Controller
{
    /**
     * @param RoomAccessService $service
     */
    public function __construct(
        protected RoomAccessService $service
    ) {}

    /**
     * @param StoreRoomAccessRequest $request
     * @return RoomAccessResource
     * @throws ValidationException
     */
    public function store(StoreRoomAccessRequest $request): RoomAccessResource
    {
        $access = $this->service->assign($request->validated());
        return new RoomAccessResource($access->load('employee', 'room'));
    }
}

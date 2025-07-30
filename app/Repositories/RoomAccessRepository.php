<?php

namespace App\Repositories;

use App\Models\RoomAccess;
use App\Repositories\Interfaces\RoomAccessRepositoryInterface;
use Illuminate\Support\Facades\DB;

class RoomAccessRepository implements RoomAccessRepositoryInterface
{
    public function hasOverlap(array $data): bool
    {
        return RoomAccess::where('day_of_week', $data['day_of_week'])
            ->where(function ($query) use ($data) {
                $query->where('employee_id', $data['employee_id'])
                    ->orWhere('room_id', $data['room_id']);
            })
            ->where(function ($query) use ($data) {
                $query->where(function ($q) use ($data) {
                    $q->where('start_time', '<', $data['end_time'])
                        ->where('end_time', '>', $data['start_time']);
                });
            })
            ->exists();
    }

    public function create(array $data)
    {
        return RoomAccess::create($data);
    }
}

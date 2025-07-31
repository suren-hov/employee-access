<?php

namespace App\Services;

use App\Repositories\Interfaces\RoomAccessRepositoryInterface;
use Illuminate\Validation\ValidationException;

class RoomAccessService
{
    public function __construct(
        protected RoomAccessRepositoryInterface $repository
    ) {}

    public function assign(array $data)
    {
//        if ($this->repository->hasOverlap($data)) {
//            throw ValidationException::withMessages([
//                'overlap' => 'Access overlaps with an existing permission.'
//            ]);
//        }

        return $this->repository->create($data);
    }
}

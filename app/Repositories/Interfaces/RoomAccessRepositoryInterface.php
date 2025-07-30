<?php

namespace App\Repositories\Interfaces;

use Illuminate\Support\Collection;

interface RoomAccessRepositoryInterface
{
    public function hasOverlap(array $data): bool;
    public function create(array $data);
}

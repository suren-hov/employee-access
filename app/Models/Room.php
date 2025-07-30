<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Room extends Model
{
    protected $fillable = ['name'];

    public function roomAccesses(): HasMany
    {
        return $this->hasMany(RoomAccess::class);
    }
}

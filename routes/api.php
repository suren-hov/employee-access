<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    EmployeeController,
    RoomController,
    RoomAccessController,
    AvailabilityController
};

Route::post('/employees', [EmployeeController::class, 'store']);
Route::post('/rooms', [RoomController::class, 'store']);
Route::post('/room-accesses', [RoomAccessController::class, 'store']);

Route::get('/employee-available-rooms', [AvailabilityController::class, 'employeeAvailableRooms']);
Route::get('/free-rooms', [AvailabilityController::class, 'freeRoomsAt']);

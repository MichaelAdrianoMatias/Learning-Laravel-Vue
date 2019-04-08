<?php

use Illuminate\Http\Request;


// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::apiResource('room', 'API\RoomController');
Route::apiResource('roomtype', 'API\RoomTypeController');


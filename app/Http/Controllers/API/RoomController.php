<?php

namespace App\Http\Controllers\API;

use App\Room;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Resources\RoomResource;
use Symfony\Component\HttpFoundation\Response;

class RoomController extends Controller
{

    public function index()
    {
       return RoomResource::collection(Room::latest()->get());
    }
    public function store(Request $request)
    {
        $this->validate($request,[
            'code' => 'required|string|min:3|max:20',
            'name' => 'required|string|min:4|max:191|unique:rooms',
            'floor' => 'required',
            'max_person' => 'required|max:20',
            'room_type' => 'required'
          ]);
          
        $room = Room::create($request->all());
        $room->load('type','user');
        return ([
            'id' => $room->id,
            'code' => $room->code,
            'name' => $room->name,
            'room_type' => $room->type->name,
            'floor' => $room->floor,
            'status' => $room->status,
            'max_person' => $room->max_person,
            'created_at' => $room->created_at->diffForHumans(),
            'created_by' => $room->user->name,   
        ]);
    }

    public function show(Room $room)
    {
        return new RoomResource($room);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'code' => 'required|string|min:3|max:20',
            'floor' => 'required',
            'max_person' => 'required|max:20',
            'room_type' => 'required'
          ]);
        $room = Room::findOrFail($id);
        $room->update($request->all());
        
    }

    public function destroy(Room $room)
    {
        $room->delete();
        
    }
}

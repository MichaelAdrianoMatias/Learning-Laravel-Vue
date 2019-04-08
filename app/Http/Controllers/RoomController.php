<?php

namespace App\Http\Controllers;


use App\Room;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class RoomController extends Controller
{
  public function index()
  {
    

    // return Room::latest()->paginate(50);
  }

  public function store(Request $request)
  {
    $room = Room::create([
      'code' => $request['code'],
      'name' => $request['name'],
      'description' => $request['description'],
    ]);  

    return response()->json($room, 201);
  }

  public function show(Room $room)
  {
    return $room;
  }

  public function update(Request $request, Room $room)
  {
    $this->validate($request,[
      'code' => 'required|min:3|max:20',
      'name' => 'required|min:4|max:50|unique:rooms,'.Auth::room()->id,
      'description' => 'required'
    ]);

    $room->update($request->all());
    return response()->json($room, 200);
  }

  public function destroy($id)
  {
    $room = Room::findOrFail($id);
    $room->delete();
  }


}

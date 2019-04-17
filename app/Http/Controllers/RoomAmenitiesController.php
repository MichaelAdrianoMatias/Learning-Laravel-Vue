<?php
namespace App\Http\Controllers;
use App\Http\Requests\RoomAmenitiesRequest;
use App\RoomAmenities;
class RoomAmenitiesController extends Controller
{
    public function index()
    {
        $roomamenities = RoomAmenities::latest()->get();
        return response()->json($roomamenities);
    }
    public function store(RoomAmenitiesRequest $request)
    {
        $this->validate($request,[  
            'room_id' => 'required',
            'item_id' => 'required',
            'quantity' => 'required',
            'additional' => 'required',
        ]);
        $roomamenities = RoomAmenities::create($request->all());
        return response()->json($roomamenities, 201);
    }
    public function show($id)
    {
        $roomamenities = RoomAmenities::findOrFail($id);
        return response()->json($roomamenities);
    }
    public function update(RoomAmenitiesRequest $request, $id)
    {
        $roomamenities = RoomAmenities::findOrFail($id);
        $roomamenities->update($request->all());
        return response()->json($roomamenities, 200);
    }
    public function destroy($id)
    {
        RoomAmenities::destroy($id);
        return response()->json(null, 204);
    }
}
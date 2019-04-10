<?php
namespace App\Http\Controllers;
use App\Http\Requests\RoomTypeRequest;
use App\RoomType;
class RoomTypeController extends Controller
{
    public function index()
    {
        $roomtypes = RoomType::latest()->get();
        return response()->json($roomtypes);
    }
    public function store(RoomTypeRequest $request)
    {
        $roomtype = RoomType::create($request->all());
        return response()->json($roomtype, 201);
    }
    public function show($id)
    {
        $roomtype = RoomType::findOrFail($id);
        return response()->json($roomtype);
    }
    public function update(RoomTypeRequest $request, $id)
    {
        $roomtype = RoomType::findOrFail($id);
        $roomtype->update($request->all());
        return response()->json($roomtype, 200);
    }
    public function destroy($id)
    {
        RoomType::destroy($id);
        return response()->json(null, 204);
    }
}
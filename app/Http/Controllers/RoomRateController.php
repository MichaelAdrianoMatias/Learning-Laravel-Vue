<?php
namespace App\Http\Controllers;
use App\Http\Requests\RoomRateRequest;
use App\RoomRate;
class RoomRateController extends Controller
{
    public function index()
    {
        $roomrates = RoomRate::latest()->get();
       
        return response()->json($roomrates);
    }
    public function store(RoomRateRequest $request)
    {
        $roomrate = RoomRate::create($request->all());
        return ([
                'id' => $roomrate->id,
                'code' => $roomrate->code,
                'room_id' => $roomrate->room_id,
                'hours' => $roomrate->hours,
                'rate' => $roomrate->rate
                
            ]);

    }
    public function show($id)
    {
        $roomrate = RoomRate::findOrFail($id);
        return response()->json($roomrate);
    }
    public function update(RoomRateRequest $request, $id)
    {
        $roomrate = RoomRate::findOrFail($id);
        $roomrate->update($request->all());
        // return response()->json($roomrate, 200);
        return ([
            'id' => $roomrate->id,
            'code' => $roomrate->code,
            'room_id' => $roomrate->room_id,
            'hours' => $roomrate->hours,
            'rate' => $roomrate->rate
            
        ]);
    }
    public function destroy($id)
    {
        RoomRate::destroy($id);
        return response()->json(null, 204);
    }
}
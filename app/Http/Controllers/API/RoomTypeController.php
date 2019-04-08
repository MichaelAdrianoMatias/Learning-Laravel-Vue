<?php

namespace App\Http\Controllers\API;

use App\RoomType;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\RoomTypeResource;

class RoomTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return RoomTypeResource::collection(RoomType::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'code' => 'required|string|min:4|max:20',
            'name' => 'required|string|min:5|max:191|unique:room_types',
            'description' => 'required'
          ]);
          
        return RoomType::create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(RoomType $roomType)
    {
        return new RoomTypeResource($roomType);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'code' => 'required|string|min:4|max:20',
            'name' => 'required|string|min:5|max:191',
            'description' => 'required'
        ]);
        $room = RoomType::findOrFail($id);
        $room->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id 
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $roomType = RoomType::find($id);
        return $roomType->delete();
    }
}

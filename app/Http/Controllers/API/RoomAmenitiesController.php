<?php

namespace App\Http\Controllers;
use App\RoomAmenities;

use Illuminate\Http\Request;

class RoomAmenitiesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roomAmenities = RoomAmenities::all();
       
        return view('room amenities/index')->with('roomAmenities',$roomAmenities);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('room amenities/create');
        //
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
            'room_id' => 'required',
            'item_id' => 'required',
            'quantity' => 'required',
            'additional' => 'required',
        ]);
        $roomAmenities = new RoomAmenities;
        $roomAmenities->room_id = $request->room_id;
        $roomAmenities->item_id = $request->item_id;
        $roomAmenities->quantity = $request->quantity;
        $roomAmenities->additional = $request->additional;
        $roomAmenities->cost = $request->cost;
        // $roomAmenities->created_by = Auth::user()->id;
        $roomAmenities->save();
        return redirect()->route('roomamenities.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $roomAmenities = RoomAmenities::find($id);
        return view('room amenities/edit')->with('roomAmenities',$roomAmenities);
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
            'quantity' => 'required',
        ]);
        $roomAmenities = RoomAmenities::find($id);
        // $roomAmenities->room_id = $request->room_id;
        // $roomAmenities->item_id = $request->item_id;
        $roomAmenities->quantity = $request->quantity;
        $roomAmenities->additional = $request->additional;
        $roomAmenities->cost = $request->cost;

        $roomAmenities->save();
        return redirect()->route('roomamenities.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        RoomAmenities::destroy($id);
        return redirect()->route('roomamenities.index');
    }
}

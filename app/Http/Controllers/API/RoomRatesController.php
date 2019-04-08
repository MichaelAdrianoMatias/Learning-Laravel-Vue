<?php

namespace App\Http\Controllers;

use App\RoomRate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RoomRatesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roomRate = RoomRate::all();
       
        return view('room rate/index')->with('roomRate',$roomRate);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('room rate/create');
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
            'code' => 'required|max:20|unique:room_rates',
            'type_id' => 'required',
            'category' => 'required',
            'hours' => 'required',
            'rate' => 'required',
        ]);
        $roomrate = new RoomRate;
        $roomrate->code = $request->code;
        $roomrate->type_id = $request->type_id;
        $roomrate->category = $request->category;
        $roomrate->hours = $request->hours;
        $roomrate->rateperhour = $request->rateperhour;
        $roomrate->rate = $request->rate;
        $roomrate->created_by = Auth::user()->id;
        $roomrate->save();
        return redirect()->route('roomrate.index');
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
        $roomrate = RoomRate::find($id);
        return view('room rate/edit')->with('roomrate',$roomrate);
        
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
            'rate' => 'required',
            'hours' => 'required',
        ]);
        $roomrate = RoomRate::find($id);
        // $roomrate->code = $request->code;
        // $roomrate->type_id = $request->type_id;
        // $roomrate->category = $request->category;
        $roomrate->rateperhour = $request->rateperhour;
        $roomrate->rate = $request->rate;
        $roomrate->hours = $request->hours;

        $roomrate->save();
        return redirect()->route('roomrate.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        RoomRate::destroy($id);
        return redirect()->route('roomrate.index');
    }
}

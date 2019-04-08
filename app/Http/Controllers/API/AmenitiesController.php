<?php

namespace App\Http\Controllers;

use App\Amenities;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AmenitiesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $amenities = Amenities::all();
        return view('amenities/index')->with('amenities',$amenities);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('amenities/create');
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
            'code' => 'required|max:20',
            'name' => 'required|min:4|max:20',
        
        ]);
        $amenities = new Amenities;
        $amenities->code = $request->code;
        $amenities->name = $request->name;
        $amenities->quantity = $request->quantity;
        $amenities->totalquantity = $request->totalquantity;
        $amenities->barrowedcost = $request->barrowedcost;
        $amenities->damagedcost = $request->damagedcost;
        $amenities->created_by = Auth::user()->id;
        $amenities->save();
        return redirect()->route('amenities.index');
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
        $amenities = Amenities::find($id);
        return view('amenities/edit')->with('amenities',$amenities);
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
        $amenities = Amenities::find($id);

        $amenities->code = $request->code;
        $amenities->name = $request->name;
        $amenities->barrowedcost = $request->barrowedcost;
        $amenities->damagedcost = $request->damagedcost;
        $amenities->save();
        return redirect()->route('amenities.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function stock($id)
    {
        $amenities = Amenities::find($id);
        return view('amenities/add')->with('amenities',$amenities);
    }

     /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function addval(Request $request, $id)
    {
        $amenities = Amenities::find($id);
        $amenities->totalquantity = $request->totalquantity + $amenities->quantity = $request->quantity;
        $amenities->barrowedcost = $request->barrowedcost;
        $amenities->damagedcost = $request->damagedcost;
        $amenities->quantity = $request->quantity;
        $amenities->save();
        return redirect()->route('amenities.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Amenities::destroy($id);
       
        return redirect()->route('amenities.index');

}
}

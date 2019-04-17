<?php
namespace App\Http\Controllers;
use App\Amenities;
use App\Http\Requests\AmenitiesRequest;
use Symfony\Component\HttpFoundation\Request;

class AmenitiesController extends Controller
{
    public function index()
    {
        $amenities = Amenities::latest()->get();
        return response()->json($amenities);
    }
    public function store(Request $request)
    {
        $this->validate($request,[
            'code' => 'required|max:20|unique:amenities',
            'name' => 'required|min:4|max:20|unique:amenities',
            'barrowedcost' => 'required|numeric',
            'damagedcost' => 'required|numeric',
            'quantity' => 'required|integer'
        ]);
        $amenities = Amenities::create($request->all());
        return response()->json($amenities, 201);
    }
    public function show($id)
    {
        $amenities = Amenities::findOrFail($id);
        return response()->json($amenities);
    }
    public function update(Request $request, $id)
    {
        // $this->validate($request,[
        //     'code' => 'required|max:20|unique:amenities,' .$this->id,
        //     'name' => 'required|min:4|max:20|unique:amenities,' .$this->id,
        //     'barrowedcost' => 'required|numeric',
        //     'damagedcost' => 'required|numeric',
        //     'quantity' => 'required|integer'
        // ]);
        $amenities = Amenities::findOrFail($id);
        $amenities->update($request->all());
        return response()->json($amenities, 200);
    }
    public function destroy($id)
    {
        Amenities::destroy($id);
        return response()->json(null, 204);
    }
}
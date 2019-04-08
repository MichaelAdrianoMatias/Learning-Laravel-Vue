<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Session;
use App\Equipment;
use App\Module;

class EquipmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        // $homeController = new HomeController;

        // $homeController->getMenu();

        $equipments = Equipment::all();

        return view('equipment/index')->with('equipments', $equipments);
                                          
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('equipment/create');
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
            'Brand' => 'required|max:100',
            'Model' => 'required|max:100',
            'Type' => 'required|max:50',
            'WarrantyType' => 'required|max:50',
            'WarrantyPeriod' => 'required|max:50',
            'Description' => 'required|max:255',
        ]);

        $equipment = new Equipment;

        $equipment->Brand = $request->brand;
        $equipment->Model = $request->model;
        $equipment->Type = $request->type;
        $equipment->WarrantyType = $request->warrantytype;
        $equipment->WarrantyPeriod = $request->warrantyperiod;
        $equipment->Description = $request->description;
 
        $equipment->save();
        Session::flash('success', 'new employee has successfully added.');
        return redirect()->route('equipment.index');

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
        $equipment = Equipment::findOrfail($id);
        return view('equipment/edit')->with('equipment', $equipment);

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
        // $this->validate($request,[
        //     'code' => 'required|max:50',
        //     'department' => 'required|max:60',
        //     'localnumber' => 'required|max:20',
        // ]);
        $equipment = Equipment::findOrfail($id);

        $equipment->Brand = $request->brand;
        $equipment->Model = $request->model;
        $equipment->Type = $request->type;
        $equipment->WarrantyType = $request->warrantytype;
        $equipment->WarrantyPeriod = $request->warrantyperiod;
        $equipment->Description = $request->description;
 
        $equipment->save();
        Session::flash('success', 'new employee has successfully added.');
        return redirect()->route('equipment.index');
       
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $equipment = Equipment::findOrfail($id);
        $equipment->delete();
        return redirect()->back();

    }
}

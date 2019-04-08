<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;

use Session;
use App\Department;


class DepartmentController extends Controller
{
    // protected $rules = [
    //         'code' => 'required|min:2|max:50',
    //         'department' => 'required|max:60| ,
    //         'localnumber' => 'required|max:20,
    // ];
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employees = Department::all();

        return view('department/index')->with('departments', $employees);    
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('department/create');
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
            'code' => 'required|min:2|max:50|unique:departments',
            'department' => 'required|max:60',
            'localnumber' => 'required|max:20'
        ]);    
    
        $department = new Department;

        $department->code = $request->code;
        $department->department = $request->department;
        $department->localnumber = $request->localnumber;
    
        $department->save();
        Session::flash('success', 'new department has successfully added.');    
        return response()->json($department);
        
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
        $department = Department::findOrfail($id);
        return response()->json($department);
        // return view('department/edit')->with('department', $department);

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
            'code' => 'required|string|min:2|max:15|unique:departments',
            'department' => 'required|max:60',
            'localnumber' => 'required|max:20', 
        ]);
        $department = Department::findOrfail($id);

        $department->code = $request->code;
        $department->department = $request->department;
        $department->localnumber = $request->localnumber;
 
        $department->save();
        //Session::flash('success', 'new department has successfully added.');
        return response()->json($department);
        // return redirect()->route('department.index');
       
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $department = Department::findOrfail($id);
        $department->delete();
        return response()->json($department);
    }
}

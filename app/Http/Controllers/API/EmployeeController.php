<?php

namespace App\Http\Controllers;
use Illuminate\Support\Carbon;
use Illuminate\Http\Request;
use App\Employee;
use Illuminate\Support\Facades\Session;
class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employees = Employee::all();
        return view('employee/index')->with('employees', $employees);    
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('employee/create');
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
            'firstname' => 'required',
            'lastname' => 'required',
            'address' => 'required',
            'contact' => 'required',
            'position' => 'required',
            'dateofbirth' => 'required',
            'datehired' => 'required',
            'employeeno' => 'required|unique:employees',
        ]);
        $employee = new Employee;

        $employee->employeeno = $request->employeeno;
        $employee->firstname = $request->firstname;
        $employee->middlename = $request->middlename;
        $employee->lastname = $request->lastname;
        $employee->dateofbirth = Carbon::parse($request->dateofbirth);
        $employee->address = $request->address;
        $employee->email = $request->email;
        $employee->contact = $request->contact;
        $employee->datehired = Carbon::parse($request->datehired);
        $employee->position = $request->position;
        $employee->jobdescription = $request->jobdescription;
        $employee->save();
        Session::flash('success', 'new employee has successfully added.');
        return redirect()->route('employee.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $employee = Employee::findOrfail($id);
        return view('employee/info')->with('employee', $employee);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $employee = Employee::findOrfail($id);
        return view('employee/edit')->with('employee', $employee);

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
            'firstname' => 'required|max:50',
            'lastname' => 'required|max:50',
            'address' => 'required|max:255',
            'contact' => 'required|max:15',
            'employeeno' => 'required|max:20',
        ]);

        $employee = Employee::find($id);
        $employee->employeeno = $request->employeeno;
        $employee->firstname = $request->firstname;
        $employee->middlename = $request->middlename;
        $employee->lastname = $request->lastname;
        $employee->dateofbirth = Carbon::parse($request->dateofbirth);
        $employee->address = $request->address;
        $employee->email = $request->email;
        $employee->contact = $request->contact;
        $employee->datehired = Carbon::parse($request->datehired);
        $employee->position = $request->position;
        $employee->jobdescription = $request->jobdescription;
        $employee->save();
        Session::flash('success', 'employee has successfully updated.');
        return redirect()->route('employee.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Employee::destroy($id);
        return redirect()->route('employee.index');
    }
}

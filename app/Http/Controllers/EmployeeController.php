<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data=Employee::orderBy('id','desc')->get();
        return view('employee.index',['data'=>$data]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('employee.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    $request->validate([
        'firstname' => 'required',
        'lastname' => 'required',
        'address' => 'required',
        'mobile' => 'required',
        'email' => 'required|email', 
        'position' => 'required',
        'joined' => 'required|date', 
    ]);

    
    $data = new Employee();
    $data->firstname = $request->firstname;
    $data->lastname = $request->lastname;
    $data->address = $request->address;
    $data->mobile = $request->mobile;
    $data->email = $request->email;
    $data->position = $request->position;
    $data->joined = $request->joined;
    
    $data->save();

    return redirect('employee/create')->with('msg', 'Data has been submitted');
}


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data=Employee::find($id);
        return view('employee.show',['data'=>$data]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data=Employee::find($id);
        return view('employee.edit',['data'=>$data]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'firstname' => 'required',
            'lastname' => 'required',
            'address' => 'required',
            'mobile' => 'required',
            'email' => 'required|email', 
            'position' => 'required',
            'joined' => 'required|date', 
        ]);

        $data = Employee::find($id);
        $data->firstname = $request->firstname;
        $data->lastname = $request->lastname;
        $data->address = $request->address;
        $data->mobile = $request->mobile;
        $data->email = $request->email;
        $data->position = $request->position;
        $data->joined = $request->joined;
        $data->save();

        return redirect('employee/'.$id.'/edit')->with('msg', 'Data has been updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Employee::where('id',$id)->delete();
        return redirect('employee')->with('msg', 'Data has been deleted');
    }
}

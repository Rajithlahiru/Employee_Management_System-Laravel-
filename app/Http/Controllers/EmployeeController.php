<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

Class EmployeeController extends Controller
{
    public function index()
    {   
    $data = DB::select('EXEC GetEmployees');
    return view('employee.index', ['data' => $data]);
    }


    public function create()
    {
        return view('employee.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'firstname' => 'required',
            'lastname' => 'required',
            'address' => 'required',
            'mobile' => 'required',
            'email' => 'required|email', 
            'position_id' => 'required',
            'joined_date' => 'required|date_format:Y-m-d', 
        ]);

        $formattedDate = date('Y-m-d', strtotime($request->joined_date));

        DB::statement('EXEC InsertEmployee ?, ?, ?, ?, ?, ?, ?', [
            $request->firstname,
            $request->lastname,
            $request->address,
            $request->mobile,
            $request->email,
            $request->position_id,
            $formattedDate,
        ]);

        return redirect('employee/create')->with('msg', 'Data has been submitted');
    }

    public function show(string $employee_id)
    {
        $data = DB::select('EXEC GetEmployeeById(?)', [$employee_id]);
        return view('employee.show', ['data' => $data[0]]);
    }

    public function edit(string $employee_id)
    {
        $data = DB::select('EXEC GetEmployeeById(?)', [$employee_id]);
        return view('employee.edit', ['data' => $data[0]]);
    }

    public function update(Request $request, string $employee_id)
    {
        $request->validate([
            'firstname' => 'required',
            'lastname' => 'required',
            'address' => 'required',
            'mobile' => 'required',
            'email' => 'required|email', 
            'position_id' => 'required',
            'joined_date' => 'required|date', 
        ]);

        DB::statement('EXEC UpdateEmployee(?, ?, ?, ?, ?, ?, ?, ?)', [
            $employee_id,
            $request->firstname,
            $request->lastname,
            $request->address,
            $request->mobile,
            $request->email,
            $request->position_id,
            $request->joined_date,
        ]);

        return redirect('employee/' . $employee_id . '/edit')->with('msg', 'Data has been updated');
    }

    public function destroy(string $employee_id)
    {
        DB::statement('EXEC DeleteEmployee(?)', [$employee_id]);
        return redirect('employee')->with('msg', 'Data has been deleted');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EmployeeController extends Controller
{
    public function index()
    {   
        $data = DB::select('CALL GetEmployees()');
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
            'position' => 'required',
            'joined' => 'required|date', 
        ]);

        DB::statement('CALL InsertEmployee(?, ?, ?, ?, ?, ?, ?)', [
            $request->firstname,
            $request->lastname,
            $request->address,
            $request->mobile,
            $request->email,
            $request->position,
            $request->joined,
        ]);

        return redirect('employee/create')->with('msg', 'Data has been submitted');
    }

    public function show(string $id)
    {
        $data = DB::select('CALL GetEmployeeById(?)', [$id]);
        return view('employee.show', ['data' => $data[0]]);
    }

    public function edit(string $id)
    {
        $data = DB::select('CALL GetEmployeeById(?)', [$id]);
        return view('employee.edit', ['data' => $data[0]]);
    }

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

        DB::statement('CALL UpdateEmployee(?, ?, ?, ?, ?, ?, ?, ?)', [
            $id,
            $request->firstname,
            $request->lastname,
            $request->address,
            $request->mobile,
            $request->email,
            $request->position,
            $request->joined,
        ]);

        return redirect('employee/' . $id . '/edit')->with('msg', 'Data has been updated');
    }

    public function destroy(string $id)
    {
        DB::statement('CALL DeleteEmployee(?)', [$id]);
        return redirect('employee')->with('msg', 'Data has been deleted');
    }
}

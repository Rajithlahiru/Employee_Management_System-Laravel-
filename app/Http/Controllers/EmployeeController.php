<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EmployeeController extends Controller
{
    public function index()
    {   
        $data = DB::select('SELECT * FROM employees ORDER BY id DESC');
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

        DB::insert('INSERT INTO employees (firstname, lastname, address, mobile, email, position, joined) VALUES (?, ?, ?, ?, ?, ?, ?)', [
            $request->firstname,
            $request->lastname,
            $request->address,
            $request->mobile,
            $request->email,
            $request->position,
            $request->joined,
        ]);

        DB::statement('INSERT INTO employee_logs (employee_id, action, created_at, updated_at) VALUES (LAST_INSERT_ID(), "create", NOW(), NOW())');

        return redirect('employee/create')->with('msg', 'Data has been submitted');
    }

    public function show(string $id)
    {
        $data = DB::select('SELECT * FROM employees WHERE id = ?', [$id]);
        return view('employee.show', ['data' => $data[0]]);
    }

    public function edit(string $id)
    {
        $data = DB::select('SELECT * FROM employees WHERE id = ?', [$id]);
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

        DB::update('UPDATE employees SET firstname = ?, lastname = ?, address = ?, mobile = ?, email = ?, position = ?, joined = ? WHERE id = ?', [
            $request->firstname,
            $request->lastname,
            $request->address,
            $request->mobile,
            $request->email,
            $request->position,
            $request->joined,
            $id,
        ]);

        return redirect('employee/' . $id . '/edit')->with('msg', 'Data has been updated');
    }

    public function destroy(string $id)
    {
        DB::delete('DELETE FROM employees WHERE id = ?', [$id]);
        return redirect('employee')->with('msg', 'Data has been deleted');
    }
}

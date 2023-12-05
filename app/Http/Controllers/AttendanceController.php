<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AttendanceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = DB::select('EXEC GetAttendance');
        return view('attendance.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('attendance.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'employee_id' => 'required',
            'attendance_date' => 'required|date',
            'working_hours' => 'required|numeric', // Adjust as needed
        ]);

        DB::statement('EXEC InsertAttendance ?, ?, ?', [
            $request->employee_id,
            $request->attendance_date,
            $request->working_hours,
        ]);

        return redirect('attendance/create')->with('msg', 'Data has been submitted');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return view('attendance.show');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view('attendance.edit');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Add code for updating attendance if needed
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Add code for deleting attendance if needed
    }
}

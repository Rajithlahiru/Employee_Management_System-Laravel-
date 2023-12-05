<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PositionController extends Controller
{
    public function index()
    {
        $data = DB::select('EXEC GetPositions');
        return view('position.index', ['data' => $data]);
    }

    public function create()
    {
        return view('position.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'position_name' => 'required',
            'basic_salary' => 'required',
            'overtime_salary_per_hour' => 'required',
        ]);

        DB::statement('EXEC InsertPosition ?, ?, ?', [
            $request->position_name,
            $request->basic_salary,
            $request->overtime_salary_per_hour,
        ]);

        return redirect('position/create')->with('msg', 'Data has been submitted');
    }

    public function show(string $id)
    {
        $data = DB::select('EXEC GetPositionById ?', [$id]);
        return view('position.show', ['data' => $data[0]]);
    }

    public function edit(string $id)
    {
        $data = DB::select('EXEC GetPositionById ?', [$id]);
        return view('position.edit', ['data' => $data[0]]);
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'position_name' => 'required',
            'basic_salary' => 'required',
            'overtime_salary_per_hour' => 'required',
        ]);

        DB::statement('EXEC UpdatePosition ?, ?, ?, ?', [
            $id,
            $request->position_name,
            $request->basic_salary,
            $request->overtime_salary_per_hour,
        ]);

        return redirect('position/' . $id . '/edit')->with('msg', 'Data has been updated');
    }

    public function destroy(string $id)
    {
        DB::statement('EXEC DeletePosition ?', [$id]);
        return redirect('position')->with('msg', 'Data has been deleted');
    }
}

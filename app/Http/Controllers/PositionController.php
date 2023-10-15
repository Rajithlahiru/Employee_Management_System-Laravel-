<?php

namespace App\Http\Controllers;

use App\Models\Position;
use Illuminate\Http\Request;

class PositionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data=Position::orderBy('id','desc')->get();
        return view('position.index',['data'=>$data]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('position.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'position_name' => 'required',
            'basic_salary' => 'required',
            'overtime_salary_per_hour' => 'required',
        ]);

        
        $data = new Position();
        $data->position_name = $request->position_name;
        $data->basic_salary = $request->basic_salary;
        $data->overtime_salary_per_hour = $request->overtime_salary_per_hour;
        
        $data->save();

        return redirect('position/create')->with('msg', 'Data has been submitted');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data=Position::find($id);
        return view('position.show',['data'=>$data]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data=Position::find($id);
        return view('position.edit',['data'=>$data]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'position_name' => 'required',
            'basic_salary' => 'required',
            'overtime_salary_per_hour' => 'required',
        ]);

        
        $data = Position::find($id);
        $data->position_name = $request->position_name;
        $data->basic_salary = $request->basic_salary;
        $data->overtime_salary_per_hour = $request->overtime_salary_per_hour;
        
        $data->save();

        return redirect('position/'.$id.'/edit')->with('msg', 'Data has been updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Position::where('id',$id)->delete();
        return redirect('position')->with('msg', 'Data has been deleted');
    }
}

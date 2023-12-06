<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    //dashboard
    public function index(){
        
        $employeeCountResult = DB::select("SELECT COUNT(*) AS employee_count FROM employees");
        $employeeCount = $employeeCountResult[0]->employee_count;

        $positionCountResult = DB::select("SELECT COUNT(*) AS position_count FROM positions");
        $positionCount = $positionCountResult[0]->position_count;

        // $positions = DB::select(DB::raw('SELECT PositionName, BasicSalary FROM positions'));
        
        return view('index',[
            'employeeCount' => $employeeCount,
            'positionCount' => $positionCount,
            // 'positions' => $positions,
        ]);
    }

    public function login(){
        return view('login');
    }

    public function submit_login(Request $request) {
        $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);
    
        // Hardcoded values for username and password
        $hardcodedUsername = 'admin';
        $hardcodedPassword = '12345';
    
        if ($request->username == $hardcodedUsername && $request->password == $hardcodedPassword) {
            session(['adminLogin' => true]);
            return redirect('admin');
        } else {
            return redirect('admin/login')->with('msg', 'Invalid username/password!!');
        }
    }
    

    public function logout(){
        session()->forget('adminLogin');
        return redirect('admin/login');
    }
    
}
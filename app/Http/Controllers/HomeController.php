<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\EmployeeLeaveHistory;
use DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        

       // echo Auth::user()->role->role;die();
        if (Auth::user()->role_id==2) 
        {         // 2: Developer Role

            $leaves = DB::table('employee_leave_histories')
                        ->select('*')
                        ->join('users', 'users.id', '=', 'employee_leave_histories.emp_id')
                        ->join('leave_type', 'employee_leave_histories.leave_type', '=', 'leave_type.ltype_id')
                        ->join('roles', 'users.role_id', '=', 'roles.id')
                        ->where('users.id', Auth::user()->id)
                        ->where('deleted_at',NULL)
                        ->orderBy ('employee_leave_histories.created_at','DESC')
                        ->paginate(10);
            return view('devhome',compact('leaves'));
        } else 
        {         
            //HR Role
            $leaves = DB::table('employee_leave_histories')
                        ->select('*')
                        ->join('users', 'users.id', '=', 'employee_leave_histories.emp_id')
                        ->join('leave_type', 'employee_leave_histories.leave_type', '=', 'leave_type.ltype_id')
                        ->join('roles', 'users.role_id', '=', 'roles.id')
                        ->where('users.hr_id', Auth::user()->id)
                        ->where('deleted_at',NULL)
                        ->orderBy ('employee_leave_histories.created_at','DESC')
                        ->paginate(5);
                      //  echo"<pre>"; 
           // print_r($leaves);die();
            return view('hrhome',compact('leaves'));
        }
    }
}

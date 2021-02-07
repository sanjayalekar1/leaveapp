<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\EmployeeLeaveHistory;
use Auth;
use DB;

class EmployeeLeaveHistoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
       $status = $request->status;
       $leave_id = $request->leave_id;

       $leave = new EmployeeLeaveHistory;
       $leave = $leave->find($leave_id);
       $leave->is_approved = $status;
       $leave->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $leave = new EmployeeLeaveHistory;
        $leave = $leave->where('leave_id',$request->leave_id);
        $leave->delete();
       // echo '<script>alert("Leave Cancelled!");</script>';

    }

    public function searchByEmployee(Request $request)
    {
        $filter = $request->filter;
        if (Auth::user()->role_id==2) 
        {         // 2: Developer Role

            $leaves = DB::table('employee_leave_histories')
                        ->select('*')
                        ->join('users', 'users.id', '=', 'employee_leave_histories.emp_id')
                        ->join('leave_type', 'employee_leave_histories.leave_type', '=', 'leave_type.ltype_id')
                        ->join('roles', 'users.role_id', '=', 'roles.id')
                        ->where('users.id', Auth::user()->id)
                        ->where('deleted_at',NULL)
                        ->where('users.name', 'like', '%'.$filter.'%')
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
                        ->where('users.name', 'like', '%'.$filter.'%')
                        ->orderBy ('employee_leave_histories.created_at','DESC')
                        ->paginate(5);
                       // echo"<pre>"; 
           // print_r($leaves);die();
            return view('hrhome',compact('leaves'));
        }
    }
}

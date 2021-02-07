@extends('layouts.app')

@section('content')
<div class="container">

    <div class="row justify-content-center">
        <div class="col-md-12">
         HR Dashboard
            <div class="card">
                <div class="card-header">{{ __('leave.leaveApplication') }}  </div>

                <div class="card-body">
                    @if (session('alert'))
                        <div class="alert alert-success">
                            {{ session('alert') }}
                        </div>
                    @endif
                    <form class="form-inline" method="GET" action="/filter-result">
                    <div class="form-group ">
                        <label for="filter" class="col-sm-2 col-form-label">Filter </label>
                        &nbsp<input type="text" class="form-control" id="filter" name="filter" placeholder="Employee Name" value="">
                    </div>
                    <button type="submit" class="btn btn-success ">Filter</button>
                    </form>
                    <div class="table-responsive">
                                    <table id="example" class="table table-striped table-bordered second" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>@sortablelink('users.name',__('leave.empName'))</th>
                                                <th>@sortablelink('role.role',__('leave.position'))</th>
                                                <th>@sortablelink('EmployeeLeaveHistory.leave_start_date',__('leave.lStartDate'))</th>
                                                <th>@sortablelink('EmployeeLeaveHistory.leave_end_date',__('leave.lEndDate'))</th>
                                                <th>@sortablelink('EmployeeLeaveHistory.no_of_days', __('leave.noOfDays'))</th>
                                                <th>@sortablelink('leave_type.leave_type', __('leave.leaveType'))</th>
                                                <th>@sortablelink('EmployeeLeaveHistory.reason', __('leave.reason'))</th>
                                                <th>@sortablelink('status')</th>
                                                <th>@sortablelink('Action')</th>
                                               
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($leaves as $leave)
                                            <tr>
                                                <td>{{$leave->name}}</td>
                                                <td>{{$leave->role}}</td>
                                                <td>{{date("d-m-Y",strtotime($leave->leave_start_date))}}</td>
                                                <td>{{date("d-m-Y",strtotime($leave->leave_end_date))}}</td>
                                                <td>{{$leave->no_of_days}}</td>
                                                <td>{{$leave->leave_type}}</td>
                                                <td>{{$leave->reason}}</td>
                                                <td>
                                                @if($leave->is_approved==0)
                                                <label class="label label-warning">Pending</label>
                                                @endif
                                                @if($leave->is_approved==1)
                                                <label class="label label-success">Approved</label>
                                                @endif
                                                @if($leave->is_approved==3)
                                                <label class="label label-danger">Rejected</label>
                                                @endif
                                               </td>
                                                <td>
                                                    <select onchange="statusChange(this.value,{{$leave->leave_id}})">
                                                        <option value="0" @if($leave->is_approved==0)<?php echo "selected";?> @endif >Pending</option>
                                                        <option value="1" @if($leave->is_approved==1)<?php echo "selected";?> @endif>Approve</option>
                                                        <option value="3" @if($leave->is_approved==3)<?php echo "selected";?> @endif>Reject</option>                                                     
                                                    </select>
                                               </td>
                                               
                                               
                                                
                                                </td>
                                            </tr>
                                            @endforeach
                                            
                                       
                                        </tbody>
                                        
                                    </table>
                                   

                                </div>
                                <div style="text-align:right">
                                    {{ $leaves->links() }}
                                    </div >
                </div>
            </div>
           
        </div>
    </div>
   
 
</div>
@endsection

<script>

function statusChange(action,leave_id){

    //alert(action);
    //alert(leave_id);die();
    if(action==1){
        if(confirm("Do you wish to change the status to Approve? Please confirm.")){
            $.ajax({
                 url: '{{ url('update-leave') }}',
                 method: "get",
                 data: {_token: '{{ csrf_token() }}', status:action,leave_id:leave_id },
                 success: function (response) {
                 alert("Leave Approved!");
                 window.location.reload();
                 }
             });
        }
             
           
     }else if(action == 3){  //approve   
         if(confirm("Do you wish to change the status to Rejected? Please confirm.")){
             
            $.ajax({
                url: '{{ url('update-leave') }}',
                method: "get",
                data: {_token: '{{ csrf_token() }}', status:action,leave_id:leave_id},
                success: function (response) {
                alert("Leave  Rejected!");
                window.location.reload();
                }
            });

         }
     }
    
}
</script>
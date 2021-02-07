@extends('layouts.app')

@section('content')
<div class="container">

    <div class="row justify-content-center">
        <div class="col-md-12">
        Developer Dashboard
            <div class="card">
                <div class="card-header">{{ __('leave.leaveApplication') }}  </div>

                <div class="card-body">
                    @if (session('alert'))
                        <div class="alert alert-success">
                            {{ session('alert') }}
                        </div>
                    @endif

                    <div class="table-responsive">
                                    <table id="example" class="table table-striped table-bordered second" style="width:100%">
                                        <thead>
                                            <tr>
                                            <th>{{ __('Leave ID') }}</th>
                                                <th>{{ __('leave.lStartDate') }}</th>
                                                <th>{{ __('leave.lEndDate') }}</th>
                                                <th>{{ __('leave.noOfDays') }}</th>
                                                <th>{{ __('leave.leaveType') }}</th>
                                                <th>{{ __('leave.reason') }}</th>
                                                <th>{{ __('leave.status') }}</th>
                                                <th>{{ __('leave.Action') }}</th>
                                               
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($leaves as $leave)
                                            <tr>
                                                <td>{{$leave->leave_id}}</td>
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
                                               @if($leave->is_approved==0)
                                               <a href="javascript:cancelLeave({{$leave->leave_id}})"><i class="fa fa-trash"></i></a>
                                               @endif
                                               
                                               
                                                
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

function cancelLeave(leave_id){

    //alert(leave_id);die();
    //alert(leave_id);die();
    
        if(confirm("Do you wish to change the Cancel Leave? Please confirm.")){
            $.ajax({
                 url: '{{ url('cancel-leave') }}',
                 method: "get",
                 data: {_token: '{{ csrf_token() }}',leave_id:leave_id },
                 success: function (response) {
                 alert("Leave Cancelled!");
                 window.location.reload();
                 }
             });
        }
   
         
    
}
</script>
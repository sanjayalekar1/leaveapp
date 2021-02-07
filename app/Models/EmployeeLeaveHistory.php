<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Kyslik\ColumnSortable\Sortable;

class EmployeeLeaveHistory extends Model
{
    use HasFactory,Notifiable,Sortable;
    use SoftDeletes;

    public $sortable = ['leave_id',
    'leave_start_date',
    'leave_end_date',
    'no_of_days',
    'leave_type'
   ];
       
    

    protected $primaryKey = 'leave_id';

    protected $fillable = ['emp_id', 'leave_start_date','leave_end_date','no_of_days','leave_type','reason','is_approved'];



}

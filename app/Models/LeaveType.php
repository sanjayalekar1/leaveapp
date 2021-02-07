<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class LeaveType extends Model
{
    use HasFactory,Sortable;

    public $sortable = ['leave_type'
   
   ];

    protected $table="leave_type";
    protected $primaryKey = 'ltype_id';




}

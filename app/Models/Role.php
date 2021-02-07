<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class Role extends Model
{
    use HasFactory,Sortable;

    public $sortable = ['role'
    ];

    public function user(){
        return $this->hasOne('App\Models\User', 'role_id');
     }

   

}

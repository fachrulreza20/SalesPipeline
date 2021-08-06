<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Employee extends Model
{
    use HasFactory;
    use SoftDeletes;

    

    protected $table = 'employees';
    protected $guarded = [];


    
    public function getOutlet(){
        return $this->belongsTo(Outlet::class,'outletCode','outlet_code');
    }

    public function getJabatan(){
        return $this->belongsTo(Jabatan::class,'jabatan','id');
    }

}

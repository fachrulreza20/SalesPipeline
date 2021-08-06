<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

use App\Models\Progress;
use App\Models\Employee;
use App\Models\Outlet;
use App\Models\Jabatan;
use App\Models\Segment;

class Pipeline extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'pipelines';
    protected $guarded = [];


    public function getProgress(){
        return $this->belongsTo(Progress::class,'pipeline_progress','id')->withDefault([
        'progress_ket' => 'Guest',
        ]);
    }

    public function getEmployee(){
        return $this->belongsTo(Employee::class,'pipeline_nip','nip')->withDefault([
        'nip' => 'Guest',
        ]);;
    }

    public function getOutlet(){
        return $this->belongsTo(Outlet::class,'pipeline_outletCode','outlet_code')->withDefault([
        'outlet_code' => 'Guest',
        ]);;
    }

    public function getJabatan(){
        return $this->belongsTo(Jabatan::class,'pipeline_jabatan','id')->withDefault([
        'jabatan_ket' => 'Guest',
        ]);;
    }

    public function getSegment(){
        return $this->belongsTo(Segment::class,'pipeline_segmen','id')->withDefault([
        'segmen_ket' => 'Guest',
        ]);;
    }


}

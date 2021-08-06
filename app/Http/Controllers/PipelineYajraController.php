<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Pipeline;
use App\Models\Outlet;
use App\Models\Jabatan;
use App\Models\Progress;
use App\Models\Segment;
use App\Models\Employee;

use DataTables;


class PipelineYajraController extends Controller
{
    public function index(Request $request){

        if($request->ajax()){

            //$data = Pipeline::all();

            //return datatables()->of($data)->addIndexColumn()->make(true);

            $data = Pipeline::with('getProgress','getEmployee','getOutlet','getJabatan','getSegment');

            return DataTables::eloquent($data)
            ->addColumn('getProgress', function (Pipeline $pipeline) {
                return $pipeline->getProgress->progress_ket;
            })
            ->addColumn('getProgress', function (Pipeline $pipeline) {
                return $pipeline->getEmployee->nama;
            })
            ->addColumn('getProgress', function (Pipeline $pipeline) {
                return $pipeline->getOutlet->outlet_name;
            })
            ->addColumn('getProgress', function (Pipeline $pipeline) {
                return $pipeline->getJabatan->jabatan_ket;
            })
            ->addColumn('getProgress', function (Pipeline $pipeline) {
                return $pipeline->getSegment->segmen_ket;
            })
            
            ->toJson();


                //dd($data);

        }


        return view('pipelineyajra.index');

    }
}

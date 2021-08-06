<?php

namespace App\Http\Controllers;

use App\Models\Pipeline;
use App\Models\Outlet;
use App\Models\Jabatan;
use App\Models\Progress;
use App\Models\Segment;
use App\Models\Employee;
use Illuminate\Http\Request;

use App\Exports\PipelineExport;
use Maatwebsite\Excel\Facades\Excel;
use DB;
use Auth;

class PipelineController extends Controller
{

    public function index()
    {

        $employeeCollection = Employee::where('email', '=', Auth::user()->email)->firstOrFail();
        
        if($employeeCollection->outletCode === "NotUpdated"){
            return redirect('/profileEmployee');
        }
        else{
            $nip = $employeeCollection->nip;
        }
        
        $user_role = Auth::user()->role;
        
        if($user_role === "admin"){
            $data = Pipeline::paginate(6);
        }else{            
            $data = Pipeline::where('pipeline_nip', '=', $nip)->paginate(6);
        }

        // $data = Pipeline::get()->all(); // hasil berupa collection, bukan array
        //dd($data);
        return view('pipeline.index', compact('data'));
    }

    public function pipelineExport(){
        return Excel::download(new PipelineExport, 'pipeline.xlsx');        
    }


    public function create()
    {   

        // parsing week number of month
        $now = date('Y-m-d');
        $weekNumber = weekOfMonth(strtotime($now)) . " "; // weekOfMonth() function in app\Helpers\helpers.php
         

        $segmentCollection = Segment::all()->sortBy("id");
        $progressCollection = Progress::all()->sortBy("id");
        $outletCollection = Outlet::all()->sortBy("outlet_name")->sortBy("outlet_area");
        $jabatanCollection = Jabatan::all()->sortBy("jabatan_ket");
        $employeeCollection = Employee::where('email', '=', Auth::user()->email)->firstOrFail();
        return view('pipeline.create', compact('weekNumber','outletCollection','jabatanCollection','progressCollection','segmentCollection','employeeCollection'));
    }


    public function store(Request $request)
    {
        
        if(Pipeline::create($request->all())){
            return redirect('/pipeline')->with('success','Data Pipeline Berhasil ditambahkan');
        }

    }

    public function show($id)
    {

        $pipelineShow = Pipeline::find($id);

        $now = date('Y-m-d');
        $weekNumber = weekOfMonth(strtotime($now)) . " "; // weekOfMonth() function in app\Helpers\helpers.php
         

        $segmentCollection = Segment::all()->sortBy("id");
        $progressCollection = Progress::all()->sortBy("id");
        $outletCollection = Outlet::all()->sortBy("outlet_name")->sortBy("outlet_area");
        $jabatanCollection = Jabatan::all()->sortBy("jabatan_ket");
        $employeeCollection = Employee::where('email', '=', Auth::user()->email)->firstOrFail();
        return view('pipeline.show', compact('pipelineShow','weekNumber','outletCollection','jabatanCollection','progressCollection','segmentCollection','employeeCollection'));
    }



    public function update(Request $request, $id)
    {
        $data = Pipeline::find($id);
        $data->update($request->all());
        return redirect('/pipeline')->with('success','Data berhasil di update');
   }

    public function destroy($id)
    {
        $data = Pipeline::find($id);
        $data->delete();
        
        // $data->pipeline_status = 'deleted';
        // $data->save();
        return redirect('/pipeline')->with('success','Data Berhasil dihapus');
    }


}

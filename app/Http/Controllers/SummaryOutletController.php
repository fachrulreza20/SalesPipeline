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

class SummaryOutletController extends Controller
{


    public function outletpage(){

    /*
    |--------------------------------------------------------------------------
    | Home Page untuk Summary outlet Berdasarkan Segmen/Product 
    |--------------------------------------------------------------------------
    */        

        $segmens = Segment::orderBy('segmen_ket', 'asc')->get();;
        $total_segmens = count($segmens)-1;
        $sumCase = "";
        $query = "
            select 
            coalesce(outlet_code,'subtotal') as outlet_code,
            coalesce(outlet_name,'subtotal') as outlet_name,

            count(pipeline_nama_nasabah) as NOA,";

        $segmens = Segment::all()->map(function($segmens) {
           $segmens->modified_segmen_ket = ""; // add (push) new columns to Segmens collection
           return $segmens;
        });            

        foreach ($segmens as $segmen) {
            $segmen_id = $segmen->id;
            $segmen_ket = $segmen->segmen_ket;
            $segmen_ket = str_replace(' ','_',$segmen_ket);
            $segmen_ket = str_replace('-','_',$segmen_ket);
            $segmen_divisi = $segmen->divisi;
            $segmen->modified_segmen_ket = $segmen_ket;  // put value in new Segmens collection

            $sumCase .= " sum(case when pipeline_segmen = '".$segmen_id."' then pipeline_nominal else 0 end) as OS_".$segmen_ket.", ";
        }

        $sumCase = rtrim($sumCase, ", ");  // remove last comma from query string
     
        $query = $query.$sumCase."
            from pipelines inner join outlets on outlets.outlet_code = pipelines.pipeline_outletCode
            WHERE pipelines.deleted_at IS NULL
            group by outlet_code, outlet_name
            ;
        ";

        $outletpages_segmen_ket = DB::select($query);

//      dd($query);
//      dd($outletpages);
//      $columns = array_map(function($col){ return $col->Field; }, DB::select('SHOW FULL COLUMNS FROM segmens')); // get column name
//      dd($columns);
//      dd($segmens);







    /*
    |--------------------------------------------------------------------------
    | Home Page untuk Summary outlet Berdasarkan Divisi 
    |--------------------------------------------------------------------------
    */        

        $sumCase = "";
        $query = "
            select outlet_code, outlet_name, 
            count(pipeline_nama_nasabah) as NOA,";

        foreach ($segmens as $segmen) {
            $segmen_id = $segmen->id;
            $segmen_divisi = $segmen->divisi;
            $sumCase .= " sum(case when segmens.divisi = '".$segmen_divisi."' then pipeline_nominal else 0 end) as OS_".$segmen_divisi.", ";

        }

        $sumCase = rtrim($sumCase, ", ");  // remove last comma from query string

        $query = $query.$sumCase."
            from pipelines
            inner join outlets on outlets.outlet_code = pipelines.pipeline_outletCode
            inner join segmens on segmens.id = pipelines.pipeline_segmen
            WHERE pipelines.deleted_at IS NULL
            group by outlet_code, outlet_name
            ;
        ";

        $outletpages_divisi = DB::select($query);
        $segmens_divisi_only = DB::select("select divisi from segmens group by divisi");




    /*
    |--------------------------------------------------------------------------
    | Home Page untuk Summary outlet Berdasarkan Bulan Proyeksi Cair 
    |--------------------------------------------------------------------------
    */        

        $sumCase = "";
        $query = "
            select outlet_code, outlet_name, 
            count(pipeline_nama_nasabah) as NOA,";


        $month_collection = DB::select("select pipeline_proyeksiCairMonth as ProyBulanCair from pipelines group by pipeline_proyeksiCairMonth");    

        foreach ($month_collection as $month) {
            $bulanCair = $month->ProyBulanCair;
            $sumCase .= " sum(case when pipelines.pipeline_proyeksiCairMonth = '".$bulanCair."' then pipeline_nominal else 0 end) as OS_".$bulanCair.", ";

        }

        $sumCase = rtrim($sumCase, ", ");  // remove last comma from query string

        $query = $query.$sumCase."
            from pipelines
            inner join outlets on outlets.outlet_code = pipelines.pipeline_outletCode
            WHERE pipelines.deleted_at IS NULL
            group by outlet_code, outlet_name
            ;
        ";

        $outletpages_bulan_cair = DB::select($query);
        








    /*
    |--------------------------------------------------------------------------
    | Home Page untuk Summary outlet Berdasarkan Weekly Proyeksi Cair 
    |--------------------------------------------------------------------------
    */        

        $sumCase = "";
        $query = "
            select outlet_code, outlet_name, 
            count(pipeline_nama_nasabah) as NOA,";


        $week_collection = DB::select("select pipeline_proyeksiCairMonth as ProyBulanCair, pipeline_proyeksiCairWeek as ProyWeekCair from pipelines group by pipeline_proyeksiCairWeek, pipeline_proyeksiCairMonth order by pipelines.pipeline_proyeksiCairMonth, pipelines.pipeline_proyeksiCairWeek ");    

        foreach ($week_collection as $week) {
            $weekCair = $week->ProyWeekCair;
            $bulanCair = $week->ProyBulanCair;            
            $sumCase .= " sum(case when (pipelines.pipeline_proyeksiCairWeek = '".$weekCair."' and pipelines.pipeline_proyeksiCairMonth = '".$bulanCair."') then pipeline_nominal else 0 end) as OS_".$bulanCair.$weekCair.", ";

        }

        $sumCase = rtrim($sumCase, ", ");  // remove last comma from query string

        $query = $query.$sumCase."
            from pipelines
            inner join outlets on outlets.outlet_code = pipelines.pipeline_outletCode
            WHERE pipelines.deleted_at IS NULL
            group by outlet_code, outlet_name
            ;
        ";


        $outletpages_week_cair = DB::select($query);
        




        return view('v_summaryoutlet.index', compact('outletpages_segmen_ket', 'segmens', 'outletpages_divisi', 'segmens_divisi_only', 'month_collection', 'outletpages_bulan_cair', 'week_collection', 'outletpages_week_cair',));
    }






}

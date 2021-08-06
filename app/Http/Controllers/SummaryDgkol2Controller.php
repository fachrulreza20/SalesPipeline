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

class SummaryDgkol2Controller extends Controller
{
    public function index(){

    /*
    |--------------------------------------------------------------------------
    | Page untuk Summary Area Berdasarkan Segmen/Product 
    |--------------------------------------------------------------------------
    */        


        $query = "
            select 
             coalesce(outlet_area,'GRAND TOTAL') as area,
             sum(os) as real_DGKOL2_os_area,
             count(noloan) as real_DGKOL2_noa_area,
             sum(case when proyeksi = '0' then os else 0 end) as proy_PF_os_area,
             sum(case when proyeksi = '0' then 1 else 0 end) as proy_PF_noa_area,

             sum(case when proyeksi = '1' then os else 0 end) as proy_DGKOL2_os_area,
             sum(case when proyeksi = '1' then 1 else 0 end) as proy_DGKOL2_noa_area

             from tb_nasabahkol2
            inner join outlets on outlets.outlet_code = tb_nasabahkol2.kodeoutlet
            WHERE divisi <> 'CMG'
            group by area with ROLLUP
        ";

        $summaryDgKol2Area = DB::select($query);






        $query = "
select 
             outlet_area,
             coalesce(namaoutlet,'Total Area') as namaoutlet,
             sum(os) as real_DGKOL2_os_outlet,
             count(noloan) as real_DGKOL2_noa_outlet,
             sum(case when proyeksi = '0' then os else 0 end) as proy_PF_os_outlet,
             sum(case when proyeksi = '0' then 1 else 0 end) as proy_PF_noa_outlet,

             sum(case when proyeksi = '1' then os else 0 end) as proy_DGKOL2_os_outlet,
             sum(case when proyeksi = '1' then 1 else 0 end) as proy_DGKOL2_noa_outlet,

             sum(selesai) as selesai

             from tb_nasabahkol2
            inner join outlets on outlets.outlet_code = tb_nasabahkol2.kodeoutlet
            WHERE divisi <> 'CMG'
            
            group by outlet_area,namaoutlet with ROLLUP
        ";

        $summaryDgKol2Outlet = DB::select($query);





        $query = "
            select 
             coalesce(divisi,'GRAND TOTAL') as divisi,
             sum(os) as real_DGKOL2_os_divisi,
             count(noloan) as real_DGKOL2_noa_divisi,
             sum(case when proyeksi = '0' then os else 0 end) as proy_PF_os_divisi,
             sum(case when proyeksi = '0' then 1 else 0 end) as proy_PF_noa_divisi,

             sum(case when proyeksi = '1' then os else 0 end) as proy_DGKOL2_os_divisi,
             sum(case when proyeksi = '1' then 1 else 0 end) as proy_DGKOL2_noa_divisi

             from tb_nasabahkol2
            inner join outlets on outlets.outlet_code = tb_nasabahkol2.kodeoutlet
            group by divisi with ROLLUP
        ";

        $summaryDgKol2Divisi = DB::select($query);



        return view('v_nasabahkol2.index', compact('summaryDgKol2Area', 'summaryDgKol2Outlet', 'summaryDgKol2Divisi'));
    }






}

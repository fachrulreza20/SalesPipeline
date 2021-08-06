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

class SummaryDgnpfController extends Controller
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
             sum(os) as real_DGNPF_os_area,
             count(noloan) as real_DGNPF_noa_area,
             sum(case when proyeksi = '0' then os else 0 end) as proy_PF_os_area,
             sum(case when proyeksi = '0' then 1 else 0 end) as proy_PF_noa_area,

             sum(case when proyeksi = '1' then os else 0 end) as proy_DGNPF_os_area,
             sum(case when proyeksi = '1' then 1 else 0 end) as proy_DGNPF_noa_area

             from tb_nasabahnpf
            inner join outlets on outlets.outlet_code = tb_nasabahnpf.kodeoutlet
            WHERE divisi <> 'CMG'
            group by area with ROLLUP
        ";

        $summaryDgNpfArea = DB::select($query);






        $query = "
select 
             outlet_area,
             coalesce(namaoutlet,'Total Area') as namaoutlet,
             sum(os) as real_DGNPF_os_outlet,
             count(noloan) as real_DGNPF_noa_outlet,
             sum(case when proyeksi = '0' then os else 0 end) as proy_PF_os_outlet,
             sum(case when proyeksi = '0' then 1 else 0 end) as proy_PF_noa_outlet,

             sum(case when proyeksi = '1' then os else 0 end) as proy_DGNPF_os_outlet,
             sum(case when proyeksi = '1' then 1 else 0 end) as proy_DGNPF_noa_outlet,

             sum(selesai) as selesai

             from tb_nasabahnpf
            inner join outlets on outlets.outlet_code = tb_nasabahnpf.kodeoutlet
            WHERE divisi <> 'CMG'
            
            group by outlet_area,namaoutlet with ROLLUP
        ";

        $summaryDgNpfOutlet = DB::select($query);





        $query = "
            select 
             coalesce(divisi,'GRAND TOTAL') as divisi,
             sum(os) as real_DGNPF_os_divisi,
             count(noloan) as real_DGNPF_noa_divisi,
             sum(case when proyeksi = '0' then os else 0 end) as proy_PF_os_divisi,
             sum(case when proyeksi = '0' then 1 else 0 end) as proy_PF_noa_divisi,

             sum(case when proyeksi = '1' then os else 0 end) as proy_DGNPF_os_divisi,
             sum(case when proyeksi = '1' then 1 else 0 end) as proy_DGNPF_noa_divisi

             from tb_nasabahnpf
            inner join outlets on outlets.outlet_code = tb_nasabahnpf.kodeoutlet
            group by divisi with ROLLUP
        ";

        $summaryDgNpfDivisi = DB::select($query);



        return view('v_nasabahnpf.index', compact('summaryDgNpfArea', 'summaryDgNpfOutlet', 'summaryDgNpfDivisi'));
    }






}

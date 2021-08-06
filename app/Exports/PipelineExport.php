<?php

namespace App\Exports;

use App\Models\Pipeline;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use DB;

class PipelineExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        // return Pipeline::all();

        // $query = "
        // select pipeline_nama_nasabah, pipeline_nominal, segmens.divisi, segmens.segmen_ket, employees.nip, employees.nama, jabatans.jabatan_ket ,progresses.progress_ket, outlets.outlet_code, outlets.outlet_name, outlets.outlet_area, pipelines.pipeline_proyeksiCairWeek, pipelines.pipeline_proyeksiCairMonth, pipelines.pipeline_jenis, pipelines.deleted_at from pipelines inner join segmens on segmens.id = pipelines.pipeline_segmen inner join outlets on outlets.outlet_code = pipelines.pipeline_outletCode inner join jabatans on jabatans.id = pipelines.pipeline_jabatan inner join progresses on progresses.id = pipelines.pipeline_progress inner join employees on employees.nip = pipelines.pipeline_nip;
        // ";

        // dd($query);
        // return DB::select($query);


        return DB::table("pipelines")
                    ->leftJoin("segmens", function($join){
                        $join->on("segmens.id", "=", "pipelines.pipeline_segmen");
                    })
                    ->leftJoin("outlets", function($join){
                        $join->on("outlets.outlet_code", "=", "pipelines.pipeline_outletcode");
                    })
                    ->leftJoin("jabatans", function($join){
                        $join->on("jabatans.id", "=", "pipelines.pipeline_jabatan");
                    })
                    ->leftJoin("progresses", function($join){
                        $join->on("progresses.id", "=", "pipelines.pipeline_progress");
                    })
                    ->leftJoin("employees", function($join){
                        $join->on("employees.nip", "=", "pipelines.pipeline_nip");
                    })
                    ->select("pipeline_nama_nasabah", "pipeline_nominal", "segmens.divisi", "segmens.segmen_ket", "employees.nip", "employees.nama", "jabatans.jabatan_ket", "progresses.progress_ket", "outlets.outlet_code", "outlets.outlet_name", "outlets.outlet_area", "pipelines.pipeline_proyeksicairweek", "pipelines.pipeline_proyeksicairmonth", "pipelines.pipeline_jenis", "pipelines.deleted_at")
                    ->get();
}   

    public function headings(): array
    {
        return ["pipeline_nama_nasabah","pipeline_nominal","divisi","segmen_ket","nip","nama","jabatan_ket","progress_ket","outlet_code","outlet_name","outlet_area","pipeline_proyeksiCairWeek","pipeline_proyeksiCairMonth","pipeline_jenis","deleted_at"];
    }


}

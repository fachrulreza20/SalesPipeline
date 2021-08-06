<?php

namespace App\Http\Controllers;

use App\Models\Nasabahkol2;
use App\Models\Employee;
use Illuminate\Http\Request;
use Batch;
use Auth;

class Nasabahkol2Controller extends Controller
{
 
    public function index()
    {
        $employeeData = Employee::where('email','=', Auth::user()->email)->firstOrFail();
        $userlogged_outletcode = $employeeData->outletCode;

        //$data = Nasabahkol2::all();

        if(Auth::user()->role==="admin"){
            $data = Nasabahkol2::where('kodeoutlet', '<>', '')->orderByRaw('CONVERT(os, SIGNED) desc')->get(); // kalau admin ambil semua data dg
        }else{
            $data = Nasabahkol2::where('kodeoutlet', '=', $userlogged_outletcode)->orderByRaw('CONVERT(os, SIGNED) desc')->get();
        }

        return view('nasabahkol2.index', compact('data'));       
    }


    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }


    public function show(Nasabahkol2 $nasabahkol2)
    {
        //
    }

    public function edit(Nasabahkol2 $nasabahkol2)
    {
        //
    }


    public function update(Request $request, $id)
    {

        $value = array();
        $services = $request['proy'];
        foreach($services as $key => $val){

            $value[] = array('id' => $key, 'proyeksi' => $val, 'selesai' => 1);
        }
         
        $userInstance = new Nasabahkol2;
        $index = 'id';
        Batch::update($userInstance, $value, $index); // reference: https://github.com/mavinoo/laravelBatch

        return redirect('/nasabahkol2')->with('success','Data Berhasil di Update');


         
     }


    public function destroy(Nasabahkol2 $nasabahkol2)
    {
        //
    }
}

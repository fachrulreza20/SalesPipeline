<?php

namespace App\Http\Controllers;

use App\Models\Nasabahnpf;
use App\Models\Employee;
use Illuminate\Http\Request;
use Batch;
use Auth;

class NasabahnpfController extends Controller
{
 
    public function index()
    {


        $employeeData = Employee::where('email','=', Auth::user()->email)->firstOrFail();
        $userlogged_outletcode = $employeeData->outletCode;

        //$data = Nasabahnpf::all();

        if(Auth::user()->role==="admin"){
            $data = Nasabahnpf::where('kodeoutlet', '<>', '')->orderByRaw('CONVERT(os, SIGNED) desc')->get();// kalau admin ambil semua data dg
        }else{
            $data = Nasabahnpf::where('kodeoutlet', '=', $userlogged_outletcode)->orderByRaw('CONVERT(os, SIGNED) desc')->get();
        }

        return view('nasabahnpf.index', compact('data'));       
    }


    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }


    public function show(Nasabahnpf $nasabahnpf)
    {
        //
    }

    public function edit(Nasabahnpf $nasabahnpf)
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
         
        $userInstance = new Nasabahnpf;
        $index = 'id';
        Batch::update($userInstance, $value, $index); // reference: https://github.com/mavinoo/laravelBatch

        return redirect('/nasabahnpf')->with('success','Data Berhasil di Update');


         
     }


    public function destroy(Nasabahnpf $nasabahnpf)
    {
        //
    }
}

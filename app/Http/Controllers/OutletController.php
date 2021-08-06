<?php

namespace App\Http\Controllers;

use App\Models\Outlet;
use Illuminate\Http\Request;
use Auth;
use DB;

class OutletController extends Controller
{

    public function __construct() 
    {
      $this->middleware('admin');
    }


    public function index()
    {

            $data = Outlet::all();
            return view('outlet.index', compact('data'));
    }

    public function create()
    {

        $query = "select outlet_area from outlets group by outlet_area";
        $areas = DB::select($query);

        return view('outlet.create', compact('areas'));
    }


    public function store(Request $request)
    {
        
        if(Outlet::create($request->all())){
            return redirect('/outlet')->with('success','Data Outlet Berhasil ditambahkan');
        }

    }

    public function show($id)
    {
        $query = "select outlet_area from outlets group by outlet_area";
        $areas = DB::select($query);
        
        $data = Outlet::find($id);
        return view('outlet.show',compact('data', 'areas')); 
    }



    public function update(Request $request, $id)
    {
        
        $data = Outlet::find($id);
        $data->update($request->all());
        return redirect('/outlet')->with('success','Data berhasil di update');
   }

    public function destroy($id)
    {
        $data = Outlet::find($id);
        $data->delete();
        return redirect('/outlet')->with('success','Data Berhasil dihapus');
    }
}
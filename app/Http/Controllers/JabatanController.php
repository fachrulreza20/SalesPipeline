<?php

namespace App\Http\Controllers;

use App\Models\Jabatan;
use Illuminate\Http\Request;
use Auth;
class JabatanController extends Controller
{
 

    public function __construct() 
    {
      $this->middleware('admin');
    }

    public function index()
    {

            $data = Jabatan::all();
            return view('jabatan.index', compact('data'));



    }

    public function create()
    {
        return view('jabatan.create');
    }


    public function store(Request $request)
    {
        
        if(Jabatan::create($request->all())){
            return redirect('/jabatan')->with('success','Data Jabatan Berhasil ditambahkan');
        }

    }

    public function show($id)
    {
        
        $data = Jabatan::find($id);
        return view('jabatan.show',compact('data')); 
    }



    public function update(Request $request, $id)
    {
        
        $data = Jabatan::find($id);
        $data->update($request->all());
        return redirect('/jabatan')->with('success','Data berhasil di update');
   }

    public function destroy($id)
    {
        $data = Jabatan::find($id);
        $data->delete();
        return redirect('/jabatan')->with('success','Data Berhasil dihapus');
    }
}

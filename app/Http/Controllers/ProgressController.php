<?php

namespace App\Http\Controllers;

use App\Models\Progress;
use Illuminate\Http\Request;
use Auth;
class ProgressController extends Controller
{

    public function __construct() 
    {
      $this->middleware('admin');
    }


    public function index()
    {

            $data = Progress::all();
            return view('progress.index', compact('data'));
    }

    public function create()
    {
        return view('progress.create');
    }


    public function store(Request $request)
    {
        
        if(Progress::create($request->all())){
            return redirect('/progress')->with('success','Data Progress Berhasil ditambahkan');
        }

    }

    public function show($id)
    {
        
        $data = Progress::find($id);
        return view('progress.show',compact('data')); 
    }





    public function update(Request $request, $id)
    {
        
        $data = Progress::find($id);
        $data->update($request->all());
        return redirect('/progress')->with('success','Data berhasil di update');
   }

    public function destroy($id)
    {
        $data = Progress::find($id);
        $data->delete();
        return redirect('/progress')->with('success','Data Berhasil dihapus');
    }
}

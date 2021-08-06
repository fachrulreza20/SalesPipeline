<?php

namespace App\Http\Controllers;

use App\Models\Segment;
use Illuminate\Http\Request;
use Auth;
class SegmentController extends Controller
{

    public function __construct() 
    {
      $this->middleware('admin');
    }


    public function index()
    {

            $data = Segment::all();
            return view('segmen.index', compact('data'));
    }

    public function create()
    {
        return view('segmen.create');
    }


    public function store(Request $request)
    {
        
        if(Segment::create($request->all())){
            return redirect('/segmen')->with('success','Data Segment Berhasil ditambahkan');
        }

    }

    public function show($id)
    {
        
        $data = Segment::find($id);
        return view('segmen.show',compact('data')); 
    }



    public function update(Request $request, $id)
    {
        
        $data = Segment::find($id);
        $data->update($request->all());
        return redirect('/segmen')->with('success','Data berhasil di update');
   }

    public function destroy($id)
    {
        $data = Segment::find($id);
        $data->delete();
        return redirect('/segmen')->with('success','Data Berhasil dihapus');
    }
}

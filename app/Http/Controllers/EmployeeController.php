<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Outlet;
use App\Models\Jabatan;
use Illuminate\Http\Request;
use Auth;

class EmployeeController extends Controller
{

    public function __construct() 
    {
      $this->middleware('admin');
    }


    public function index()
    {
            $data = Employee::paginate(2);
            return view('employee.index', compact('data'));
    }

    public function create()
    {   
        $outletCollection = Outlet::all()->sortBy("outlet_name")->sortBy("outlet_area");
        $jabatanCollection = Jabatan::all()->sortBy("jabatan_ket");
        return view('employee.create', compact('outletCollection','jabatanCollection'));
    }


    public function store(Request $request)
    {
        
        if(Employee::create($request->all())){
            return redirect('/employee')->with('success','Data Employee Berhasil ditambahkan');
        }

    }

    public function show($id)
    {
        $outletCollection = Outlet::all()->sortBy("outlet_name")->sortBy("outlet_area");
        $jabatanCollection = Jabatan::all()->sortBy("jabatan_ket");
        
        $data = Employee::find($id);
        return view('employee.show',compact('data', 'outletCollection','jabatanCollection')); 
    }



    public function update(Request $request, $id)
    {
        
        $data = Employee::find($id);
        $data->update($request->all());
        return redirect('/employee')->with('success','Data berhasil di update');
   }

    public function destroy($id)
    {
        $data = Employee::find($id);
        $data->delete();
        return redirect('/employee')->with('success','Data Berhasil dihapus');
    }













    public function profileEmployee()
    {   
        $employeeData = Employee::where('email','=', Auth::user()->email)->firstOrFail();
        $outletCollection = Outlet::all()->sortBy("outlet_name")->sortBy("outlet_area");
        $jabatanCollection = Jabatan::all()->sortBy("jabatan_ket");
        return view('profile.profileEmployee', compact('outletCollection','jabatanCollection','employeeData'));
    }


    public function profileStore(Request $request, $id)
    {
        
        $data = Employee::find($id);
        $data->update($request->all());
        return redirect('/profileEmployee')->with('success','Data berhasil di update');
   }


}

<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Outlet;
use App\Models\Jabatan;
use Illuminate\Http\Request;
use Auth;

class ProfileController extends Controller
{

 
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

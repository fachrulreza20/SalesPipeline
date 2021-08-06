@extends('layout.main')

@section('title', 'Employee')

@section('assets')
    <link rel="stylesheet" href="/css/font-awesome.min.css">
@endsection


@section('container')
  
<a href="/employee">back</a>  
<h3>Add New employee</h3>
<br>
<form autocomplete="off" class="form" action="/employeeStore" method="post" enctype="multipart/form-data">
  @csrf

  <div class="mb-3 row">
    <label for="RezaField" class="col-sm-2 col-form-label">NIP</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="nip">
    </div>
  </div>

  <div class="mb-3 row">
    <label for="RezaField" class="col-sm-2 col-form-label">Nama</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="nama">
    </div>
  </div>

  <div class="mb-3 row">
    <label for="RezaField" class="col-sm-2 col-form-label">Pilih Unit Kerja</label>
    <div class="col-sm-10">

      <select class="form-control" name="outletCode">
      <?php

        $area_tmp = '';
        foreach ($outletCollection as $outlet){
          //echo $outlet->outlet_name;
          if($outlet->outlet_area == $area_tmp){
            echo "<option value='".$outlet->outlet_code."'>".$outlet->outlet_name."</option>";
          }
          else{
            echo "</optgroup>";
            echo "<optgroup label='".$outlet->outlet_area."'>";
            echo "<option value='".$outlet->outlet_code."'>".$outlet->outlet_name."</option>";
          }
          $area_tmp = $outlet->outlet_area;
        }
      ?>
      </select>

    </div>
  </div>

  <div class="mb-3 row">
    <label for="RezaField" class="col-sm-2 col-form-label">Pilih Jabatan</label>
    <div class="col-sm-10">
      <select class="form-select" name="jabatan">

        @foreach($jabatanCollection as $jabatan)

            <option value="{{ $jabatan->id }}">{{ $jabatan->jabatan_ket }}</option>

        @endforeach

      </select>
    </div>
  </div>

  <div class="mb-3 row">
    <label for="RezaField" class="col-sm-2 col-form-label">Pilih Status</label>
    <div class="col-sm-10">
      <select  name="pegawai_status" class="form-select">
        <option value="active">Active</option>
        <option value="resign">Resign</option>
      </select>
    </div>
  </div>


 
 <div class="mb-3 row">
    <label for="RezaField" class="col-sm-2 col-form-label"></label>
   <div class="col-auto">
      <button type="submit" class="btn btn-sm btn-primary mb-3">Submit</button>
    </div>
 </div>

</form>


@endsection
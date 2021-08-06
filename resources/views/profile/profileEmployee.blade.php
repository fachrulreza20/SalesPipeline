@extends('layout.main')

@section('title', 'Employee')

@section('assets')
    <link rel="stylesheet" href="/css/font-awesome.min.css">
@endsection


@section('container')
 
      <div class="row mt-2">
        @if ($message = Session::get('success'))
          <div class="alert alert-success" role="alert">
              {{ $message }}
          </div>
        @endif
      </div>


      <?php
         
         if($employeeData->outletCode == "NotUpdated" or $employeeData->jabatan == "NotUpdated" ){

            echo "
                <div class='row mt-2'>
                    <div class='alert alert-warning' role='alert'>
                        Segera Update Outlet (Unit Kerja) dan Jabatan Anda.
                    </div>
                </div>
            ";

         }
      ?>



<a href="/">back</a>  
<h3>Your Profile </h3>
<br>
<form autocomplete="off" class="form" action="/profileStore/{{ $employeeData->id }}" method="post" enctype="multipart/form-data">
  @csrf

  <div class="mb-3 row">
    <label for="RezaField" class="col-sm-2 col-form-label">Email</label>
    <div class="col-sm-10">
      <input type="text" disabled="disabled" class="form-control" name="nip" value="{{ $employeeData->email }}">
    </div>
  </div>

  <div class="mb-3 row">
    <label for="RezaField" class="col-sm-2 col-form-label">NIP</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="nip" value="{{ $employeeData->nip }}">
       <small class="w-100 text-primary">Pastikan NIP Anda sudah Benar</small>
    </div>
  </div>

  <div class="mb-3 row">
    <label for="RezaField" class="col-sm-2 col-form-label">Nama</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="nama" value="{{ $employeeData->nama }}">
    </div>
  </div>

  <div class="mb-3 row">
    <label for="RezaField" class="col-sm-2 col-form-label">Pilih Unit Kerja</label>
    <div class="col-sm-10">

      <select class="form-control" name="outletCode">
      <?php

        if($employeeData->outletCode == "NotUpdated"){
            echo "<option value='NotUpdated' selected>NotUpdated</option>";
        }

        $selected = '';      
        $area_tmp = '';
        foreach ($outletCollection as $outlet){

          if($employeeData->outletCode == $outlet->outlet_code){
            $selected = 'selected';
          }else{ $selected = '';}


          if($outlet->outlet_area == $area_tmp){
            echo "<option ".$selected." value='".$outlet->outlet_code."'>".$outlet->outlet_name."</option>";
          }
          else{
            echo "</optgroup>";
            echo "<optgroup label='".$outlet->outlet_area."'>";
            echo "<option ".$selected."  value='".$outlet->outlet_code."'>".$outlet->outlet_name."</option>";
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
      <?php
        if($employeeData->jabatan == "NotUpdated"){
            echo "<option value='NotUpdated' selected>NotUpdated</option>";
        }
          $selected = '';
        foreach($jabatanCollection as $jabatan){

          if($employeeData->jabatan == $jabatan->id){
            $selected = 'selected';
          }else{ $selected = '';}
          echo "<option ".$selected." value='".$jabatan->id."'>".$jabatan->jabatan_ket."</option>";

        }
      ?>

      </select>
    </div>
  </div>

  <div class="mb-3 row">
    <label for="RezaField" class="col-sm-2 col-form-label">Pilih Status</label>
    <div class="col-sm-10">
      <select  name="pegawai_status" class="form-select">
        <option value="active"{{ ($employeeData->pegawai_status == 'active') ? 'selected' : '' }}>Active</option>
        <option value="resign"{{ ($employeeData->pegawai_status == 'resign') ? 'selected' : '' }}>Resign</option>
      </select>
    </div>
  </div>


 
 <div class="mb-3 row">
    <label for="RezaField" class="col-sm-2 col-form-label"></label>
   <div class="col-auto">
      <button type="submit" class="btn btn-sm btn-primary mb-3">Update My Profile</button>
    </div>
 </div>

</form>


@endsection
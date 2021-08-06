@extends('layout.main')

@section('title', 'Employee')

@section('assets')
    <link rel="stylesheet" href="/css/font-awesome.min.css">
@endsection


@section('container')
  
<a href="/employee">back</a>  
<h3>Edit employee</h3>
<br>
<form autocomplete="off" class="form" action="/employeeUpdate/{{ $data->id }}" method="post" enctype="multipart/form-data">
  @csrf


  <div class="mb-3 row">
    <label for="RezaField" class="col-sm-2 col-form-label">NIP</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="nip" value="{{ $data->nip }}">
    </div>
  </div>

  <div class="mb-3 row">
    <label for="RezaField" class="col-sm-2 col-form-label">Nama</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="nama" value="{{ $data->nama }}">
    </div>
  </div>

  <div class="mb-3 row">
    <label for="RezaField" class="col-sm-2 col-form-label">Pilih Unit Kerja</label>
    <div class="col-sm-10">

      <select class="form-control" name="outletCode">
      <?php
        $selected = '';      
        $area_tmp = '';
        foreach ($outletCollection as $outlet){

          if($data->outletCode == $outlet->outlet_code){
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
      <select name="jabatan" class="form-select">
        <?php
        $selected = '';


        foreach($jabatanCollection as $jabatan){

          if($data->jabatan == $jabatan->id){
            $selected = 'selected';
          }else{ $selected = '';}
          echo "<option ".$selected." value='".$jabatan->id."'>".$jabatan->jabatan_ket."</option>";

        }
        ?>
      </select>
    </div>
  </div>

  <div class="mb-3 row">
    <label for="RezaField" class="col-sm-2 col-form-label">Status</label>
    <div class="col-sm-10">
      <select  name="pegawai_status" class="form-select">
        <option value="active"{{ ($data->pegawai_status == 'active') ? 'selected' : '' }}>Active</option>
        <option value="resign"{{ ($data->pegawai_status == 'resign') ? 'selected' : '' }}>Resign</option>
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
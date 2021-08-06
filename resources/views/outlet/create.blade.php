@extends('layout.main')

@section('title', 'Outlet')

@section('assets')
    <link rel="stylesheet" href="/css/font-awesome.min.css">
@endsection


@section('container')
  
<a href="/outlet">back</a>  
<h3>Add New outlet</h3>
<br>
<form autocomplete="off" class="form" action="/outletStore" method="post" enctype="multipart/form-data">
  @csrf

  <div class="mb-3 row">
    <label for="RezaField" class="col-sm-2 col-form-label">outlet Code</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="outlet_code" placeholder="contoh: ID0010008">
    </div>
  </div>

  <div class="mb-3 row">
    <label for="RezaField" class="col-sm-2 col-form-label">outlet Name</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="outlet_name" placeholder="contoh: KCP Medan Sukaramai">
    </div>
  </div>

  <div class="mb-3 row">
    <label for="RezaField" class="col-sm-2 col-form-label">Pilih Area</label>
    <div class="col-sm-10">
     
      <select class="form-select" name="outlet_area">

        @foreach($areas as $area)

          <option value="{{ $area->outlet_area }}">{{ $area->outlet_area }}</option>

        @endforeach
      </select>
    </div>
  </div>

  <div class="mb-3 row">
    <label for="RezaField" class="col-sm-2 col-form-label">Region</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="outlet_region" placeholder="contoh: Region Medan" value="Region Medan">
    </div>
  </div>

  <div class="mb-3 row">
    <label for="RezaField" class="col-sm-2 col-form-label">Pilih Bank Legacy</label>
    <div class="col-sm-10">
     
      <select class="form-select" name="outlet_bank">
        <option value="bsm">BSM</option>
        <option value="bris">BNIS</option>
        <option value="bnis">BRIS</option>
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
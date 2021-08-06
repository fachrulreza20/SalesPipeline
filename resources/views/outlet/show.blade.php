@extends('layout.main')

@section('title', 'Outlet')

@section('assets')
    <link rel="stylesheet" href="/css/font-awesome.min.css">
@endsection


@section('container')
  
<a href="/outlet">back</a>  
<h3>Edit outlet</h3>
<br>
<form autocomplete="off" class="form" action="/outletUpdate/{{ $data->id }}" method="post" enctype="multipart/form-data">
  @csrf


  <div class="mb-3 row">
    <label for="RezaField" class="col-sm-2 col-form-label">outlet Code</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="outlet_code" placeholder="contoh: ID0010008" value="{{ $data->outlet_code }}">
    </div>
  </div>

  <div class="mb-3 row">
    <label for="RezaField" class="col-sm-2 col-form-label">outlet Name</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="outlet_name" placeholder="contoh: KCP Medan Sukaramai" value="{{ $data->outlet_name }}">
    </div>
  </div>

  <div class="mb-3 row">
    <label for="RezaField" class="col-sm-2 col-form-label">Pilih Area</label>
    <div class="col-sm-10">
     
      <select class="form-select" name="outlet_area">

        @foreach($areas as $area)

          <option {{ ($data->outlet_area == $area->outlet_area) ? 'selected' : '' }}  value="{{ $area->outlet_area }}">{{ $area->outlet_area }}</option>

        @endforeach

      </select>
    </div>
  </div>

  <div class="mb-3 row">
    <label for="RezaField" class="col-sm-2 col-form-label">Region</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="outlet_region" placeholder="contoh: Region Medan" value="Region Medan" value="{{ $data->outlet_region }}">
    </div>
  </div>

  <div class="mb-3 row">
    <label for="RezaField" class="col-sm-2 col-form-label">Pilih Bank Legacy</label>
    <div class="col-sm-10">

      <select class="form-select" name="outlet_bank">
        <option {{ ($data->outlet_bank == 'bsm') ? 'selected' : '' }} value="bsm">BSM</option>
        <option {{ ($data->outlet_bank == 'bnis') ? 'selected' : '' }} value="bnis">BNIS</option>
        <option {{ ($data->outlet_bank == 'bris') ? 'selected' : '' }} value="bris">BRIS</option>
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
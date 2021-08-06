@extends('layout.main')

@section('title', 'Segmen')

@section('assets')
    <link rel="stylesheet" href="/css/font-awesome.min.css">
@endsection


@section('container')
  
<a href="/segmen">back</a>  
<h3>Edit Segmen</h3>
<br>
<form autocomplete="off" class="form" action="/segmentUpdate/{{ $data->id }}" method="post" enctype="multipart/form-data">
  @csrf

  <div class="mb-3 row">
    <label for="RezaField" class="col-sm-2 col-form-label">Segment Name</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="segmen_ket" value="{{ $data->segmen_ket}}">
    </div>
  </div>

  <div class="mb-3 row">
    <label for="RezaField" class="col-sm-2 col-form-label">Divisi</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="divisi" value="{{ $data->divisi }}">
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
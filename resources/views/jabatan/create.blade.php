@extends('layout.main')

@section('title', 'Jabatan')

@section('assets')
    <link rel="stylesheet" href="/css/font-awesome.min.css">
@endsection


@section('container')
  
<a href="/jabatan">back</a>  
<h3>Add New jabatan</h3>
<br>
<form autocomplete="off" class="form" action="/jabatanStore" method="post" enctype="multipart/form-data">
  @csrf

  <div class="mb-3 row">
    <label for="RezaField" class="col-sm-2 col-form-label">jabatan Name</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="jabatan_ket">
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
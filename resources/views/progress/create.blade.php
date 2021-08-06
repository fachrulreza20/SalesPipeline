@extends('layout.main')

@section('title', 'Progress')

@section('assets')
    <link rel="stylesheet" href="/css/font-awesome.min.css">
@endsection


@section('container')
  
<a href="/progress">back</a>  
<h3>Add New progress</h3>
<br>
<form autocomplete="off" class="form" action="/progressStore" method="post" enctype="multipart/form-data">
  @csrf

  <div class="mb-3 row">
    <label for="RezaField" class="col-sm-2 col-form-label">progress Name</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="progress_ket">
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
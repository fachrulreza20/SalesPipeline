@extends('layout.main')

@section('title', 'Pipeline')

@section('assets')
    <link rel="stylesheet" href="/css/font-awesome.min.css">
{{-- 
     <!-- CSS Bootstrap Datepicker -->
     <link rel="stylesheet" href="css/bootstrap-datepicker.css">
     <!-- jQuery -->
     <script src="js/jquery-3.3.1.slim.min.js"></script>
     <!-- Javascript Bootstrap -->
     <script src="js/bootstrap.js"></script>
     <!-- Javascript Bootstrap Datepicker -->
     <script src="js/bootstrap-datepicker.js"></script>
 --}}
@endsection


@section('container')
  
<a href="/pipeline">back</a>  
<h3>Edit Data Pipeline</h3>
<br>
<form autocomplete="off" class="form-inline" action="/pipelineUpdate/{{$pipelineShow->id}}" method="post" enctype="multipart/form-data">
  @csrf

  <div class="mb-3 row">
    <label for="RezaField" class="col-sm-2 col-form-label">Nama Nasabah</label>
    <div class="col-sm-10">
      <input required="true" type="text" class="form-control" name="pipeline_nama_nasabah" value="{{ $pipelineShow->pipeline_nama_nasabah }}" >
    </div>
  </div>


 <div class="mb-3 row">
    <label for="RezaField" class="col-sm-2 col-form-label">Nominal</label>
    <div class="col-sm-10">
      <input required="true" type="text" class="form-control" name="pipeline_nominal" value="{{ $pipelineShow->pipeline_nominal }}">
    </div>
  </div>

 <div class="mb-3 row"> 
    <label for="RezaField" class="col-sm-2 col-form-label">Progress</label>
    <div class="col-sm-10">

      <select required="true" class="form-select" name="pipeline_progress">
        @foreach($progressCollection as $progress)
            <option {{ ($pipelineShow->pipeline_progress == $progress->id) ? 'selected' : '' }} value="{{ $progress->id }}">{{ $progress->progress_ket }}</option>
        @endforeach
      </select>

    </div>
  </div>

 <div class="mb-3 row">
    <label for="RezaField" class="col-sm-2 col-form-label">Segmen</label>
    <div class="col-sm-10">
      <select required="true" class="form-select" name="pipeline_segmen">
        @foreach($segmentCollection as $segment)
            <option {{ ($pipelineShow->pipeline_segmen == $segment->id) ? 'selected' : '' }} value="{{ $segment->id }}">{{ $segment->segmen_ket }}</option>
        @endforeach
      </select>
    </div>
  </div>


 <div class="mb-3 row">
    <label for="RezaField" class="col-sm-2 col-form-label">Proyeksi Cair </label>
    <div class="col-sm-6">

        <?php

          $monthNumber = date('m');
          $weekNumber = $weekNumber;

        ?>

        <div class="form-inline">
          <select required="true" name="pipeline_proyeksiCairMonth" class="form-select mb-2">
            <option value="01" {{ ($pipelineShow->pipeline_proyeksiCairMonth == '01') ? 'selected' : ''}}>Bulan Januari</option>
            <option value="02" {{ ($pipelineShow->pipeline_proyeksiCairMonth == '02') ? 'selected' : ''}}>Bulan Februari</option>
            <option value="03" {{ ($pipelineShow->pipeline_proyeksiCairMonth == '03') ? 'selected' : ''}}>Bulan Maret</option>
            <option value="04" {{ ($pipelineShow->pipeline_proyeksiCairMonth == '04') ? 'selected' : ''}}>Bulan April</option>
            <option value="05" {{ ($pipelineShow->pipeline_proyeksiCairMonth == '05') ? 'selected' : ''}}>Bulan Mei</option>
            <option value="06" {{ ($pipelineShow->pipeline_proyeksiCairMonth == '06') ? 'selected' : ''}}>Bulan Juni</option>
            <option value="07" {{ ($pipelineShow->pipeline_proyeksiCairMonth == '07') ? 'selected' : ''}}>Bulan Juli</option>
            <option value="08" {{ ($pipelineShow->pipeline_proyeksiCairMonth == '08') ? 'selected' : ''}}>Bulan Agustus</option>
            <option value="09" {{ ($pipelineShow->pipeline_proyeksiCairMonth == '09') ? 'selected' : ''}}>Bulan September</option>
            <option value="10" {{ ($pipelineShow->pipeline_proyeksiCairMonth == '10') ? 'selected' : ''}}>Bulan Oktober</option>
            <option value="11" {{ ($pipelineShow->pipeline_proyeksiCairMonth == '11') ? 'selected' : ''}}>Bulan November</option>
            <option value="12" {{ ($pipelineShow->pipeline_proyeksiCairMonth == '12') ? 'selected' : ''}}>Bulan Desember</option>
          </select>

          <select required="true" name="pipeline_proyeksiCairWeek" class="form-select mb-2">
            <option value="1" {{ ($pipelineShow->pipeline_proyeksiCairWeek == '1') ? 'selected' : ''}}> Week 1</option>
            <option value="2" {{ ($pipelineShow->pipeline_proyeksiCairWeek == '2') ? 'selected' : ''}}> Week 2</option>
            <option value="3" {{ ($pipelineShow->pipeline_proyeksiCairWeek == '3') ? 'selected' : ''}}> Week 3</option>
            <option value="4" {{ ($pipelineShow->pipeline_proyeksiCairWeek == '4') ? 'selected' : ''}}> Week 4</option>
            <option value="5" {{ ($pipelineShow->pipeline_proyeksiCairWeek == '5') ? 'selected' : ''}}> Week 5</option>
          </select>

        </div>

      <input required="true" type="hidden" class="form-control datepicker" name="pipeline_proyeksiCairDate" value="2021-01-01">

  </div>   
</div>

 
 
 <div class="mb-3 row">
    <label for="RezaField" class="col-sm-2 col-form-label">Nomor Loan (jika sudah cair)</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="pipeline_noloan" required="true" value="{{ $pipelineShow->pipeline_noloan }}">
      <small class="text-muted">Tulis 0 jika belum Cair</small>
    </div>
  </div>

  <input required="true" type="hidden" class="form-control" name="pipeline_nip" value="{{ $employeeCollection->nip }}">
  <input required="true" type="hidden" class="form-control" name="pipeline_jabatan" value="{{ $employeeCollection->jabatan }}">
  <input required="true" type="hidden" class="form-control" name="pipeline_outletCode" value="{{ $employeeCollection->outletCode }}">

 <div class="mb-3 row">
    <label for="RezaField" class="col-sm-2 col-form-label">Keterangan</label>
    <div class="col-sm-10">
      <input required="true" type="text" class="form-control" name="pipeline_ket" value="{{ $pipelineShow->pipeline_ket }}" >
    </div>
  </div>


  <input required="true" type="hidden" class="form-control" name="pipeline_status" value="{{ $pipelineShow->pipeline_status }}">


 <div class="mb-3 row">
    <label for="RezaField" class="col-sm-2 col-form-label">Jenis</label>
    <div class="col-sm-10">
      <select required="true" class="form-control" name="pipeline_jenis">
        <option {{ ($pipelineShow->pipeline_jenis == 'baru') ? 'selected' : '' }} value="baru">Baru</option>
        <option {{ ($pipelineShow->pipeline_jenis == 'topup') ? 'selected' : '' }} value="topup">Top Up</option>
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

@section('bodybottom')

<script type="text/javascript">
 $(function(){
  $(".datepicker").datepicker({
      format: 'yyyy-mm-dd',
      autoclose: true,
      todayHighlight: true,
  });
 });
</script>

@endsection
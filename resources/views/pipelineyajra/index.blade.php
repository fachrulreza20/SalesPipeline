@extends('layout.main')

@section('title', 'Pipeline')

@section('assets')

@endsection


@section('container')

      <div class="float-right">
        <a href='/pipelineExport' class="btn btn-sm btn-success" style="float: right;">Download Excel Pipeline</a>      
      </div>


      <div class="row mt-2">
        @if ($message = Session::get('success'))
          <div class="alert alert-success" role="alert">
              {{ $message }}
          </div>
        @endif
      </div>
      <br>
      <h4>Data Pipeline</h4>

      <a href='/pipelineCreate' class="btn btn-sm btn-primary">Add New</a>      
      <table class="table mt-2 table-bordered table-hover table-sm table-responsive" id="pipelineyajra">
        <thead class="table-secondary">
          <tr>
            <th>#</th>
            <th>Nama Nasabah</th>
            <th>Nominal</th>
            <th>Progress</th>
            <th>Segmen</th>
            <th>Proyeksi Cair</th>
            <th>Nomor Loan</th>
            <th>Employee/Marketing</th>
            <th>Jabatan</th>
            <th>Outlet</th>
            <th>Ket</th>
            <th>Status</th>
            <th>Jenis</th>
            <th>Modified</th>
            <th>Aksi</th>
          </tr>
        </thead>
{{-- 
        <tbody>

          @foreach($data as $key => $row)

            <tr>
              <td scope="row"></td>
              <td>{{ $row->pipeline_nama_nasabah }}</td>
              <td>{{ $row->pipeline_nominal }}</td>
              <td>{{ $row->getProgress->progress_ket }}</td>
              <td>{{ $row->getSegment->segmen_ket }}</td>
              <td>Week {{ $row->pipeline_proyeksiCairWeek }} <?= date("F", mktime(0, 0, 0, $row->pipeline_proyeksiCairMonth, 10)); ?></td>
              <td>{{ $row->pipeline_noloan }}</td>
              <td>{{ $row->getEmployee->nama }}</td>
              <td>{{ $row->getJabatan->jabatan_ket }}</td>
              <td>{{ $row->getOutlet->outlet_name }}</td>
              <td>{{ $row->pipeline_ket }}</td>
              <td>{{ $row->pipeline_status }}</td>
              <td>{{ $row->pipeline_jenis }}</td>
              <td>{{ $row['updated_at']->format('d M Y h:i') }}</td>

              <td>
                  <a href="/pipelineShow/{{ $row->id }}" class="badge bg-success m-1">Edit</button></a>
                  <a href="#"  class="badge bg-danger m-1" data-id="{{ $row->id }}" data-nama="{{ $row->pipeline_nama_nasabah }}">Delete</a>
              </td>
            </tr>

          @endforeach
        </tbody>

 --}}      </table>
  
@endsection



@section('bodybottom')
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap5.min.js"></script>

    
    <script type="text/javascript">

//      $(document).ready(function() {
//          $('#pipelineyajra').DataTable();
//      } );      


      $(document).ready(function() {
          $('#pipelineyajra').DataTable( {
              processing: true,
              serverSide: true,
              ajax: {
                  url: "{{ route('pipelineyajra') }}",
                  type: "GET",
              },
              columns: [
                {data: 'id', name: 'id' },              
                {data: 'pipeline_nama_nasabah', name: 'pipeline_nama_nasabah'},
                {data: 'pipeline_nominal', name: 'pipeline_nominal'},
                {data: 'get_progress.progress_ket', name: 'progress_ket'},
                {data: 'get_segment.segmen_ket', name: 'segmen_ket'},
                {data: 'pipeline_noloan', name: 'pipeline_noloan'},
                {data: 'pipeline_noloan', name: 'pipeline_noloan'},
                {data: 'get_employee.nama', name: 'nama'},
                {data: 'get_jabatan.jabatan_ket', name: 'jabatan_ket'},
                {data: 'get_outlet.outlet_name', name: 'outlet_name'},
                {data: 'pipeline_ket', name: 'pipeline_ket'},
                {data: 'pipeline_status', name: 'pipeline_status'},
                {data: 'pipeline_jenis', name: 'pipeline_jenis'},
                {data: 'updated_at', name: 'updated_at'},
                {data: 'updated_at', name: 'updated_at'},
              ],
          } );
      } );


    </script>


@endsection

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
      <table class="table mt-2 table-bordered table-hover table-sm table-responsive">
        <thead class="table-secondary">
          <tr>
            <th class="text-center" scope="col">#</th>
            <th class="text-center" scope="col">Nama Nasabah</th>
            <th class="text-center" scope="col">Nominal</th>
            <th class="text-center" scope="col">Progress</th>
            <th class="text-center" scope="col">Segmen</th>
            <th class="text-center" scope="col">Proyeksi Cair</th>
            <th class="text-center" scope="col">Nomor Loan</th>
            <th class="text-center" scope="col">Employee/Marketing</th>
            <th class="text-center" scope="col">Jabatan</th>
            <th class="text-center" scope="col">Outlet</th>
            <th class="text-center" scope="col">Ket</th>
            <th class="text-center" scope="col">Status</th>
            <th class="text-center" scope="col">Jenis</th>
            <th class="text-center" scope="col">Modified</th>
            <th class="text-center" scope="col">Aksi</th>
          </tr>
        </thead>
        <tbody>

          @foreach($data as $key => $row)

            <tr>
              <td scope="row">{{ $data->firstItem() + $key }}</td>
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
      </table>
      <div>
        Showing
        {{ $data->firstItem() }}
        to
        {{ $data->lastItem() }}
        of
        {{ $data->total() }}        
      </div>
      <br>
      <div class="pull-right"> 
        {{ $data->links() }}
      </div>
@endsection



@section('bodybottom')

<script>

  $('.hapus').click(function(){

    var id = $(this).attr('data-id');
    var namapegawai = $(this).attr('data-nama');

    Swal.fire({
      title: 'Anda Yakin?',
      text: "Anda akan menghapus pegawai nama : "+namapegawai+"",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Ya. Hapus Data'
    }).then((result) => {
      if (result.isConfirmed) {
        window.location = "/pipelineDelete/"+id
        Swal.fire(
          'Data Berhasil dihapus!',
          'Sip.',
          'success'
        )
      }
    })
  })

</script>



@endsection

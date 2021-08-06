@extends('layout.main')

@section('title', 'Employee')



@section('container')
      <h4>Data Employee</h4>
      <a href='/employeeCreate' class="btn btn-sm btn-primary mt-2">Add New</a>      

      <div class="row mt-2">
        @if ($message = Session::get('success'))
          <div class="alert alert-success" role="alert">
              {{ $message }}
          </div>
        @endif
      </div>

      <table class="table mt-2 table-bordered table-hover table-sm table-responsive text-xsmall">
        <thead class="table-secondary">
          <tr>
            <th class="text-center" scope="col">#</th>
            <th class="text-center" scope="col">NIP</th>
            <th class="text-center" scope="col">Nama</th>
            <th class="text-center" scope="col">Unit Kerja</th>
            <th class="text-center" scope="col">Jabatan</th>
            <th class="text-center" scope="col">Email</th>
            <th class="text-center" scope="col">Status</th>
            <th class="text-center" scope="col">Modified</th>

            <th class="text-center" scope="col">Aksi</th>
          </tr>
        </thead>
        <tbody>

          @foreach($data as $key => $row)

            <tr>
              <td scope="row">{{ $data->firstItem() + $key }}</td>
              <td>{{ $row->nip }}</td>
              <td>{{ $row->nama }}</td>
              <td>{{ $row->getOutlet->outlet_name }}</td>
              <td>{{ $row->getJabatan->jabatan_ket }}</td>
              <td>{{ $row->getJabatan->email }}</td>
              <td>{{ $row->pegawai_status }}</td>
              <td>{{ $row['updated_at']->format('d M Y h:i') }}</td>
              <td>
                  <a href="/employeeShow/{{ $row->id }}" class="btn btn-sm btn-success m-1">Edit</button>
                  <a href="#" class="btn btn-sm btn-sm btn-danger hapus" data-id="{{ $row->id }}" data-nama="{{ $row->nama }}">Delete</a>
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
    var employee_ket = $(this).attr('data-nama');

    Swal.fire({
      title: 'Anda Yakin?',
      text: "Anda akan menghapus employee  : "+employee_ket+"",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Ya. Hapus Data'
    }).then((result) => {
      if (result.isConfirmed) {
        window.location = "/employeeDelete/"+id
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

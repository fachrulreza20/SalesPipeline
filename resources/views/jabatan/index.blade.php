@extends('layout.main')

@section('title', 'Jabatan')



@section('container')
      <h4>Data Jabatan</h4>
      <a href='/jabatanCreate' class="btn btn-sm btn-primary mt-2">Add New</a>      

      <div class="row mt-2">
        @if ($message = Session::get('success'))
          <div class="alert alert-success" role="alert">
              {{ $message }}
          </div>
        @endif
      </div>

      <table class="table mt-2 table-bordered table-hover table-sm table-responsive">
        <thead class="table-secondary">
          <tr>
            <th class="text-center" scope="col">#</th>
            <th class="text-center" scope="col">jabatan_Ket</th>
            <th class="text-center" scope="col">Modified</th>

            <th class="text-center" scope="col">Aksi</th>
          </tr>
        </thead>
        <tbody>

          @foreach($data as $row)

            <tr>
              <td scope="row">{{ $row->id }}</td>
              <td>{{ $row->jabatan_ket }}</td>
              <td>{{ $row['updated_at']->format('d M Y h:i') }}</td>
              <td>
                  <a href="/jabatanShow/{{ $row->id }}" class="btn btn-sm btn-success m-1">Edit</button>
                  <a href="#" class="btn btn-sm btn-danger hapus" data-id="{{ $row->id }}" data-nama="{{ $row->jabatan_ket }}">Delete</a>
              </td>
            </tr>

          @endforeach
        </tbody>
      </table>


@endsection



@section('bodybottom')

<script>

  $('.hapus').click(function(){

    var id = $(this).attr('data-id');
    var jabatan_ket = $(this).attr('data-nama');

    Swal.fire({
      title: 'Anda Yakin?',
      text: "Anda akan menghapus jabatan  : "+jabatan_ket+"",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Ya. Hapus Data'
    }).then((result) => {
      if (result.isConfirmed) {
        window.location = "/jabatanDelete/"+id
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

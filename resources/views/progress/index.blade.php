@extends('layout.main')

@section('title', 'Progress')



@section('container')
      <h4>Data Progress</h4>
      <a href='/progressCreate' class="btn btn-sm btn-primary mt-2">Add New</a>      

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
            <th class="text-center" scope="col">Progress_Ket</th>
            <th class="text-center" scope="col">Modified</th>

            <th class="text-center" scope="col">Aksi</th>
          </tr>
        </thead>
        <tbody>

          @foreach($data as $row)

            <tr>
              <td scope="row">{{ $row->id }}</td>
              <td>{{ $row->progress_ket }}</td>
              <td>{{ $row['updated_at']->format('d M Y h:i') }}</td>
              <td>
                  <a href="/progressShow/{{ $row->id }}" class="btn btn-sm btn-success m-1">Edit</button>
                  <a href="#" class="btn btn-sm btn-danger hapus" data-id="{{ $row->id }}" data-nama="{{ $row->progress_ket }}">Delete</a>
              </td>
            </tr>

          @endforeach
        </tbody>
      </table>


@endsection



@section('afterbodytag')


<script>


  $('.hapus').click(function(){

    var id = $(this).attr('data-id');
    var progress_ket = $(this).attr('data-nama');

    Swal.fire({
      title: 'Anda Yakin?',
      text: "Anda akan menghapus progress  : "+progress_ket+"",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Ya. Hapus Data'
    }).then((result) => {
      if (result.isConfirmed) {
        window.location = "/progressDelete/"+id
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

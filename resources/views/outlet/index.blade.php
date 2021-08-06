@extends('layout.main')

@section('title', 'Outlet')




@section('container')
      <h4>Data Outlet</h4>
      <a href='/outletCreate' class="btn btn-sm btn-primary mt-2">Add New</a>      

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
            <th class="text-center" scope="col">outlet_code</th>
            <th class="text-center" scope="col">outlet_name</th>
            <th class="text-center" scope="col">outlet_area</th>
            <th class="text-center" scope="col">outlet_region</th>
            <th class="text-center" scope="col">outlet_bank</th>
            <th class="text-center" scope="col">Modified</th>

            <th class="text-center" scope="col">Aksi</th>
          </tr>
        </thead>
        <tbody>

          @foreach($data as $row)

            <tr>
              <td scope="row">{{ $row->id }}</td>
              <td>{{ $row->outlet_code }}</td>
              <td>{{ $row->outlet_name }}</td>
              <td>{{ $row->outlet_area }}</td>
              <td>{{ $row->outlet_region }}</td>
              <td>{{ $row->outlet_bank }}</td>
              <td>{{ $row['updated_at']->format('d M Y h:i') }}</td>
              <td>
                  <a href="/outletShow/{{ $row->id }}" class="btn btn-sm btn-success m-1">Edit</button>
                  <a href="#" class="btn btn-sm btn-danger hapus" data-id="{{ $row->id }}" data-nama="{{ $row->outlet_name }}">Delete</a>
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
    var outlet_name = $(this).attr('data-nama');

    Swal.fire({
      title: 'Anda Yakin?',
      text: "Anda akan menghapus outlet  : "+outlet_name+"",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Ya. Hapus Data'
    }).then((result) => {
      if (result.isConfirmed) {
        window.location = "/outletDelete/"+id
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

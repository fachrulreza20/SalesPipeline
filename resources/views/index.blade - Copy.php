@extends('layout.main')

@section('title', 'Index')



@section('container')

      <div class="row mt-2">
        @if ($message = Session::get('warning'))
          <div class="alert alert-warning" role="alert">
              {{ $message }}
          </div>
        @endif
      </div>

      <table class="table mt-2 table-bordered table-hover table-sm w-auto">          
        <thead class="table-secondary">

            <tr>
                 <td>Area</td>
                 <td>NOA</td>
                 @foreach ($segmens as $row)

                    <td>{{ $row->segmen_ket }}</td>

                 @endforeach 
            </tr>

        </thead>
      </table>


      <table class="table mt-2 table-bordered table-hover table-sm w-auto">          
        <thead class="table-secondary">
            <tr>
              <td>Area</td>
              <td>NOA</td>
              <td>OS BBG</td>
              <td>NOA BBG</td>
            </tr>
          </thead>
          <tbody>
          
       {{--  {{ dd($segmens) }} --}}

          @foreach ($homepages as $row) 

            <tr>
              <td class="text-left">{{ $row->outlet_area }}</td>
              <td class="text-right">{{ $row->NOA }}</td>

                 @foreach ($segmens as $rows)

                     <?php $modified_segmen_ket = "OS_".$rows->modified_segmen_ket; ?>
                    <td class="text-right">{{ number_format($row->{$modified_segmen_ket},0) }}</td>

                 @endforeach 
              
              <td class="text-right">{{ $row->NOA_BBG }}</td>
            </tr>

          @endforeach

          </tbody>
      </table>


@endsection



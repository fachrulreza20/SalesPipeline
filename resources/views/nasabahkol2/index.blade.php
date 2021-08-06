@extends('layout.main')

@section('title', 'Nasabah kol2')


@section('container')

    <div class="row">
      <div class="col-md-12"> 

      <div class="row mt-2">
        @if ($message = Session::get('success'))
          <div class="alert alert-success" role="alert">
              {{ $message }}
          </div>
        @endif
      </div>

        <h5 class="mb-4">Data Nasabah Downgrade ke KOL2  Cabang {{ (sizeof($data)>0) ? $data[0]['namaoutlet'] : '-' }}</h5>        
        <form action="/nasabahkol2/1" method="POST">
        @csrf
        {{ method_field('PATCH') }} 
        <table class="table mt-2 table-bordered table-hover table-sm table-responsive text-xsmall">
            <thead class="table-secondary">
            <tr>
                <th rowspan="2">No.Loan</th>
                <th rowspan="2">Nama Lengkap</th>
                <th rowspan="2">Divisi</th>
                <th rowspan="2">OS Rp Juta</th>
                <th colspan="2">Proyeksi Coll</th>
            </tr>
            <tr>
                <th> KOL 1 LANCAR </th>
                <th> KOL 2 </th>
            </tr>
            </thead>
{{-- 
            <tr>
               <td><input type='radio' name='proy[1]' value='aa' ></td>
               <td><input type='radio' name='proy[1]' value='ba'></td>
            </tr>
            <tr>
               <td><input type='radio' name='proy[2]' value='ca' ></td>
               <td><input type='radio' name='proy[2]' value='da'></td>
            </tr>

            <tr>
               <td><input type='radio' name='proy[3]' value='ee' ></td>
               <td><input type='radio' name='proy[3]' value='fa'></td>
            </tr>
 --}}
            @if(sizeof($data)) 
                @foreach($data as $row)
                <tr>
                    <td>{{ $row->noloan }}</td>
                    <td>{{ $row->namanasabah }}</td>
                    <td class="text-center">{{ $row->divisi }}</td>
                    <td class="text-right">{{ number_format($row->os,2) }}</td>
                    <td class="text-center"><input type='radio' name='proy[{{  $row->id }}]' value='0' {{ ($row->proyeksi == "0") ? 'checked' : '' }} ></td>
                    <td class="text-center"><input type='radio' name='proy[{{  $row->id }}]' value='1' {{ ($row->proyeksi == "1") ? 'checked' : '' }} ></td>

                </tr>
                @endforeach
            @else
                <tr><td colspan="6">Cabang Anda tidak memiliki nasabah Downgrade</td></tr>
            @endif

       </table>
        <input type="submit" value="submit" class="btn btn-primary">   
        </form>
     </div>
    </div>

@endsection

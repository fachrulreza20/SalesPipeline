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

      <h4>Summary DG KOL2 </h4>

    <table>
    <tr>
    <td style="background-color: #f5f5f5; padding: 15px; width: 100%; border-radius: 5px"> 
    
    <h6>Summary Area (Rp Juta)</h6>

              <table class="table mt-2 table-bordered table-hover table-sm w-auto my-3">
                <thead class="table-secondary">                
                    <tr>
                        <th colspan="1" style="background-color: #fff;border:0px;"></th>    
                        <th colspan="2">Sebelum Wecoll</th>
                        <th colspan="2" style="background-color: #fff;border:0px;"></th>
                        <th colspan="2">Sesudah Wecoll</th>

                    </tr>

                    <tr>
                        <th rowspan="2">Area Konsolidasi</th>
                        <th colspan="2">Total DG</th>
                        <th colspan="2" style="background-color: #cae7f7">Upgrade</th>
                        <th colspan="2" style="background-color: #f48b8b">Stay Downgrade</th>

                    </tr>

                    <tr>
                        <th style='color:#00f'> OS</th>
                        <th style='color:#00f'> Noa</th>

                        <th style='color:#00f'>OS</th>
                        <th style='color:#00f'>NOA</th>
                        <th style='color:#f00'>OS</th>
                        <th style='color:#f00'>Noa</th>
                    </tr>
                </thead>

                    @foreach($summaryDgKol2Area as $dgKol2Area)

                    <tr>
                        <td style=''>{{ $dgKol2Area->area }}</td>

                        <td class='numerik text-right'>{{ number_format($dgKol2Area->real_DGKOL2_os_area,0) }}</td>
                        <td class='numerik text-right'>{{ $dgKol2Area->real_DGKOL2_noa_area }}</td>

                        <td class='numerik text-right'>{{ number_format($dgKol2Area->proy_PF_os_area,0) }}</td>     
                        <td class='numerik text-right'>{{ $dgKol2Area->proy_PF_noa_area }}</td>     

                        <td class='numerik text-right'>{{ number_format($dgKol2Area->proy_DGKOL2_os_area,0) }}</td>
                        <td class='numerik text-right'>{{ $dgKol2Area->proy_DGKOL2_noa_area }}</td>

                    </tr>                        

                    @endforeach
                </table>
    </td>
    </tr>
    </table>



    <br>
    <br>


    <table>
    <tr>
    <td style="background-color: #f5f5f5; padding: 15px; width: 100%; border-radius: 5px"> 
    
    <h6>Summary Segmen (Rp Juta)</h6>

              <table class="table mt-2 table-bordered table-hover table-sm w-auto my-3">
                 <thead class="table-secondary">                
                   <tr>
                        <th colspan="1" style="background-color: #fff;border:0px;"></th>    
                        <th colspan="2">Sebelum Wecoll</th>
                        <th colspan="2" style="background-color: #fff;border:0px;"></th>
                        <th colspan="2">Sesudah Wecoll</th>

                    </tr>

                    <tr>
                        <th rowspan="2">Area Konsolidasi</th>
                        <th colspan="2">Total DG</th>
                        <th colspan="2" style="background-color: #cae7f7">Upgrade</th>
                        <th colspan="2" style="background-color: #f48b8b">Stay Downgrade</th>

                    </tr>

                    <tr>
                        <th style='color:#00f'> OS</th>
                        <th style='color:#00f'> Noa</th>

                        <th style='color:#00f'>OS</th>
                        <th style='color:#00f'>NOA</th>
                        <th style='color:#f00'>OS</th>
                        <th style='color:#f00'>Noa</th>
                    </tr>
                </thead>

                    @foreach($summaryDgKol2Divisi as $dgKol2Divisi)

                    <tr>
                        <td style=''>{{ $dgKol2Divisi->divisi }}</td>

                        <td class='numerik text-right'>{{ number_format($dgKol2Divisi->real_DGKOL2_os_divisi,0) }}</td>
                        <td class='numerik text-right'>{{ $dgKol2Divisi->real_DGKOL2_noa_divisi }}</td>

                        <td class='numerik text-right'>{{ number_format($dgKol2Divisi->proy_PF_os_divisi,0) }}</td>     
                        <td class='numerik text-right'>{{ $dgKol2Divisi->proy_PF_noa_divisi }}</td>     

                        <td class='numerik text-right'>{{ number_format($dgKol2Divisi->proy_DGKOL2_os_divisi,0) }}</td>
                        <td class='numerik text-right'>{{ $dgKol2Divisi->proy_DGKOL2_noa_divisi }}</td>

                    </tr>                        

                    @endforeach
                </table>
    </td>
    </tr>
    </table>



    <br>
    <br>



    <table>
    <tr>
    <td style="background-color: #f5f5f5; padding: 15px; width: 100%; border-radius: 5px"> 
    
    <h6>Summary outlet (Rp Juta)</h6>

              <table class="table mt-2 table-bordered table-hover table-sm w-auto my-3">
                <thead class="table-secondary">                
                    <tr>
                        <th colspan="1" style="background-color: #fff;border:0px;"></th>    
                        <th colspan="2">Sebelum Wecoll</th>
                        <th colspan="2" style="background-color: #fff;border:0px;"></th>
                        <th colspan="2">Sesudah Wecoll</th>
                        <th rowspan="3"> Sudah/ Belum Isi </th>


                    </tr>

                    <tr>
                        <th rowspan="2">outlet </th>
                        <th colspan="2">Total DG</th>
                        <th colspan="2" style="background-color: #cae7f7">Upgrade</th>
                        <th colspan="2" style="background-color: #f48b8b">Stay Downgrade</th>
 
                    </tr>

                    <tr>
                        <th style='color:#00f'> OS</th>
                        <th style='color:#00f'> Noa</th>

                        <th style='color:#00f'>OS</th>
                        <th style='color:#00f'>NOA</th>
                        <th style='color:#f00'>OS</th>
                        <th style='color:#f00'>Noa</th>
                    </tr>
                </thead>

                    @foreach($summaryDgKol2Outlet as $dgKol2outlet)

                        @if($dgKol2outlet->namaoutlet=="Total Area")
                            <?php $class = "subtotal"; ?>
                        @else
                            <?php $class = ""; ?>                        
                        @endif

                        <tr class="{{ $class }}">
                            <td style=''>{{ $dgKol2outlet->namaoutlet }}</td>

                            <td class='numerik text-right'>{{ number_format($dgKol2outlet->real_DGKOL2_os_outlet,0) }}</td>
                            <td class='numerik text-right'>{{ $dgKol2outlet->real_DGKOL2_noa_outlet }}</td>

                            <td class='numerik text-right'>{{ number_format($dgKol2outlet->proy_PF_os_outlet,0) }}</td>     
                            <td class='numerik text-right'>{{ $dgKol2outlet->proy_PF_noa_outlet }}</td>     

                            <td class='numerik text-right'>{{ number_format($dgKol2outlet->proy_DGKOL2_os_outlet,0) }}</td>
                            <td class='numerik text-right'>{{ $dgKol2outlet->proy_DGKOL2_noa_outlet }}</td>

                            @if($dgKol2outlet->namaoutlet=="Total Area")
                                <td></td>
                            @else
                                @if($dgKol2outlet->selesai==0)
                                    <td class="text-right" style="background-color:#F5CBCB">Belum</td>
                                @else
                                    <td class="text-right" style="background-color:#CBF5CB">Sudah</td>
                                @endif
                            @endif

                        </tr>                        

                    @endforeach
                </table>
    </td>
    </tr>
    </table>







@endsection



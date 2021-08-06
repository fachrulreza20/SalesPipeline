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

      <h4>Summary Pipeline outlet</h4>

    <table>
      <tr>
     <td style="background-color: #f5f5f5; padding: 15px; width: 100%; border-radius: 5px"> 
      <h5>Summary Berdasarkan Segmen/Product</h5>
      <table class="table mt-2 table-bordered table-hover table-sm w-auto my-3">          
        <thead class="table-secondary">

            <tr>
               <th>outlet</th>
               @foreach ($segmens as $row)

                  <th>{{ $row->segmen_ket }}</th>

               @endforeach 
               <th>Total outlet</th>
               <th>NOA Pipeline</th>
            </tr>
        </thead>
        <tbody>
{{--           
          @foreach ($outletpages_segmen_ket as $row) 
            <tr>
              <td class="text-left">{{ $row->outlet_outlet }}</td>
              <td class="text-center">{{ $row->NOA }}</td>
                 @foreach ($segmens as $segmen)
                     <?php $modified_segmen_ket = "OS_".$segmen->modified_segmen_ket; ?>
                    <td class="text-right">{{ number_format($row->{$modified_segmen_ket},0) }}</td>
                 @endforeach               
            </tr>
          @endforeach
 --}}
          <?php
            $table = "";
            $totaloutlet_1 = 0;

            foreach($outletpages_segmen_ket as $row){
            $totaloutlet_1=0;
            $table = $table."\n
                <tr>
                  <td class='text-left'>".$row->outlet_name."</td>";
                  
                     
                     foreach ($segmens as $segmen){ // dinamyc column from table segmens
                         $modified_segmen_ket = 'OS_'.$segmen->modified_segmen_ket; // because in query use "as OS_"
                         $table = $table."<td class='text-right'>".number_format($row->{$modified_segmen_ket},0)."</td>"; // dinamyc column of collection use $collection->{$var}

                         $totaloutlet_1 = $totaloutlet_1 + $row->{$modified_segmen_ket}; 
                     }
                  $table = $table."
                  <td class='text-right'><b>".number_format($totaloutlet_1,0)."</b></td>
                  <td class='text-center'><b>".$row->NOA."</b></td>                    
                </tr>
            ";
            }
            echo $table;
          ?>
        </tbody>
      </table>



















      <br>
      <h5>Summary Berdasarkan Divisi</h5>

      <table class="table mt-2 table-bordered table-hover table-sm w-auto my-3">          
        <thead class="table-secondary">

            <tr>
               <th>outlet</th>
               @foreach ($segmens_divisi_only as $row)

                  <th>{{ $row->divisi }}</th>

               @endforeach 
               <th>Total outlet</th>
               <th>NOA Pipeline</th>
            </tr>
        </thead>
        <tbody>

          <?php
            $table = "";
            $totaloutlet_2 = 0;


            //dd($outletpages_divisi);

            foreach($outletpages_divisi as $row){
            $totaloutlet_2=0;
            $table = $table."\n
                <tr>
                  <td class='text-left'>".$row->outlet_name."</td>";
                  
                     
                     foreach ($segmens_divisi_only as $divisi){ // dinamyc column from table segmens
                         $segmens_divisi = 'OS_'.$divisi->divisi; // because in query use "as OS_"
                         $table = $table."<td class='text-right'>".number_format($row->{$segmens_divisi},0)."</td>"; // dinamyc column of collection use $collection->{$var}

                         $totaloutlet_2 = $totaloutlet_2 + $row->{$segmens_divisi}; 
                     }
                  $table = $table."
                  <td class='text-right'><b>".number_format($totaloutlet_2,0)."</b></td>
                  <td class='text-center'><b>".$row->NOA."</b></td>                    
                </tr>
            ";
            }
            echo $table;
          ?>



        </tbody>
      </table>
    </td></tr></table>


    <br>
    <br>

      <table>
        <tr>
     <td style="background-color: #f5f5f5; padding: 15px; width: 100%; border-radius: 5px"> 

      <br>
      <h5>Summary Berdasarkan Bulan Proyeksi Cair</h5>

      <table class="table mt-2 table-bordered table-hover table-sm w-auto my-3">          
        <thead class="table-secondary">

            <tr>
               <th>outlet</th>
               @foreach ($month_collection as $row)

                  <th><?= date('F', mktime(0, 0, 0, $row->ProyBulanCair, 10))  ?></th>

               @endforeach 
               <th>Total outlet</th>
               <th>NOA Pipeline</th>
            </tr>
        </thead>
        <tbody>

          <?php
            $table = "";
            $totaloutlet_2 = 0;


            //dd($outletpages_bulan_cair);

            foreach($outletpages_bulan_cair as $row){
            $totaloutlet_2=0;
            $table = $table."\n
                <tr>
                  <td class='text-left'>".$row->outlet_name."</td>";
                  
                     
                     foreach ($month_collection as $month){ // dinamyc column from table segmens
                         $bulan_cair = 'OS_'.$month->ProyBulanCair; // because in query use "as OS_"
                         $table = $table."<td class='text-right'>".number_format($row->{$bulan_cair},0)."</td>"; // dinamyc column of collection use $collection->{$var}

                         $totaloutlet_2 = $totaloutlet_2 + $row->{$bulan_cair}; 
                     }
                  $table = $table."
                  <td class='text-right'><b>".number_format($totaloutlet_2,0)."</b></td>
                  <td class='text-center'><b>".$row->NOA."</b></td>                    
                </tr>
            ";
            }
            echo $table;
          ?>



        </tbody>
      </table>















      <br>
      <h5>Summary Berdasarkan Weekly Proyeksi Cair</h5>

      <table class="table mt-2 table-bordered table-hover table-sm w-auto my-3">          
        <thead class="table-secondary">

            <tr>
               <th>outlet</th>
               @foreach ($week_collection as $row)

                  <th>
                    <?= date('F', mktime(0, 0, 0, $row->ProyBulanCair, 10))  ?>
                    - Week {{ $row->ProyWeekCair }}
                  </th>

               @endforeach 
               <th>Total outlet</th>
               <th>NOA Pipeline</th>
            </tr>
        </thead>
        <tbody>

          <?php
            $table = "";
            $totaloutlet_2 = 0;


            //dd($outletpages_bulan_cair);

            foreach($outletpages_week_cair as $row){
            $totaloutlet_2=0;
            $table = $table."\n
                <tr>
                  <td class='text-left'>".$row->outlet_name."</td>";
                  
                     
                     foreach ($week_collection as $week){ // dinamyc column from table segmens
                         $week_cair = 'OS_'.$week->ProyBulanCair.$week->ProyWeekCair; // because in query use "as OS_"
                         $table = $table."<td class='text-right'>".number_format($row->{$week_cair},0)."</td>"; // dinamyc column of collection use $collection->{$var}

                         $totaloutlet_2 = $totaloutlet_2 + $row->{$week_cair}; 
                     }
                  $table = $table."
                  <td class='text-right'><b>".number_format($totaloutlet_2,0)."</b></td>
                  <td class='text-center'><b>".$row->NOA."</b></td>                    
                </tr>
            ";
            }
            echo $table;
          ?>



        </tbody>
      </table>

    </td></tr></table>
    <br>
    <br>
    <br>







@endsection



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

    <table>
      <tr>
         <td style="background-color: #dddddd; padding: 15px; width: 100%; border-radius: 5px"> 
            <a href="/nasabahnpf" class="btn btn-danger mt-2 mb-2"> Update data Nasabah DG NPF</a><br>
            <a href="/nasabahkol2" class="btn btn-warning mt-2 mb-2"> Update data Nasabah DG KOL2</a>
         </td>
       </tr>
     </table>   

     <br>



    <table>
      <tr>
         <td style="background-color: #dddddd; padding: 15px; width: 100%; border-radius: 5px"> 
            <a href="/summarydgnpf" class="btn btn-primary mt-2 mb-2"> Lihat Summary Nasabah DG NPF</a><br>
            <a href="/summarydgkol2" class="btn btn-primary mt-2 mb-2"> Lihat Summary Nasabah DG KOL2</a>
         </td>
       </tr>
     </table>   



@endsection



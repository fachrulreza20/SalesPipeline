<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    {{-- <link href="/css/bootstrap.min.css" rel="stylesheet" type="text/css" integrity="sha384-EVSTQN3azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"> --}}

    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">


    <link href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap5.min.css">


     @yield('assets')


    <style type="text/css">
      td{
        font-family: Calibri;
        font-size: 12px;
      }
      th{
        font-size: 12px;
        text-align: center;
        vertical-align: middle;        
      }
      .text-right{
        text-align: right;
      }
      .text-left{
        text-align: left;
      }
      .text-center{
        text-align: center;
      }
      .badge{
        font-size: 0.9em;
      }
      a{
        text-decoration: none;
      }
      .subtotal > td{
        background-color: #cfcfcf;
      }
    </style>
     
    <title>RegionMedan @yield('title')</title>
  </head>
  <body>

  	@include('layout.navbar')

    <div class="container">

    <br>
    <br>
    <br>
    @yield('container')

    </div>


<script
  src="https://code.jquery.com/jquery-3.6.0.slim.js"
  integrity="sha256-HwWONEZrpuoh951cQD1ov2HUK5zA5DwJ1DNUXaM6FsY="
  crossorigin="anonymous"></script>

      <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.1.0/sweetalert2.min.js"></script>


    @yield('bodybottom')


  </body>

    @yield('afterbodytag')
  
</html>
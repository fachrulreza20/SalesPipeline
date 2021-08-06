          <?php

            if(!Auth::guest()){ // hanya jika sudah login, kalau guest ga usah simpen data nya ke var
              $userRole = Auth::user()->role;              
              $userEmail = Auth::user()->email;
            }


  
          ?>


    <nav class="navbar navbar-expand-lg navbar-light bg-info fixed-top ">
      <div class="container">
        <a class="navbar-brand" href="/">RegionMedan</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav">

@auth            
            <li class="nav-item">
              <a class="nav-link" {{ Request::segment(1) === '' ? ' active ' : null }}  href="/">Home</a>
            </li>
{{-- @if($userRole=='admin') --}}
            <li class="nav-item">
              <a class="nav-link" {{ Request::segment(1) === 'pipeline' ? 'active' : null }} href="/pipeline">Pipeline</a>
            </li>
{{-- @endif --}}
           <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  Kualitas
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <li class="nav-item">
                    <a  class="dropdown-item" {{ Request::segment(1) === 'nasabahnpf' ? 'active' : null }} href="/nasabahnpf">Nasabah DG NPF</a>
                  </li>

                  <li class="nav-item">
                    <a  class="dropdown-item" {{ Request::segment(1) === 'nasabahkol2' ? 'active' : null }} href="/nasabahkol2">Nasabah DG Kol2</a>
                  </li>


                </ul>
              </li>

@endauth


        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Summary
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">

            <li class="nav-item">
              <a  class="dropdown-item" {{ Request::segment(1) === 'summarydgnpf' ? 'active' : null }} href="/summarydgnpf">DG NPF </a>
            </li>

            <li class="nav-item">
              <a  class="dropdown-item" {{ Request::segment(1) === 'summarydgkol2' ? 'active' : null }} href="/summarydgkol2">DG KOL2 </a>
            </li>

            <li class="nav-item">
              <hr/>
            </li>

            <li class="nav-item">
              <a  class="dropdown-item" {{ Request::segment(1) === 'summaryArea' ? 'active' : null }} href="/summaryArea">Pipeline Area</a>
            </li>

            <li class="nav-item">
              <a  class="dropdown-item" {{ Request::segment(1) === 'summaryOutlet' ? 'active' : null }} href="/summaryOutlet">Pipeline Outlet</a>
            </li>

            <li class="nav-item">
              <a  class="dropdown-item" {{ Request::segment(1) === 'summaryMarketing' ? 'active' : null }} href="/summaryMarketing">Pipeline Marketing</a>
            </li>





          </ul>
        </li>
@auth


@if($userRole=='admin')


        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Business
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li class="nav-item">
              <a  class="dropdown-item {{ Request::segment(1) === 'segmen' ? 'active' : null }}" href="/segmen">Segment</a>
            </li>

            <li class="nav-item">
              <a  class="dropdown-item {{ Request::segment(1) === 'progress' ? 'active' : null }}" href="/progress">Progress</a>
            </li>
          </ul>
        </li>


        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Operation
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">

            <li class="nav-item">
              <a  class="dropdown-item {{ Request::segment(1) === 'employee' ? 'active' : null }}" href="/employee">Employee</a>
            </li>

            <li class="nav-item">
              <a  class="dropdown-item {{ Request::segment(1) === 'jabatan' ? 'active' : null }}" href="/jabatan">Jabatan</a>
            </li>

            <li class="nav-item">
              <a  class="dropdown-item {{ Request::segment(1) === 'outlet' ? 'active' : null }}" href="/outlet">Outlet</a>
            </li>

          </ul>
        </li>


@endif

            <li class="nav-item">
              <a class="nav-link text-light" href="/profileEmployee"> Profile {{ $userEmail }} </a>  <!-- you logged as -->
            </li>
          </ul>


          <ul class="nav navbar-nav navbar-right">
            <li>
              
              <a class="btn btn-sm btn-danger" href="/logout"><span class="glyphicon glyphicon-user"></span> Logout</a></li>
              
          </ul>

@endauth

{{-- 
          <ul class="nav navbar-nav navbar-right">
            <li><a class="btn btn-sm btn-secondary" href="/register"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
            <li><a class="btn btn-sm btn-primary mx-2" href="/login"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
          </ul>
 --}}
        </div>
      </div>
    </nav>

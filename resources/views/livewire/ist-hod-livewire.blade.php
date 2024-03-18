<div>


  @livewireStyles()


  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
      <a href="index.html" class="logo d-flex align-items-center nav navbar-brand">
        <img src="{{asset('images/udom.png')}}" alt="" style="width:50px;height:50px;border-radius:50%;object-fit:contain">
        <span class="d-none d-lg-block text-primary">eClassroom</span>
      </a>
      <i class="bi bi-list toggle-sidebar-btn"></i>
    </div><!-- End Logo -->



    <nav class="header-nav ms-auto">

      @if (auth()->check() && auth()->user()->role_id == '4')

      <div class="container justify-content-center px-5">
        <div class="label-username">

        </div>
        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
          {{ Auth::user()->email }}
        </a>

        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">

          <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
              document.getElementById('logout-form').submit();">
            {{ __('Logout') }}
          </a>

          <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
          </form>


        </div>
      </div>

      @endif

    </nav>

  </header><!-- End Header -->


  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link " href="{{asset('cse-hod-view')}}">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li><!-- End Dashboard Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-list"></i><span>Staff management</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="components-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="{{asset('IST')}}">
              <i class="bi bi-person fs-5"></i><span>Add staff</span>
            </a>
          </li>

          <li>
            <a href="{{asset('ist-hod')}}">
              <i class="bi bi-people fs-5"></i><span>View staffs</span>
            </a>
          </li>

        </ul>
      </li><!-- End Components Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#tables-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-gear"></i><span>Profile Information</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="tables-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="{{asset('view-profile')}}">
              <i class="bi bi-person fs-5"></i><span>View profile</span>
            </a>
          </li>

        </ul>
      </li>

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#icons-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-mortarboard fs-5"></i><span>Academics</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="icons-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">

          <li>
            <a href="{{asset('IST/add-ist-courses')}}">
              <i class="bi bi-pencil fs-5"></i><span>Add ist courses</span>
            </a>
          </li>

          <li>
            <a href="{{asset('IST/view-ist-courses')}}">
              <i class="bi bi-book fs-5"></i><span>view ist courses</span>
            </a>
          </li>

          <li>
            <a href="{{asset('IST/add-ist-subjects')}}">
              <i class="bi bi-pencil fs-5"></i><span>Add ist subjects</span>
            </a>
          </li>


          <li>
            <a href="{{asset('IST/view-ist-subjects')}}">
              <i class="bi bi-book fs-5"></i><span>View ist subjects</span>
            </a>
          </li>

        </ul>
      </li><!-- End Components Nav -->
    </ul>

  </aside><!-- End Sidebar-->

  <main id="main" class="main">

    @if(session()->has("deleteOperation"))
    <div role="alert" class="alert alert-success alert-dismissible fade show">
      <strong>{{session("deleteOperation") }}</strong>
      <button class="btn-close" data-bs-dismiss="alert"></button>
    </div>
    @endif

    <div class="pagetitle">
      <h1>Dashboard</h1>
      <h6>Date of today : <span class="fw-bold">{{date("d/m/Y")}}</span></h6>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="#"></a>Home</li>
          <li class="breadcrumb-item active"><a href="{{asset('')}}"> Dashboard</a></li>

        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
      <div class="row">

        <!-- Left side columns -->
        <div class="col-lg-8">
          <div class="row">

            <!-- Sales Card -->
            <div class="col-xxl-4 col-md-6">

            </div><!-- End Sales Card -->

            <!-- Revenue Card -->
            <div class="col-xxl-4 col-md-6">

            </div><!-- End Revenue Card -->

            <!-- Customers Card -->
            <div class="col-xxl-4 col-xl-12">

              <div class="card info-card customers-card">

                <div class="card-body">Computer Science and Engineering Department (CSE) Staffs total <span>| This Year</span></h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-people"></i>
                    </div>
                    <div class="ps-3">
                      <h6>Registered instructors : {{$instructors}}</h6>
                      <span class="text-danger small pt-1 fw-bold">Total</span><span class="text-muted small pt-2 ps-1">Instructors </span>

                    </div>
                  </div>

                </div>

              </div>

            </div><!-- End Customers Card -->

            <!-- Reports -->
            <div class="col-12">

              @livewire('replies-livewire')

            </div><!-- End Reports -->

            <!-- Recent Sales -->
            <div class="col-12">

            </div><!-- End Recent Sales -->

          </div>
        </div><!-- End Left side columns -->

        <!-- Right side columns -->
        <div class="col-lg-4">

          <!-- News & Updates Traffic -->
          <div class="card">

            <div class="card-body pb-0">
              <h5 class="card-title">News &amp; Updates <span>| Today</span></h5>

              <div class="news">
                <div class="post-item clearfix">

                  @if(Session::has("message"))
                  <div role="alert" class="alert alert-success alert-dismissible fade show">
                    <strong>{{ Session("message") }}</strong>
                    <button class="btn-close" data-bs-dismiss="alert"></button>
                  </div>
                  @endif

                  @foreach ($instructorComments as $instructorComment)
                  <h4> <span class="text-success fw-bold"> Instructor's name :</span>{{$instructorComment->instructor->first_name}} {{$instructorComment->instructor->last_name}}</h4>
                  <br>
                  <h4> <span class="text-success fw-bold"> Instructor's comment </h4>
                  <p> {{$instructorComment->instructor_comment}}
                    <span class="text-danger fw-bold">{{$instructorComment->created_at->diffForHumans()}}</span>
                    <button class="text-danger border-0 w-100" onclick="confirm('Are you sure you want to delete this comment ?') || event.stopImmediatePropagation()" wire:click="deleteComments({{$instructorComment->id}})"><i class="bi bi-trash"></i></button>
                  </p>

                  @endforeach

                </div>

              </div><!-- End sidebar recent posts-->

            </div>
          </div><!-- End News & Updates -->

        </div><!-- End Right side columns -->

      </div>
    </section>

    @yield('content')

  </main><!-- End #main -->

  @livewireScripts()


</div>

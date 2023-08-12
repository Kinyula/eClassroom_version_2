<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title> Instructor | Dashboard</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="{{asset('images/udom.png')}}" rel="icon" class="udom-favicon-icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">
<!-- font awesome fonts -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
  <link rel="stylesheet" href="{{asset('fontAwesome/css/all.css')}}">
  <!-- Vendor CSS Files -->
  @vite(['resources/sass/app.scss', 'resources/css/app.css','resources/js/app.js'])
  <link href="{{asset('assets/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
  <link href="{{asset('assets/vendor/bootstrap-icons/bootstrap-icons.css')}}" rel="stylesheet">
  <link href="{{asset('assets/vendor/boxicons/css/boxicons.min.css')}}" rel="stylesheet">
   <link href="{{asset('assets/vendor/quill/quill.snow.css')}}" rel="stylesheet"> 
 <link href="{{asset('assets/vendor/quill/quill.bubble.css')}}" rel="stylesheet"> 
  <link href="{{asset('assets/vendor/remixicon/remixicon.css')}}" rel="stylesheet">
   <link href="{{asset('assets/vendor/simple-datatables/style.css')}}" rel="stylesheet"> 

  <!-- Template Main CSS File -->
  <!-- <link href="{{asset('assets/css/style.css')}}" rel="stylesheet"> -->


</head>

  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
      <a href="" class="logo d-flex align-items-center nav navbar-brand">
        <img src="{{asset('images/udom.png')}}" alt="" style="width:50px;height:50px;border-radius:50%;object-fit:contain">
        <span class="d-none d-lg-block text-primary">eClassroom</span>
      </a>
      <i class="bi bi-list toggle-sidebar-btn"></i>
    </div><!-- End Logo -->



    <nav class="header-nav ms-auto">

        @if (auth()->check() && auth()->user()->role_id == '6')

                <div class="container justify-content-center px-5">
                              <div class="label-username">
                                
                              </div>
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->email }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">

                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
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
        <a class="nav-link " href="{{asset('cse-instructor')}}">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li><!-- End Dashboard Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-menu-button-wide"></i><span>Activities</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="components-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="{{asset('')}}">
              <i class="bi bi-circle"></i><span>Report</span>
            </a>
          </li>

          <li>
            <a href="{{asset('view_cse_materials')}}">
              <i class="bi bi-circle"></i><span>View cse materials</span>
            </a>
          </li>

        </ul>
      </li><!-- End Components Nav -->


    </ul>

  </aside><!-- End Sidebar-->

  <main id="main" class="main">

  @if(Session::has("deleteOperation"))
  <div role="alert" class="alert alert-success alert-dismissible fade show">
    <strong>{{ Session::get("deleteOperation") }}</strong>
    <button class="btn-close" data-bs-dismiss="alert"></button>
  </div>
  @endif
  
  <div class="pagetitle">
  <h1>Dashboard</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="index.html">Home</a></li>
      <li class="breadcrumb-item active">Dashboard</li>
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

            <div class="filter">
              <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
              <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                <li class="dropdown-header text-start">
                  <h6>Filter</h6>
                </li>

                <li><a class="dropdown-item" href="#">Today</a></li>
                <li><a class="dropdown-item" href="#">This Month</a></li>
                <li><a class="dropdown-item" href="#">This Year</a></li>
              </ul>
            </div>



            <div class="card-body"> <span>| This Year</span></h5>

              <div class="d-flex align-items-center">
                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                  <i class="bi bi-people"></i>
                </div>
                
                <div class="ps-3">
                    @foreach ($instructors as $instructor)
                    <h6>{{$instructor->first_name }}</h6>    
                    @endforeach

                  <span class="text-danger small pt-1 fw-bold">12%</span> <span class="text-muted small pt-2 ps-1">decrease</span>

                </div>
              </div>

            </div>

          </div>

        </div><!-- End Customers Card -->

        <!-- Reports -->
        <div class="col-12">
          <div class="card p-3">
;
            <div class="filter">
              <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
              <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                <li class="dropdown-header text-start">
                  <h6>Filter</h6>
                </li>

                <li><a class="dropdown-item" href="#">Today</a></li>
                <li><a class="dropdown-item" href="#">This Month</a></li>
                <li><a class="dropdown-item" href="#">This Year</a></li>
              </ul>
            </div>
            @if (session::has("addedComment"))
    <div role="alert" class="alert alert-success  alert-dismissible fade show">
<strong>{{session::get("addedComment")}}</strong>
<button class="btn btn-close" data-bs-dismiss="alert"></button>
    </div>
  @endif
<form action="{{route('comment')}}" method="post">
  @csrf

<h2>Write comments here</h2>
<textarea name="comment" id="" cols="30" rows="10" class="form-control" placeholder="Comments"></textarea>

<button type="submit"  class="btn btn-primary my-5"><i class="fa-solid fa-message p-2"></i>Add comment</button>
</form>

          </div>
        </div><!-- End Reports -->

        <!-- Recent Sales -->
        <div class="col-12">
          <div class="card recent-sales overflow-auto">

            <div class="filter">
              <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
              <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                <li class="dropdown-header text-start">
                  <h6>Filter</h6>
                </li>

                <li><a class="dropdown-item" href="#">Today</a></li>
                <li><a class="dropdown-item" href="#">This Month</a></li>
                <li><a class="dropdown-item" href="#">This Year</a></li>
              </ul>
            </div>

          </div>
        </div><!-- End Recent Sales -->



      </div>
    </div><!-- End Left side columns -->

    <!-- Right side columns -->
    <div class="col-lg-4">

      <!-- Recent Activity -->
      <div class="card">
        <div class="filter">
          <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
            <li class="dropdown-header text-start">
              <h6>Filter</h6>
            </li>

            <li><a class="dropdown-item" href="#">Today</a></li>
            <li><a class="dropdown-item" href="#">This Month</a></li>
            <li><a class="dropdown-item" href="#">This Year</a></li>
          </ul>
        </div>


      </div><!-- End Recent Activity -->




      <!-- News & Updates Traffic -->
      <div class="card">
        <div class="filter">
          <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
            <li class="dropdown-header text-start">
              <h6>Filter</h6>
            </li>

            <li><a class="dropdown-item" href="#">Today</a></li>
            <li><a class="dropdown-item" href="#">This Month</a></li>
            <li><a class="dropdown-item" href="#">This Year</a></li>
          </ul>
        </div>

        <div class="card-body pb-0">
          <h5 class="card-title">Materials <span>| Today</span></h5>

          <div class="news">
            <div class="post-item clearfix">
            <form action="{{route('uploadSubject')}}" method="post" enctype="multipart/form-data">
               @csrf
               <div class="d-block">
                <label for="" ></label>
                <select name="semesters" id="semesters" class="form-select">

                <option value="">-- Choose Semester name --</option>

                @foreach ($semesters as $semester)
                <option value="{{$semester->id}}">{{$semester->semester_name}}</option>

                @error('semesters')
                  <strong class="text-danger">{{$message}}</strong>
                @enderror
                @endforeach

                </select>
                </div>

                <div class="d-block">
                <label for="" ></label>
                <select name="departments" id="semesters" class="form-select">

                <option value="">-- Choose department name --</option>

                @foreach ($departments as $department)
                <option value="{{$department->id}}">{{$department->department_name}}</option>

                @error('departments')
                  <strong class="text-danger">{{$message}}</strong>
                @enderror
                @endforeach

                </select>
                </div>

                <div class="d-block">
                <label for="" ></label>
                <select name="subjects" id="" class="form-select">

                <option value="">-- Choose Subject name --</option>

                @foreach ($subjects as $subject)
                <option value="{{$subject->id}}">{{$subject->subject_name}}</option>

                @error('subjects')
                  <strong class="text-danger">{{$message}}</strong>
                @enderror
                @endforeach

                </select>
                </div>

                <div class="d-block">
                <label for="" ></label>
                <select name="years" id="" class="form-select">

                <option value="">-- Choose year  --</option>

                @foreach ($years as $year)
                <option value="{{$year->id}}">{{$year->status_description}}</option>

                @error('years')
                  <strong class="text-danger">{{$message}}</strong>
                @enderror
                @endforeach

                </select>
                </div>


                <label for="" ></label>
                <label for="" class="mt-3">Upload lecture/Books</label>
                <input type="file" name="file" id="file" class="form-control mb-2">

                @error('file')
                <strong class="text-danger">{{$message}}</strong>
                @enderror
                
                  <div class="d-block p-2">
                  <button type="submit" class="btn btn-sm btn-primary"><i class="fas fa-edit p-1"></i> Add materials</button>

                </div>

                </form>

            </div>


>

          </div><!-- End sidebar recent posts-->

        </div>
      </div><!-- End News & Updates -->

    </div><!-- End Right side columns -->

  </div>
</section>
@yield('content')

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">
    <div class="copyright">
      &copy; Copyright <strong><span>University of Dodoma</span></strong>. All Rights Reserved
    </div>
    <div class="credits">

      Designed by <a href="https://bootstrapmade.com/">Victor.Z.Kinyula</a>
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="{{asset('assets/vendor/apexcharts/apexcharts.min.js')}}"></script>
  <!-- <script src="{{asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script> -->
  <script src="{{asset('assets/vendor/chart.js/chart.umd.js')}}"></script>
  <script src="{{asset('assets/vendor/echarts/echarts.min.js')}}"></script>
  <script src="{{asset('assets/vendor/quill/quill.min.js')}}"></script>
  <script src="{{asset('assets/vendor/simple-datatables/simple-datatables.js')}}"></script>
  <script src="{{asset('assets/vendor/tinymce/tinymce.min.js')}}"></script>
  <script src="{{asset('assets/vendor/php-email-form/validate.js')}}"></script>

  <!-- Template Main JS File -->
  <script src="{{asset('assets/js/main.js')}}"></script>



</html>
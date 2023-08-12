<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Admin | Dashboard</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="{{asset('images/udom.png')}}" rel="icon" class="udom-favicon-icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">
<!-- font awesome fonts -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="stylesheet" href="{{asset('fontAwesome/css/all.css')}}">
  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

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
  <link href="{{asset('assets/css/style.css')}}" rel="stylesheet">


</head>

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
         
        @if ((auth()->check() && auth()->user()->role_id == '3') || (auth()->check() && auth()->user()->role_id == '3'))

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
    @auth
  @if (auth()->user()->role_id == '3')
      <li class="nav-item">
        <a class="nav-link " href="{{asset('cse-hod-view')}}">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li><!-- End Dashboard Nav -->

    
@auth
  
@if (auth()->user()->role_id === '3')

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-menu-button-wide"></i><span>Staff management</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="components-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="{{asset('ETE')}}">
              <i class="bi bi-circle"></i><span>Add staff</span>
            </a>
          </li>
          <li>
            <a href="{{asset('viewstaff')}}">
              <i class="bi bi-circle"></i><span>View staff</span>
            </a>
          </li>

          @endif
          
          @endauth
        </ul>
      </li><!-- End Components Nav -->
      @endif

 
      
      
      @endauth

    
    </ul>

  </aside><!-- End Sidebar-->


  <!-- NEW CODE -->

 @if (auth()->check() && auth()->user()->role_id == '4')
  <header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
      <a href="index.html" class="logo d-flex align-items-center nav navbar-brand">
        <img src="{{asset('images/udom.png')}}" alt="" style="width:50px;height:50px;border-radius:50%;object-fit:contain">
        <span class="d-none d-lg-block text-primary">eClassroom</span>
      </a>
      <i class="bi bi-list toggle-sidebar-btn"></i>
    </div><!-- End Logo -->



    <nav class="header-nav ms-auto">
         
        @if ((auth()->check() && auth()->user()->role_id == '4'))

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
    @auth
  @if (auth()->user()->role_id == '4')
      <li class="nav-item">
        <a class="nav-link " href="{{asset('ist-hod-view')}}">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li><!-- End Dashboard Nav -->

    
@auth
  
@if (auth()->user()->role_id === '4')

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-menu-button-wide"></i><span>Staff management</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="components-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="{{asset('IST')}}">
              <i class="bi bi-circle"></i><span>Add staff</span>
            </a>
          </li>
          <li>
            <a href="{{asset('ist-hod')}}">
              <i class="bi bi-circle"></i><span>View staff</span>
            </a>
          </li>

          @endif
          
          @endauth
        </ul>
      </li><!-- End Components Nav -->
      @endif

 
      
      
      @endauth

    
    </ul>
@endif
  </aside><!-- End Sidebar-->
  <!-- END CODE -->

  <!-- MORE CODE -->
  @if (auth()->check() && auth()->user()->role_id == '2')
  <header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
      <a href="index.html" class="logo d-flex align-items-center nav navbar-brand">
        <img src="{{asset('images/udom.png')}}" alt="" style="width:50px;height:50px;border-radius:50%;object-fit:contain">
        <span class="d-none d-lg-block text-primary">eClassroom</span>
      </a>
      <i class="bi bi-list toggle-sidebar-btn"></i>
    </div><!-- End Logo -->



    <nav class="header-nav ms-auto">
         
        @if ((auth()->check() && auth()->user()->role_id == '2'))

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
    @auth
  @if (auth()->user()->role_id == '2')
      <li class="nav-item">
        <a class="nav-link " href="{{asset('ete-hod-view')}}">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li><!-- End Dashboard Nav -->

    
@auth
  
@if (auth()->user()->role_id == '2')

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-menu-button-wide"></i><span>Staff management</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="components-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="{{asset('ETE')}}">
              <i class="bi bi-circle"></i><span>Add staff</span>
            </a>
          </li>
          <li>
            <a href="{{asset('viewstaff')}}">
              <i class="bi bi-circle"></i><span>View staff</span>
            </a>
          </li>

          @endif
          
          @endauth
        </ul>
      </li><!-- End Components Nav -->
      @endif


      @endauth

    
    </ul>
@endif
  </aside><!-- End Sidebar-->
  <!-- END OF MORE CODE -->

  <!-- START VIEW MATERIALS HEADER AND SIDEBAR -->
  @if (auth()->check() && auth()->user()->role_id == '5')
  <header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
      <a href="index.html" class="logo d-flex align-items-center nav navbar-brand">
        <img src="{{asset('images/udom.png')}}" alt="" style="width:50px;height:50px;border-radius:50%;object-fit:contain">
        <span class="d-none d-lg-block text-primary">eClassroom</span>
      </a>
      <i class="bi bi-list toggle-sidebar-btn"></i>
    </div><!-- End Logo -->



    <nav class="header-nav ms-auto">
         
        @if ((auth()->check() && auth()->user()->role_id == '5'))

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
    @auth
  @if (auth()->user()->role_id == '5')
      <li class="nav-item">
        <a class="nav-link " href="{{asset('ete-instructor')}}">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li><!-- End Dashboard Nav -->

    
@auth
  
@if (auth()->user()->role_id == '5')

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
            <a href="{{asset('view_materials')}}">
              <i class="bi bi-circle"></i><span>View materials</span>
            </a>
          </li>

          @endif
          
          @endauth
        </ul>
      </li><!-- End Components Nav -->
      @endif


      @endauth

    
    </ul>
@endif
  </aside><!-- End Sidebar-->
  <!-- END VIEW MATERIALS HEADER AND SIDEBAR -->

   <!-- START CSE VIEW MATERIALS HEADER AND SIDEBAR -->
   @if (auth()->check() && auth()->user()->role_id == '6')
  <header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
      <a href="" class="logo d-flex align-items-center nav navbar-brand">
        <img src="{{asset('images/udom.png')}}" alt="" style="width:50px;height:50px;border-radius:50%;object-fit:contain">
        <span class="d-none d-lg-block text-primary">eClassroom</span>
      </a>
      <i class="bi bi-list toggle-sidebar-btn"></i>
    </div><!-- End Logo -->



    <nav class="header-nav ms-auto">
         
        @if ((auth()->check() && auth()->user()->role_id == '6'))

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
    @auth
  @if (auth()->user()->role_id == '6')
      <li class="nav-item">
        <a class="nav-link " href="{{asset('ete-instructor')}}">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li><!-- End Dashboard Nav -->

    
@auth
  
@if (auth()->user()->role_id == '6')

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
            <a href="{{asset('view_materials')}}">
              <i class="bi bi-circle"></i><span>View materials</span>
            </a>
          </li>

          @endif
          
          @endauth
        </ul>
      </li><!-- End Components Nav -->
      @endif


      @endauth

    
    </ul>
@endif
  </aside><!-- End Sidebar-->
  <!-- END VIEW CSE MATERIALS HEADER AND SIDEBAR -->
  <main id="main" class="main">
@yield('content')
  </main>

  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">
    <div class="copyright">
      &copy; Copyright <strong><span>University of Dodoma</span></strong>. All Rights Reserved
    </div>
    <div class="credits">

      Designed by <a href="https://bootstrapmade.com/">Victor . Z . Kinyula</a>
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
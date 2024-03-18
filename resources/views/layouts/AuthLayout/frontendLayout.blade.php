<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>UDOM | Dashboard</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="{{ asset('images/favicon.ico') }}" rel="icon" class="udom-favicon-icon">
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">
    <!-- font awesome fonts -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="{{ asset('fontAwesome/css/all.css') }}">
    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    @vite(['resources/sass/app.scss', 'resources/css/app.css', 'resources/js/app.js'])
    <link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/quill/quill.snow.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/quill/quill.bubble.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/remixicon/remixicon.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/simple-datatables/style.css') }}" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">

    @livewireStyles
    @livewireScripts
</head>

<body>

    <!-- ======= Header ======= -->
    @if (auth()->check() && auth()->user()->role_id == '3')
        <header id="header" class="header fixed-top d-flex align-items-center">

            <div class="d-flex align-items-center justify-content-between">
                <a href="#" class="logo d-flex align-items-center nav navbar-brand">
                    <img src="{{ asset('images/udom.png') }}" alt=""
                        style="width:50px;height:50px;border-radius:50%;object-fit:contain">
                    <span class="d-none d-lg-block text-primary">eClassroom</span>
                </a>
                <i class="bi bi-list toggle-sidebar-btn"></i>
            </div><!-- End Logo -->



            <nav class="header-nav ms-auto">

                @if (auth()->check() && auth()->user()->role_id == '3')
                    <div class="container justify-content-center px-5">
                        <div class="label-username">

                        </div>
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
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
    @endif

    @if (auth()->check() && auth()->user()->role_id == '3')
        <!-- ======= Sidebar ======= -->
        <aside id="sidebar" class="sidebar">

            <ul class="sidebar-nav" id="sidebar-nav">
                @auth
                    @if (auth()->user()->role_id == '3')
                        <li class="nav-item">
                            <a class="nav-link " href="{{ asset('cse-hod-view') }}">
                                <i class="bi bi-grid"></i>
                                <span>Dashboard</span>
                            </a>
                        </li><!-- End Dashboard Nav -->


                        @auth

                            @if (auth()->user()->role_id === '3')
                                <li class="nav-item">
                                    <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse"
                                        href="#">
                                        <i class="fas fa-tasks"></i><span>Staff management</span><i
                                            class="bi bi-chevron-down ms-auto"></i>
                                    </a>
                                    <ul id="components-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                                        <li>
                                            <a href="{{ asset('CSE') }}">
                                                <i class="bi bi-person fs-5"></i><span>Add staff</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{{ asset('cse-hod') }}">
                                                <i class="bi bi-people fs-5"></i><span>View staff</span>
                                            </a>
                                        </li>
                            @endif

                        @endauth
                </ul>
                </li><!-- End Components Nav -->
                <li class="nav-item">
                    <a class="nav-link collapsed" data-bs-target="#tables-nav" data-bs-toggle="collapse" href="#">
                        <i class="bi bi-gear"></i><span>Profile Information</span><i class="bi bi-chevron-down ms-auto"></i>
                    </a>
                    <ul id="tables-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                        <li>
                            <a href="{{ asset('view-profile') }}">
                                <i class="bi bi-person fs-5"></i><span>View profile</span>
                            </a>
                        </li>

                    </ul>
                </li>

                <li class="nav-item">
                    <a class="nav-link collapsed" data-bs-target="#icons-nav" data-bs-toggle="collapse" href="#">
                        <i class="bi bi-mortarboard fs-5"></i><span>Academics</span><i
                            class="bi bi-chevron-down ms-auto"></i>
                    </a>
                    <ul id="icons-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">

                        <li>
                            <a href="{{ asset('CSE/add-cse-courses') }}">
                                <i class="bi bi-pencil fs-5"></i><span>Add cse courses</span>
                            </a>
                        </li>

                        <li>
                            <a href="{{ asset('CSE/view-cse-courses') }}">
                                <i class="bi bi-book fs-5"></i><span>view cse courses</span>
                            </a>
                        </li>

                        <li>
                            <a href="{{ asset('CSE/add-cse-subjects') }}">
                                <i class="bi bi-pencil fs-5"></i><span>Add cse subjects</span>
                            </a>
                        </li>


                        <li>
                            <a href="{{ asset('CSE/view-cse-subjects') }}">
                                <i class="bi bi-book fs-5"></i><span>View cse subjects</span>
                            </a>
                        </li>

                    </ul>
                </li><!-- End Components Nav -->
        @endif

    @endauth

    </ul>

    </aside><!-- End Sidebar-->
    @endif

    {{-- START OF THE CODE WHOSE ROLE IS 2 --}}
    <!-- ======= Header ======= -->

    @if (auth()->check() && auth()->user()->role_id == '2')
        <header id="header" class="header fixed-top d-flex align-items-center">

            <div class="d-flex align-items-center justify-content-between">
                <a href="#" class="logo d-flex align-items-center nav navbar-brand">
                    <img src="{{ asset('images/udom.png') }}" alt=""
                        style="width:50px;height:50px;border-radius:50%;object-fit:contain">
                    <span class="d-none d-lg-block text-primary">eClassroom</span>
                </a>
                <i class="bi bi-list toggle-sidebar-btn"></i>
            </div><!-- End Logo -->



            <nav class="header-nav ms-auto">

                @if (auth()->check() && auth()->user()->role_id == '2')
                    <div class="container justify-content-center px-5">
                        <div class="label-username">

                        </div>
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
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
    @endif
    <!-- ======= Sidebar ======= -->

    @if (auth()->user()->role_id == '2')
        <aside id="sidebar" class="sidebar">

            <ul class="sidebar-nav" id="sidebar-nav">
                @auth
                    @if (auth()->user()->role_id == '2')
                        <li class="nav-item">
                            <a class="nav-link " href="{{ asset('ete-hod-view') }}">
                                <i class="bi bi-grid"></i>
                                <span>Dashboard</span>
                            </a>
                        </li><!-- End Dashboard Nav -->


                        @auth

                            @if (auth()->user()->role_id === '2')
                                <li class="nav-item">
                                    <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse"
                                        href="#">
                                        <i class="fas fa-tasks"></i><span>Staff management</span><i
                                            class="bi bi-chevron-down ms-auto"></i>
                                    </a>
                                    <ul id="components-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                                        <li>
                                            <a href="{{ asset('ETE') }}">
                                                <i class="bi bi-person fs-5"></i><span>Add ete staff</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{{ asset('viewstaff') }}">
                                                <i class="bi bi-people fs-5"></i><span>View ete staff</span>
                                            </a>
                                        </li>
                            @endif


                        @endauth
                </ul>
                </li><!-- End Components Nav -->
        @endif

        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#tables-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-gear"></i><span>Profile Information</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="tables-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                <li>
                    <a href="{{ asset('view-profile') }}">
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
                    <a href="{{ asset('ETE/add-ete-courses') }}">
                        <i class="bi bi-pencil fs-5"></i><span>Add ete courses</span>
                    </a>
                </li>

                <li>
                    <a href="{{ asset('ETE/view-ete-courses') }}">
                        <i class="bi bi-book fs-5"></i><span>view ete courses</span>
                    </a>
                </li>

                <li>
                    <a href="{{ asset('ETE/add-ete-subjects') }}">
                        <i class="bi bi-pencil fs-5"></i><span>Add ete subjects</span>
                    </a>
                </li>


                <li>
                    <a href="{{ asset('ETE/view-ete-subjects') }}">
                        <i class="bi bi-book fs-5"></i><span>View ete subjects</span>
                    </a>
                </li>

            </ul>
        </li><!-- End Components Nav -->
    @endauth

    </ul>

    </aside><!-- End Sidebar-->
    @endif
    <!-- END OF CODE WHOSE ROLE IS 2 -->

    <!-- NEW CODE -->

    @if (auth()->check() && auth()->user()->role_id == '4')
        <header id="header" class="header fixed-top d-flex align-items-center">

            <div class="d-flex align-items-center justify-content-between">
                <a href="#" class="logo d-flex align-items-center nav navbar-brand">
                    <img src="{{ asset('images/udom.png') }}" alt=""
                        style="width:50px;height:50px;border-radius:50%;object-fit:contain">
                    <span class="d-none d-lg-block text-primary">eClassroom</span>
                </a>
                <i class="bi bi-list toggle-sidebar-btn"></i>
            </div><!-- End Logo -->



            <nav class="header-nav ms-auto">

                @if (auth()->check() && auth()->user()->role_id == '4')
                    <div class="container justify-content-center px-5">
                        <div class="label-username">

                        </div>
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
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
                            <a class="nav-link " href="{{ asset('ist-hod-view') }}">
                                <i class="bi bi-grid"></i>
                                <span>Dashboard</span>
                            </a>
                        </li><!-- End Dashboard Nav -->


                        @auth

                            @if (auth()->user()->role_id === '4')
                                <li class="nav-item">
                                    <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse"
                                        href="#">
                                        <i class="bi bi-list"></i><span>Staff management</span><i
                                            class="bi bi-chevron-down ms-auto"></i>
                                    </a>
                                    <ul id="components-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                                        <li>
                                            <a href="{{ asset('IST') }}">
                                                <i class="bi bi-circle"></i><span>Add staff</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{{ asset('ist-hod') }}">
                                                <i class="bi bi-circle"></i><span>View staff</span>
                                            </a>
                                        </li>
                            @endif

                        @endauth
                </ul>
                </li><!-- End Components Nav -->
        @endif

    @endauth
    <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#tables-nav" data-bs-toggle="collapse" href="#">
            <i class="bi bi-gear"></i><span>Profile Information</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="tables-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
            <li>
                <a href="{{ asset('view-profile') }}">
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
                <a href="{{ asset('IST/add-ist-courses') }}">
                    <i class="bi bi-pencil fs-5"></i><span>Add ist courses</span>
                </a>
            </li>

            <li>
                <a href="{{ asset('IST/view-ist-courses') }}">
                    <i class="bi bi-book fs-5"></i><span>view ist courses</span>
                </a>
            </li>

            <li>
                <a href="{{ asset('IST/add-ist-subjects') }}">
                    <i class="bi bi-pencil fs-5"></i><span>Add ist subjects</span>
                </a>
            </li>


            <li>
                <a href="{{ asset('IST/view-ist-subjects') }}">
                    <i class="bi bi-book fs-5"></i><span>View ist subjects</span>
                </a>
            </li>

        </ul>
    </li><!-- End Components Nav -->
    </ul>
    @endif
    </aside><!-- End Sidebar-->
    <!-- END CODE -->


    <!-- START VIEW MATERIALS HEADER AND SIDEBAR -->
    @if (auth()->check() && auth()->user()->role_id == '5')
        <header id="header" class="header fixed-top d-flex align-items-center">

            <div class="d-flex align-items-center justify-content-between">
                <a href="" class="logo d-flex align-items-center nav navbar-brand">
                    <img src="{{ asset('images/udom.png') }}" alt=""
                        style="width:50px;height:50px;border-radius:50%;object-fit:contain">
                    <span class="d-none d-lg-block text-primary">eClassroom</span>
                </a>
                <i class="bi bi-list toggle-sidebar-btn"></i>
            </div><!-- End Logo -->

            <nav class="header-nav ms-auto">

                @if (auth()->check() && auth()->user()->role_id == '5')
                    <div class="container justify-content-center px-5">
                        <div class="label-username">

                        </div>
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
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
                            <a class="nav-link " href="{{ asset('ete-instructor') }}">
                                <i class="bi bi-grid"></i>
                                <span>Dashboard</span>
                            </a>
                        </li><!-- End Dashboard Nav -->


                        @auth

                            @if (auth()->user()->role_id == '5')
                                <li class="nav-item">
                                    <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse"
                                        href="#">
                                        <i class="bi bi-list"></i><span>Activities</span><i
                                            class="bi bi-chevron-down ms-auto"></i>
                                    </a>
                                    <ul id="components-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">

                                        <li>
                                            <a href="{{ asset('view_materials') }}">
                                                <i class="bi bi-book"></i><span>View materials</span>
                                            </a>
                                        </li>
                            @endif

                        @endauth
                </ul>
                </li><!-- End Components Nav -->
        @endif


    @endauth
    <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#tables-nav" data-bs-toggle="collapse" href="#">
            <i class="bi bi-gear"></i><span>Profile Information</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="tables-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
            <li>
                <a href="{{ asset('view-profile') }}">
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
                <a href="{{ asset('ETE/add-ete-courses') }}">
                    <i class="bi bi-pencil fs-5"></i><span>Add ete courses</span>
                </a>
            </li>

            <li>
                <a href="{{ asset('ETE/view-ete-courses') }}">
                    <i class="bi bi-book fs-5"></i><span>view ete courses</span>
                </a>
            </li>

            <li>
                <a href="{{ asset('ETE/add-ete-subjects') }}">
                    <i class="bi bi-pencil fs-5"></i><span>Add ete subjects</span>
                </a>
            </li>


            <li>
                <a href="{{ asset('ETE/view-ete-subjects') }}">
                    <i class="bi bi-book fs-5"></i><span>View ete subjects</span>
                </a>
            </li>

        </ul>
    </li><!-- End Components Nav -->

    <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#charts-nav" data-bs-toggle="collapse" href="#">
            <i class="bi bi-people"></i><span>View ETE Students </span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="charts-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">

            <li>
                <a href="{{ asset('ETE/view-ete-students') }}">
                    <i class="bi bi-person fs-5"></i><span>View students</span>
                </a>
            </li>


        </ul>
    </li>
    </ul>
    @endif
    </aside><!-- End Sidebar-->
    <!-- END VIEW MATERIALS HEADER AND SIDEBAR -->

    <!-- START CSE VIEW MATERIALS HEADER AND SIDEBAR -->
    @if (auth()->check() && auth()->user()->role_id == '6')
        <header id="header" class="header fixed-top d-flex align-items-center">

            <div class="d-flex align-items-center justify-content-between">
                <a href="" class="logo d-flex align-items-center nav navbar-brand">
                    <img src="{{ asset('images/udom.png') }}" alt=""
                        style="width:50px;height:50px;border-radius:50%;object-fit:contain">
                    <span class="d-none d-lg-block text-primary">eClassroom</span>
                </a>
                <i class="bi bi-list toggle-sidebar-btn"></i>
            </div><!-- End Logo -->

            <nav class="header-nav ms-auto">

                @if (auth()->check() && auth()->user()->role_id == '6')
                    <div class="container justify-content-center px-5">
                        <div class="label-username">

                        </div>
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
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
                            <a class="nav-link " href="{{ asset('cse-instructor') }}">
                                <i class="bi bi-grid"></i>
                                <span>Dashboard</span>
                            </a>
                        </li><!-- End Dashboard Nav -->

                        @auth

                            @if (auth()->user()->role_id == '6')
                                <li class="nav-item">
                                    <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse"
                                        href="#">
                                        <i class="bi bi-list"></i><span>Activities</span><i
                                            class="bi bi-chevron-down ms-auto"></i>
                                    </a>
                                    <ul id="components-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">

                                        <li>
                                            <a href="{{ asset('view_cse_materials') }}">
                                                <i class="bi bi-book fs-5"></i><span>View cse materials</span>
                                            </a>
                                        </li>

                                    </ul>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link collapsed" data-bs-target="#tables-nav" data-bs-toggle="collapse"
                                        href="#">
                                        <i class="bi bi-gear"></i><span>Profile Information</span><i
                                            class="bi bi-chevron-down ms-auto"></i>
                                    </a>
                                    <ul id="tables-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">

                                        <li>
                                            <a href="{{ asset('view-profile') }}">
                                                <i class="bi bi-person fs-5"></i><span>View profile</span>
                                            </a>
                                        </li>
                            @endif

                        @endauth
                </ul>
                </li>

                <!-- End Components Nav -->

                <li class="nav-item">
                    <a class="nav-link collapsed" data-bs-target="#icons-nav" data-bs-toggle="collapse" href="#">
                        <i class="bi bi-pencil-square"></i><span>Quiz activities</span><i
                            class="bi bi-chevron-down ms-auto"></i>
                    </a>
                    <ul id="icons-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">


                        <li>
                            <a href="{{ asset('CSE/make-quiz') }}">
                                <i class="bi bi-pen fs-5"></i><span>Make quiz question</span>
                            </a>
                        </li>

                        <li>
                            <a href="{{ asset('CSE/make-quiz-answer-options') }}">
                                <i class="bi bi-pen fs-5"></i><span>Make quiz answer options</span>
                            </a>
                        </li>
                    </ul>
                </li>
        @endif

    @endauth

    <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#forms-nav" data-bs-toggle="collapse" href="#">
            <i class="bi bi-people"></i><span>View CSE Students </span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="forms-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">

            <li>
                <a href="{{ asset('CSE/view-cse-students') }}">
                    <i class="bi bi-person fs-5"></i><span>View students</span>
                </a>
            </li>


        </ul>
    </li>

    </ul>
    @endif
    </aside><!-- End Sidebar-->
    <!-- END VIEW CSE MATERIALS HEADER AND SIDEBAR -->

    <!-- START IST VIEW MATERIALS HEADER AND SIDEBAR -->
    @if (auth()->check() && auth()->user()->role_id == '7')
        <header id="header" class="header fixed-top d-flex align-items-center">

            <div class="d-flex align-items-center justify-content-between">
                <a href="" class="logo d-flex align-items-center nav navbar-brand">
                    <img src="{{ asset('images/udom.png') }}" alt=""
                        style="width:50px;height:50px;border-radius:50%;object-fit:contain">
                    <span class="d-none d-lg-block text-primary">eClassroom</span>
                </a>
                <i class="bi bi-list toggle-sidebar-btn"></i>
            </div><!-- End Logo -->



            <nav class="header-nav ms-auto">

                @if (auth()->check() && auth()->user()->role_id == '7')
                    <div class="container justify-content-center px-5">
                        <div class="label-username">

                        </div>
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
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
                    @if (auth()->user()->role_id == '7')
                        <li class="nav-item">
                            <a class="nav-link " href="{{ asset('ist-instructor') }}">
                                <i class="bi bi-grid"></i>
                                <span>Dashboard</span>
                            </a>
                        </li><!-- End Dashboard Nav -->


                        @auth

                            @if (auth()->user()->role_id == '7')
                                <li class="nav-item">
                                    <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse"
                                        href="#">
                                        <i class="bi bi-list"></i><span>Activities</span><i
                                            class="bi bi-chevron-down ms-auto"></i>
                                    </a>
                                    <ul id="components-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">

                                        <li>
                                            <a href="{{ asset('view_ist_materials') }}">
                                                <i class="bi bi-book fs-5"></i><span>View ist materials</span>
                                            </a>
                                        </li>



                                    </ul>
                                </li>
                            @endif

                        @endauth

                        <!-- End Components Nav -->
                        <li class="nav-item">
                            <a class="nav-link collapsed" data-bs-target="#tables-nav" data-bs-toggle="collapse"
                                href="#">
                                <i class="bi bi-gear"></i><span>Profile Information</span><i
                                    class="bi bi-chevron-down ms-auto"></i>
                            </a>
                            <ul id="tables-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">

                                <li>
                                    <a href="{{ asset('view-profile') }}">
                                        <i class="bi bi-person fs-5"></i><span>View profile</span>
                                    </a>
                                </li>
                    @endif

                @endauth
            </ul>
            </li>

            <li class="nav-item">
                <a class="nav-link collapsed" data-bs-target="#charts-nav" data-bs-toggle="collapse" href="#">
                    <i class="bi bi-pencil-square"></i><span>Quiz activities</span><i
                        class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="charts-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">


                    <li>
                        <a href="{{ asset('IST/make-ist-quiz') }}">
                            <i class="bi bi-pen fs-5"></i><span>Make ist quiz question</span>
                        </a>
                    </li>

                    <li>
                        <a href="{{ asset('IST/make-ist-quiz-answer-options') }}">
                            <i class="bi bi-pen fs-5"></i><span>Make ist quiz answer options</span>
                        </a>
                    </li>
                </ul>
            </li>

            <li class="nav-item">
                <a class="nav-link collapsed" data-bs-target="#icons-nav" data-bs-toggle="collapse" href="#">
                    <i class="bi bi-people"></i><span>View IST Students </span><i
                        class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="icons-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">

                    <li>
                        <a href="{{ asset('IST/view-ist-students') }}">
                            <i class="bi bi-person fs-5"></i><span>View students</span>
                        </a>
                    </li>

                </ul>
            </li>
            </ul>
    @endif
    </aside><!-- End Sidebar-->
    <!-- END VIEW IST MATERIALS HEADER AND SIDEBAR -->

    <!-- START OF CSE STUDENT VIEW  HEADER AND SIDEBAR -->
    @if (auth()->check() && auth()->user()->role_id == '8')
        <header id="header" class="header fixed-top d-flex align-items-center">

            <div class="d-flex align-items-center justify-content-between">
                <a href="" class="logo d-flex align-items-center nav navbar-brand">
                    <img src="{{ asset('images/udom.png') }}" alt=""
                        style="width:50px;height:50px;border-radius:50%;object-fit:contain">
                    <span class="d-none d-lg-block text-primary">eClassroom</span>
                </a>
                <i class="bi bi-list toggle-sidebar-btn"></i>
            </div><!-- End Logo -->

            <nav class="header-nav ms-auto">

                @if (auth()->check() && auth()->user()->role_id == '8')
                    <div class="container justify-content-center px-5">

                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
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
                    @if (auth()->user()->role_id == '8')
                        <li class="nav-item">
                            <a class="nav-link " href="{{ asset('') }}">
                                <i class="bi bi-grid"></i>
                                <span>Dashboard</span>
                            </a>
                        </li><!-- End Dashboard Nav -->

                        @auth

                            @if (auth()->user()->role_id == '8')
                                <li class="nav-item">
                                    <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse"
                                        href="#">
                                        <i class="bi bi-gear"></i><span>Profile information</span><i
                                            class="bi bi-chevron-down ms-auto"></i>
                                    </a>
                                    <ul id="components-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">

                                        <li>
                                            <a href="{{ asset('view-student-profile') }}">
                                                <i class="bi bi-person fs-5"></i><span>View profile </span>
                                            </a>
                                        </li>
                            @endif

                        @endauth

                </ul>
                </li><!-- End profile information -->
                <li class="nav-item">
                    <a class="nav-link collapsed" data-bs-target="#tables-nav" data-bs-toggle="collapse" href="#">
                        <i class="bi bi-pencil-square"></i><span>Course subjects</span><i
                            class="bi bi-chevron-down ms-auto"></i>
                    </a>
                    <ul id="tables-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">

                        @if (auth()->user()->student->department_name == 'ELECTRONICS AND TELECOMMUNICATIONS ENGINEERING DEPARTMENT')
                            <li>
                                <a href="{{ asset('ETE/view-ete-course-subjects') }}">
                                    <i class="bi bi-book fs-5"></i><span>View subjects</span>
                                </a>
                            </li>
                        @else
                            <li>
                                <a href="{{ asset('CSE/view-cse-course-subjects') }}">
                                    <i class="bi bi-book fs-5"></i><span>View subjects</span>
                                </a>
                            </li>
                        @endif

                    </ul>

                </li><!-- End of course subjects information -->

                <li class="nav-item">
                    <a class="nav-link collapsed" data-bs-target="#icons-nav" data-bs-toggle="collapse" href="#">
                        <i class="bi bi-book"></i><span>Assignment and quizzes</span><i
                            class="bi bi-chevron-down ms-auto"></i>
                    </a>
                    <ul id="icons-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">

                        @if (auth()->user()->student->department_name == 'ELECTRONICS AND TELECOMMUNICATIONS ENGINEERING DEPARTMENT')
                            <li>
                                <a href="{{ asset('ETE/view-ete-quiz') }}">
                                    <i class="bi bi-pen fs-5"></i><span>Take quiz</span>
                                </a>
                            </li>

                            <li>
                                <a href="{{ asset('ETE/view-ete-student-scores') }}">
                                    <i class="bi bi-pencil-square fs-5"></i><span>View quiz scores</span>
                                </a>
                            </li>
                        @else
                            <li>
                                <a href="{{ asset('CSE/view-quiz') }}">
                                    <i class="bi bi-pen fs-5"></i><span>Take quiz</span>
                                </a>
                            </li>

                            <li>
                                <a href="{{ asset('CSE/view-student-scores') }}">
                                    <i class="bi bi-pencil-square fs-5"></i><span>View quiz scores</span>
                                </a>
                            </li>

                            <li>
                                <a href="{{ asset('CSE/view-student-assignment-scores') }}">
                                    <i class="fa-solid fa-file fs-5"></i><span>View assignment scores</span>
                                </a>
                            </li>
                        @endif

                    </ul>

                </li><!-- End assignment quizzes -->
        @endif

    @endauth
    </ul>
    @endif
    </aside><!-- End Sidebar-->
    <!-- END VIEW OF CSE STUDENT HEADER AND SIDEBAR -->

    <section id="main" class="main">
        <div class="pagetitle">
            <h1>Dashboard</h1>
            <h6>Date of today <span class="fw-bold"> : {{ date('d/m/Y') }}</span></h6>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#"></a>Home</li>
                    <li class="breadcrumb-item active"><a href="{{ asset('') }}"> Dashboard</a></li>

                </ol>
            </nav>
        </div><!-- End Page Title -->

        @yield('content')
    </section>

    <!-- ======= Footer ======= -->
    <footer id="footer" class="footer">
        <div class="copyright">
            &copy; Copyright <strong><span>University of Dodoma</span></strong>. All Rights Reserved
        </div>
        <div class="credits">

            Designed by <a href="#">Victor . Z . Kinyula</a>
        </div>
    </footer><!-- End Footer -->

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src="{{ asset('assets/vendor/apexcharts/apexcharts.min.js') }}"></script>
    {{-- <script src="{{asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script> --}}
    <script src="{{ asset('assets/vendor/chart.js/chart.umd.js') }}"></script>
    <script src="{{ asset('assets/vendor/echarts/echarts.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/quill/quill.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/simple-datatables/simple-datatables.js') }}"></script>
    <script src="{{ asset('assets/vendor/tinymce/tinymce.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/php-email-form/validate.js') }}"></script>

    <!-- Template Main JS File -->
    <script src="{{ asset('assets/js/main.js') }}"></script>

</body>

</html>

<div>
    @livewireStyles()


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

            @if (auth()->check() && auth()->user()->role_id == '7')

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
                <a class="nav-link " href="{{asset('ist-instructor')}}">
                    <i class="bi bi-grid"></i>
                    <span>Dashboard</span>
                </a>
            </li><!-- End Dashboard Nav -->

            <li class="nav-item">
                <a class="nav-link collapsed" data-bs-target="#charts-nav" data-bs-toggle="collapse" href="#">
                    <i class="bi bi-list"></i><span>Activities</span><i class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="charts-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">


                    <li>
                        <a href="{{asset('view_ist_materials')}}">
                            <i class="bi bi-book fs-5"></i><span>View ist materials</span>
                        </a>
                    </li>

                </ul>
            </li><!-- End Components Nav -->

            <li class="nav-item">
                <a class="nav-link collapsed" data-bs-target="#icons-nav" data-bs-toggle="collapse" href="#">
                    <i class="bi bi-gear"></i><span>Profile Information</span><i class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="icons-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">

                    <li>
                        <a href="{{asset('view-profile')}}">
                            <i class="bi bi-person fs-5"></i><span>View profile</span>
                        </a>
                    </li>



                </ul>
            </li>

            <li class="nav-item">
                <a class="nav-link collapsed" data-bs-target="#tables-nav" data-bs-toggle="collapse" href="#">
                    <i class="bi bi-pencil-square"></i><span>Quiz activities</span><i class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="tables-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">


                    <li>
                        <a href="{{asset('IST/make-quiz')}}">
                            <i class="bi bi-pen fs-5"></i><span>Make quiz question</span>
                        </a>
                    </li>

                    <li>
                        <a href="{{asset('IST/make-quiz-answer-options')}}">
                            <i class="bi bi-pen fs-5"></i><span>Make quiz answer options</span>
                        </a>
                    </li>
                </ul>
            </li>


            <li class="nav-item">
                <a class="nav-link collapsed" data-bs-target="#forms-nav" data-bs-toggle="collapse" href="#">
                    <i class="bi bi-people"></i><span>View IST Students </span><i class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="forms-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">

                    <li>
                        <a href="{{asset('IST/view-ist-students')}}">
                            <i class="bi bi-person fs-5"></i><span>View students</span>
                        </a>
                    </li>


                </ul>
            </li>
        </ul>

    </aside><!-- End Sidebar-->

    <main id="main" class="main">
        <div>
            @if (session()->has('message'))
            <div class="alert alert-success">
                {{ session('message') }}
            </div>
            @endif
        </div>

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
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
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


                                <div class="card-body"> <span>| This Year</span></h5>

                                    <div class="d-flex align-items-center">
                                        <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                            <i class="bi bi-person"></i>
                                        </div>

                                        <div class="ps-3">

                                            <h6>Instructor's name : {{$instructors->first_name}} {{$instructors->last_name}}</h6>


                                            <span class="text-danger small pt-1 fw-bold">description</span> <span class="text-muted small pt-2 ps-1">short information</span>

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
                                @if (session()->has("addedComment"))
                                <div role="alert" class="alert alert-success  alert-dismissible fade show">
                                    <strong>{{session::get("addedComment")}}</strong>
                                    <button class="btn btn-close" data-bs-dismiss="alert"></button>
                                </div>
                                @endif
                                <form wire:submit.prevent="comments">


                                    <h2>Write comments here</h2>
                                    <textarea name="comment" id="" cols="15" rows="0" class="form-control" placeholder="Comments" wire:model="commentInput"></textarea>
                                    @error('commentInput')
                                    <p class="text-danger fw-bold">{{$message}}</p>
                                    @enderror

                                    <br>
                                    <div class="mb-3">
                                        <select wire:model="departmentId" class="form-select">

                                            @foreach ($departments as $department)
                                            <option value="">-- Choose your department --</option>
                                            <option value="{{$department->id}}">{{$department->department_name}}</option>
                                            @endforeach

                                            @error('departmentId')
                                            <p class="text-danger fw-bold">{{$message}}</p>
                                            @enderror
                                        </select>
                                    </div>
                                    <button type="submit" class="btn btn-sm btn-primary my-4"><i class="fa-solid fa-message p-2" wire:loading.attr="disable"></i>Add comment</button>
                                    <div wire:loading class=" spinner-border text-success ">
                                        <span class="sr-only"></span>

                                    </div>
                                </form>

                            </div>

                            @livewire('replies-to-ist-students-from-ist-instructor-livewire')
                        </div>


                        <div class="col-12">

                            <div class="card p-3">
                                <h4><span class="text-danger  fw-bold">Students complaints</span></h4>
                                @if(Session::has("deletedComplaint"))
                                <div role="alert" class="alert alert-success alert-dismissible fade show">
                                    <strong>{{ Session::get("deletedComplaint") }}</strong>
                                    <button class="btn-close" data-bs-dismiss="alert"></button>
                                </div>
                                @endif




                                <div id="studentInformation" style="display: block;">


                                    @foreach ($studentComplaints as $complaint)


                                    <p><span class="text-danger fw-bold ">Complaint sent : </span><span class="fw-bold">{{$complaint->student_comment}}</span>
                                        <button class="text-danger border-0 " id="delete-complaint"><a class="text-danger border-0" href="{{route('delete-complaint', $complaint->id)}}"><i class="fas fa-trash"></i></a></button>

                                    <p><span class="text-danger fw-bold">Complaint sent date and time</span> : <span class="fw-bold">{{$complaint->created_at->diffForHumans()}}</span></p>
                                    <strong class="text-success">From</strong>
                                    <p><span class="text-danger fw-bold">Sender's email</span> : <span class="fw-bold">{{$complaint->student->email}}</span></p>
                                    <span class="text-success fw-bold">To</span>
                                    <p><span class="text-danger fw-bold">Receiver's email</span> : <span class="">{{$complaint->user->email}}</span></p>
                                    <br>
                                    </p>
                                    @endforeach


                                    {{$studentComplaints->links()}}

                                </div>


                            </div>


                        </div>
                    </div>
                </div>

                <div class="col-lg-4">


                    <!-- Materials form -->
                    <div class="card">


                        <div class="card-body pb-0">

                            <h5 class="card-title">Materials <span>| Today</span></h5>

                            @livewire('ist-materials-form-livewire')


                        </div>
                    </div><!-- End News & Updates -->
                    <div class="card">

                        <div class="card-body pb-0">
                            <h5 class="card-title">Replies from HOD <span>| Today</span></h5>

                            <div class="news">
                                <div class="post-item clearfix">

                                    @if(Session::has("message"))
                                    <div role="alert" class="alert alert-success alert-dismissible fade show">
                                        <strong>{{ Session("message") }}</strong>
                                        <button class="btn-close" data-bs-dismiss="alert"></button>
                                    </div>
                                    @endif



                                    @foreach ($hodReplies as $reply)
                                    <h4> <span class="text-success fw-bold"> Head of department's name :</span>{{$reply->instructor->first_name}} {{$reply->instructor->last_name}}</h4>
                                    <p> {{$reply->hod_reply}}
                                        <span class="text-danger fw-bold">{{$reply->created_at->diffForHumans()}}</span>
                                        <button class="text-danger border-0 w-100" wire:click="deleteHodReplies({{$reply->id}})" onclick="confirm('Are you sure you want to delete this reply ?') || event.stopImmediatePropagation()"><i class="bi bi-trash"></i></button>
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

    </html>
</div>

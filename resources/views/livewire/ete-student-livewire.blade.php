<div>
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

                @if (auth()->check() && auth()->user()->role_id == '8')

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
                    <a class="nav-link " href="{{asset('cse-instructor')}}">
                        <i class="bi bi-grid"></i>
                        <span>Dashboard</span>
                    </a>

                </li><!-- End Dashboard Nav -->


                <li class="nav-item">
                    <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
                        <i class="bi bi-gear"></i><span>Profile information</span><i class="bi bi-chevron-down ms-auto"></i>
                    </a>
                    <ul id="components-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">

                        <li>
                            <a href="{{asset('view-student-profile')}}">
                                <i class="bi bi-person fs-5"></i><span>View profile</span>
                            </a>
                        </li>

                    </ul>

                </li><!-- End profile information -->


                <li class="nav-item">
                    <a class="nav-link collapsed" data-bs-target="#tables-nav" data-bs-toggle="collapse" href="#">
                        <i class="bi bi-pencil-square"></i><span>Course subjects</span><i class="bi bi-chevron-down ms-auto"></i>
                    </a>
                    <ul id="tables-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">

                        <li>
                            <a href="{{asset('ETE/view-ete-course-subjects')}}">
                                <i class="bi bi-book fs-5"></i><span>View subjects</span>
                            </a>
                        </li>

                    </ul>

                </li><!-- End of course subjects information -->

                <li class="nav-item">
                    <a class="nav-link collapsed" data-bs-target="#icons-nav" data-bs-toggle="collapse" href="#">
                        <i class="bi bi-book"></i><span>Assignment and quizzes</span><i class="bi bi-chevron-down ms-auto"></i>
                    </a>
                    <ul id="icons-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">

                        <li>
                            <a href="{{asset('ETE/view-ete-quiz')}}">
                                <i class="bi bi-pen fs-5"></i><span>Take quiz</span>
                            </a>
                        </li>

                        <li>
                            <a href="{{asset('ETE/view-student-scores')}}">
                                <i class="bi bi-pencil-square fs-5"></i><span>View quiz scores</span>
                            </a>
                        </li>

                    </ul>

                </li><!-- End assignment quizzes -->

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

                                                <h6>Student's name : {{$students->student->first_name}} {{$students->student->last_name}}</h6>


                                                <span class="text-danger small pt-1 fw-bold">description</span> <span class="text-muted small pt-2 ps-1">short information</span>

                                            </div>
                                        </div>

                                    </div>

                                </div>

                            </div><!-- End Customers Card -->

                            <!-- Reports -->
                            <div class="col-12">
                                <div class="card p-3">

                                    @if (session()->has("addedComplaint"))
                                    <div role="alert" class="alert alert-success  alert-dismissible fade show">
                                        <strong>{{session::get("addedComplaint")}}</strong>
                                        <button class="btn btn-close" data-bs-dismiss="alert"></button>
                                    </div>

                                    @elseif(session()->has("failedComplaint"))
                                    <div role="alert" class="alert alert-danger  alert-dismissible fade show">
                                        <strong>{{session::get("failedComplaint")}}</strong>
                                        <button class="btn btn-close" data-bs-dismiss="alert"></button>
                                    </div>
                                    @endif
                                    <form wire:submit.prevent="complaints">


                                        <h2>Write complaints to the choosen lecturer here</h2>
                                        <textarea name="complaintInput" id="" cols="15" rows="0" class="form-control" placeholder="Complaints" wire:model="complaintInput"></textarea>
                                        @error('complaintInput')
                                        <p class="text-danger fw-bold">{{$message}}</p>
                                        @enderror

                                        <strong class="fw-bold p-1 fs-2">To:</strong>

                                        <br>

                                        <select class="form-select" wire:model="complaintInstructor">
                                            <option value="">-- Choose the lecturer to send the complaint to --</option>

                                            @foreach ($complaintLecturers as $CseLecturers)
                                            <option value="{{$CseLecturers->user_id}}">{{$CseLecturers->first_name}} {{$CseLecturers->last_name}}</option>
                                            @endforeach
                                        </select>
                                        @error('complaintInstructor')
                                        <p class="text-danger fw-bold">{{$message}}</p>
                                        @enderror
                                        <button type="submit" class="btn btn-sm btn-primary my-4"><i class="fas fa-paper-plane p-2" wire:loading.attr="disable"></i>Send a complaint</button>
                                        <div wire:loading class=" spinner-border text-success ">
                                            <span class="sr-only"></span>

                                        </div>
                                    </form>

                                </div>
                            </div>


                        </div>
                    </div>

                    <div class="col-lg-4">

                        <!-- Materials form -->

                        <div class="card">
                            <div class="card-body pb-0">

                                <h5 class="card-title">Assignment upload <span>| Today</span></h5>
                                @livewire('ete-assignment-uploading-livewire')
                            </div>
                        </div><!-- End News & Updates -->

                        <div class="card">

                            <div class="card-body pb-0">
                                <h5 class="card-title">Replies from instructor <span>| Today</span></h5>
                                <div class="news">
                                    <div class="post-item clearfix">

                                        @if(Session::has("deletemessage"))
                                        <div role="alert" class="alert alert-success alert-dismissible fade show">
                                            <strong>{{ Session("deletemessage") }}</strong>
                                            <button class="btn-close" data-bs-dismiss="alert"></button>
                                        </div>
                                        @endif

                                        @foreach ($instructorReplies as $reply)
                                        <h4> <span class="text-success fw-bold">Instructor's name :</span>{{$reply->instructor->first_name}} {{$reply->instructor->last_name}} </h4>
                                        <h4> <span class="text-success fw-bold">Instructor's name :</span></h4>
                                        <p> {{$reply->instructor_reply}} <br>
                                            <span class="text-danger fw-bold">{{$reply->created_at->diffForHumans()}}</span>
                                            <button class="text-danger border-0 w-100" wire:click="deleteInstructorReplies({{$reply->id}})" onclick="confirm('Are you sure you want to delete this instructor reply ?') || event.stopImmediatePropagation()"><i class="bi bi-trash"></i></button>
                                        </p>

                                        @endforeach
                                        {{$instructorReplies->links()}}
                                    </div>

                                </div>

                            </div>





                        </div><!-- End sidebar recent posts-->
                    </div><!-- End Right side columns -->

                </div>
            </section>
            @yield('content')

        </main><!-- End #main -->

        @livewireScripts()

        </html>
    </div>

</div>

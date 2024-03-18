<div>

    @livewireStyles()

    <!-- ======= Header ======= -->
    <header id="header" class="header fixed-top d-flex align-items-center">

        <div class="d-flex align-items-center justify-content-between">
            <a href="" class="logo d-flex align-items-center nav navbar-brand">
                <img src="{{ asset('images/favicon.ico') }}" alt="" class="udom-favicon-icon">
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

            <li class="nav-item">
                <a class="nav-link " href="{{ asset('cse-instructor') }}">
                    <i class="bi bi-grid"></i>
                    <span>Dashboard</span>
                </a>
            </li><!-- End Dashboard Nav -->

            <li class="nav-item">
                <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
                    <i class="bi bi-list"></i><span>Activities</span><i class="bi bi-chevron-down ms-auto"></i>
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
                <a class="nav-link collapsed" data-bs-target="#forms-nav" data-bs-toggle="collapse" href="#">
                    <i class="bi bi-gear"></i><span>Profile information</span><i class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="forms-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">


                    <li>
                        <a href="{{ asset('view-profile') }}">
                            <i class="bi bi-person fs-5"></i><span>View profile</span>
                        </a>
                    </li>

                </ul>
            </li>
            <!-- End of profile information -->

            <li class="nav-item">
                <a class="nav-link collapsed" data-bs-target="#tables-nav" data-bs-toggle="collapse" href="#">
                    <i class="bi bi-pencil-square"></i><span>Assignment & Quiz activities</span><i
                        class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="tables-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">


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

                    <li>
                        <a href="{{ asset('CSE/mark-quiz-answer-options') }}">
                            <i class="bi bi-book fs-5"></i><span>Quiz marking </span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ asset('CSE/cse-assignment-creation') }}">
                            <i class="bi bi-book fs-5"></i><span>Assignment marking </span>
                        </a>
                    </li>

                </ul>
            </li>

            <li class="nav-item">
                <a class="nav-link collapsed" data-bs-target="#icons-nav" data-bs-toggle="collapse" href="#">
                    <i class="bi bi-people"></i><span>View CSE Students </span><i
                        class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="icons-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">

                    <li>
                        <a href="{{ asset('CSE/view-cse-students') }}">
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

        @if (Session::has('deleteOperation'))
            <div role="alert" class="alert alert-success alert-dismissible fade show">
                <strong>{{ Session::get('deleteOperation') }}</strong>
                <button class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        <div class="pagetitle">
            <h1>Dashboard</h1>
            <h6>Date of today : <span class="fw-bold">{{ date('d/m/Y') }}</span></h6>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#"></a>Home</li>
                    <li class="breadcrumb-item active"><a href="{{ asset('cse-instructor') }}"> Dashboard</a></li>

                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section dashboard">
            <div class="row">

                <!-- Left side columns -->
                <div class="col-lg-8">
                    <div class="row">



                        <!-- Brief information Card -->
                        <div class="col-xxl-4 col-xl-12">

                            <div class="card info-card customers-card">

                                <div class="card-body"> <span>| This Year</span></h5>

                                    <div class="d-flex align-items-center">
                                        <div
                                            class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                            <i class="bi bi-person"></i>
                                        </div>

                                        <div class="ps-3">

                                            <h6>Instructor's name : {{ $instructors->first_name }}
                                                {{ $instructors->last_name }}</h6>


                                            <span class="text-danger small pt-1 fw-bold">description</span> <span
                                                class="text-muted small pt-2 ps-1">short information</span>

                                        </div>
                                    </div>

                                </div>

                            </div>

                        </div><!-- End Customers Card -->

                        <!-- Reports -->
                        <div class="col-12">
                            <div class="card p-3">

                                @if (session()->has('addedComment'))
                                    <div role="alert" class="alert alert-success  alert-dismissible fade show">
                                        <strong>{{ session::get('addedComment') }}</strong>
                                        <button class="btn btn-close" data-bs-dismiss="alert"></button>
                                    </div>
                                @endif
                                <form wire:submit.prevent="comments">


                                    <h3>Submit comments here to the head of department</h3>
                                    <textarea name="comment" id="" cols="15" rows="0" class="form-control" placeholder="Comments"
                                        wire:model="commentInput"></textarea>
                                    @error('commentInput')
                                        <p class="text-danger fw-bold">{{ $message }}</p>
                                    @enderror

                                    <br>
                                    <div class="mb-3">
                                        <select wire:model="departmentId" class="form-select">

                                            @foreach ($departments as $department)
                                                <option value="">-- Choose your department --</option>
                                                <option value="{{ $department->id }}">
                                                    {{ $department->department_name }}</option>
                                            @endforeach

                                            @error('departmentId')
                                                <p class="text-danger fw-bold">{{ $message }}</p>
                                            @enderror
                                        </select>
                                    </div>

                                    <button type="submit" class="btn btn-sm btn-primary my-4"><i
                                            class="fa-solid fa-paper-plane p-2" wire:loading.attr="disable"></i>Send a
                                        comment</button>
                                    <div wire:loading class=" spinner-border text-success ">
                                        <span class="sr-only"></span>

                                    </div>
                                </form>

                            </div>

                            @livewire('replies-to-students-from-instructor-livewire')
                        </div>

                        <div class="col-12">

                            <div class="card p-3">
                                <h4><span class="text-danger  fw-bold">Students complaints</span></h4>
                                @if (session()->has('deletedComplaint'))
                                    <div role="alert" class="alert alert-success alert-dismissible fade show">
                                        <strong>{{ session('deletedComplaint') }}</strong>
                                        <button class="btn-close" data-bs-dismiss="alert"></button>
                                    </div>
                                @endif

                                @if (session()->has('complaintMessage'))
                                    <div role="alert" class="alert alert-success alert-dismissible fade show">
                                        <strong>{{ session('complaintMessage') }}</strong>
                                        <button class="btn-close" data-bs-dismiss="alert"></button>
                                    </div>
                                @endif


                                <div id="studentInformation" style="display: block;">

                                    @foreach ($studentComplaints as $complaint)
                                        <p class="text-dark fw-bold"> <span class="text-danger fw-bold ">Complaint
                                                sent : </span>{{ $complaint->student_comment }}
                                            <button class="text-danger border-0 " id="delete-complaint"
                                                wire:click="deleteCseStudentComplaint({{ $complaint->id }})"
                                                onclick="confirm(`Are you sure you want to delete this student's complaint named {{$complaint->student->first_name}} {{$complaint->student->last_name}}?`) || event.stopImmediatePropagation()"><i
                                                    class="bi bi-trash"></i></button>

                                        <p class="text-dark fw-bold"><span class="text-danger fw-bold">Complaint sent
                                                date and time</span> : {{ $complaint->created_at->diffForHumans() }}
                                        </p>
                                        <strong class="text-success">From</strong>
                                        <p class="text-dark fw-bold"><span class="text-danger fw-bold">Sender's
                                                email</span> : {{ $complaint->student->email }}</p>
                                        <span class="text-success fw-bold">To</span>
                                        <p class="text-dark fw-bold"><span class="text-danger fw-bold">Receiver's
                                                email</span> : {{ $complaint->user->email }}</p>
                                        <br>
                                        </p>
                                    @endforeach

                                    {{ $studentComplaints->links() }}

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

                            @livewire('materials-form-livewire')

                        </div>

                    </div><!-- End News & Updates -->

                    <div class="card">

                        <div class="card-body pb-0">
                            <h5 class="card-title">Replies from HOD <span>| Today</span></h5>

                            <div class="news">
                                <div class="post-item clearfix">

                                    @if (Session::has('message'))
                                        <div role="alert" class="alert alert-success alert-dismissible fade show">
                                            <strong>{{ Session('message') }}</strong>
                                            <button class="btn-close" data-bs-dismiss="alert"></button>
                                        </div>
                                    @endif

                                    @foreach ($hodReplies as $reply)
                                        <h4> <span class="text-success fw-bold"> Head of department's name
                                                :</span>{{ $reply->instructor->first_name }}
                                            {{ $reply->instructor->last_name }}</h4>
                                        <br>
                                        <h4> <span class="text-success fw-bold"> Head of department's reply </h4>
                                        <p> {{ $reply->hod_reply }}
                                            <span
                                                class="text-danger fw-bold">{{ $reply->created_at->diffForHumans() }}</span>
                                            <button class="text-danger border-0 w-100"
                                                wire:click="deleteHodReplies({{ $reply->id }})"
                                                onclick="confirm('Are you sure you want to delete this reply ?') || event.stopImmediatePropagation()"><i
                                                    class="bi bi-trash"></i></button>
                                        </p>
                                    @endforeach

                                </div>

                            </div><!-- End sidebar recent posts-->

                        </div>
                    </div><!-- End News & Updates -->

                    <div class="card">

                        <div class="card-body pb-0">

                            <h5 class="card-title">Students Assignments Uploaded <span>| Today</span></h5>

                            @livewire('cse-assignments-uploaded-livewire')

                        </div>

                    </div><!-- End News & Updates -->
                </div><!-- End Right side columns -->

        </section>
        @yield('content')

    </main><!-- End #main -->

    @livewireScripts()

    </html>
</div>

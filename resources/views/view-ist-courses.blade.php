@section('content')
@extends('layouts/AuthLayout.frontendLayout')

<main id="" class="main table table-responsive bg-white">

    @if(Session::has("courseDeleted"))
    <div role="alert" class="alert alert-success alert-dismissible fade show">
        <strong>{{ Session::get("documentDeleted") }}</strong>
        <button class="btn-close" data-bs-dismiss="alert"></button>
    </div>
    @endif
    <h2 class="p-3">Computer science and engineering Courses</h2>
    <table class="table table-border datatable ">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Department id</th>
                <th scope="col">Course name</th>
                <th scope="col">Created at</th>
                <th scope="col">Updated at</th>
                <th scope="col">Action</th>
            </tr>
            @php
            $srNo = 1;
            @endphp
        </thead>
        <tbody>
            @if ($courses->count() > 0)
            @foreach ($courses as $course)
            <tr>
                <th scope="row">{{$srNo}}</th>
                <td>{{$course->department_id}}</td>
                <td>{{$course->course_name}}</td>
                <td>{{$course->created_at->diffForHumans()}}</td>
                <td>{{$course->updated_at->diffForHumans()}}</td>
                <td>
                    <div class="d-flex">
                        <a href="{{ Route('deletecourse',$course->id)}}"><button class=" btn btn-danger btn-sm"><i class="fas fa-trash"></i></button></a>

                    </div>

                </td>


            </tr>
            @php
            $srNo++;
            @endphp
            @endforeach
            @else

            @endif

        </tbody>
    </table>
</main>
@endsection
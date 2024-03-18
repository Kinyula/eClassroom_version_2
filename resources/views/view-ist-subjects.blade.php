@extends('layouts/AuthLayout.frontendLayout')

@section('content')
<main id="" class="main table table-responsive bg-white">

    @if(Session::has("subjectDeleted"))
    <div role="alert" class="alert alert-success alert-dismissible fade show">
        <strong>{{ Session::get("subjectDeleted") }}</strong>
        <button class="btn-close" data-bs-dismiss="alert"></button>
    </div>
    @endif
    <h2 class="p-3">Information Systems and Technology Subjects</h2>
    <table class="table table-border datatable ">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Semester id</th>
                <th scope="col">Department id</th>
                <th scope="col">Subject name</th>
                <th scope="col">Subject course code</th>
                <th scope="col">Created at</th>
                <th scope="col">Updated at</th>
                <th scope="col">Action</th>
            </tr>
            @php
            $srNo = 1;
            @endphp
        </thead>
        <tbody>
            @if ($subjects->count() > 0)
            @foreach ($subjects as $subject)
            <tr>
                <th scope="row">{{$srNo}}</th>
                <td>{{$subject->semester_id}}</td>
                <td>{{$subject->department_id}}</td>
                <td>{{$subject->subject_name}}</td>
                <td>{{$subject->subject_course_code}}</td>
                <td>{{$subject->created_at->diffForHumans()}}</td>
                <td>{{$subject->updated_at->diffForHumans()}}</td>
                <td>
                    <div class="d-flex">
                        <a href="{{ Route('deletesubject',$subject->id)}}"><button class=" btn btn-danger btn-sm"><i class="fas fa-trash"></i></button></a>
                        <!-- <a class="px-2" href=""><button class="  btn btn-success btn-sm"><i class="fas fa-edit"></i></button></a> -->
                    </div>

                </td>


            </tr>
            @php
            $srNo++;
            @endphp
            @endforeach

            <span>{{$subjects->links()}}</span>
            @else

            @endif

        </tbody>
    </table>
</main>
@endsection
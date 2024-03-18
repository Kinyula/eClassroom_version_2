<div>

    <main id="" class="main table table-responsive bg-white">

        @if(session()->has("deleteOperation"))
        <div role="alert" class="alert alert-success alert-dismissible fade show">
            <strong>{{ session("deleteOperation") }}</strong>
            <button class="btn-close" data-bs-dismiss="alert"></button>
        </div>
        @endif

        @if(session()->has("exportMessage"))
        <div role="alert" class="alert alert-success alert-dismissible fade show">
            <strong>{{ session("exportMessage") }}</strong>
            <button class="btn-close" data-bs-dismiss="alert"></button>
        </div>
        @endif
        <div class="d-flex float-end mt-3">

            <form wire:submit.prevent="importCourses()" class="d-flex">

                <input type="file" class="form-control" wire:model="courseImport">

                @error('courseImport')
                    <strong class="text-danger">{{ $message }}</strong>
                @enderror
                <button type="submit" class="btn btn-sm btn-primary  ms-3" wire:loading.attr="disabled"
                    onclick="confirm('Are you sure you want to import the courses ?') || event.stopImmediatePropagation()"><i
                        class="bi bi-plus">Import courses</i> </button>

            </form>

            <form wire:submit.prevent="exportCseStaffs()" class="d-flex">

                <button type="submit" class="btn btn-sm btn-primary  ms-3"><i class="bi bi-upload"> Export courses
                    </i></button>

            </form>
        </div>
        <h2 class="p-3">Computer Science and Engineering Courses</h2>
        <table class="table table-border datatable ">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Department's name</th>
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
                @if ($CseCourses->count() > 0)
                @php
                $srNo = 1;
                @endphp

                @foreach ($CseCourses as $course)


                <tr>
                    <th scope="row">{{$srNo++}}</th>
                    <td>{{$course->department->department_name}}</td>
                    <td>{{$course->course_name}}</td>
                    <td>{{$course->created_at->diffForHumans()}}</td>
                    <td>{{$course->updated_at->diffForHumans()}}</td>

                    <td>
                        <button type="button" onclick="confirm(`Are you sure you want to delete {{$course->course_name}} course ?`) || event.stopImmediatePropagation()" wire:click="deleteCseCourse({{$course->id}})" class="border-0"><i class="bi bi-trash text-danger"></i></button>
                    </td>

                </tr>

                @endforeach
                @else
                <tr>
                    <th scope="row"></th>
                    <td class="alert alert-danger">No user(s) registered</td>
                </tr>
                @endif

            </tbody>
        </table>
    </main>
</div>

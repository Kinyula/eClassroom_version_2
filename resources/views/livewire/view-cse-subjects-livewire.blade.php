<div>

    <main id="" class="main table table-responsive bg-white">

        @if (session()->has('deleteOperation'))
            <div role="alert" class="alert alert-success alert-dismissible fade show">
                <strong>{{ session('deleteOperation') }}</strong>
                <button class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        @if (session()->has('exportMessage'))
            <div role="alert" class="alert alert-success alert-dismissible fade show">
                <strong>{{ session('deleteOperation') }}</strong>
                <button class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        <div class="d-flex float-end mt-3">

            <form wire:submit.prevent="importCseSubjects()" class="d-flex">

                <input type="file" class="form-control" wire:model="subjectImport">

                @error('subjectImport')
                    <strong class="text-danger">{{ $message }}</strong>
                @enderror
                <button type="submit" class="btn btn-sm btn-primary  ms-3" wire:loading.attr="disabled"
                    onclick="confirm('Are you sure you want to import the subject ?') || event.stopImmediatePropagation()"><i
                        class="bi bi-plus">Import subjects</i> </button>
            </form>

            <form wire:submit.prevent="exportCseSubjects()" class="d-flex">

                <button type="submit" class="btn btn-sm btn-primary  ms-3"><i class="bi bi-upload"> Export subjects
                    </i></button>

            </form>
        </div>

        <h2 class="p-3">Computer Science and Engineering subject</h2>
        <table class="table table-border datatable ">
            <thead>
                <tr>
                    <th scope="col">srNo</th>
                    <th scope="col">Semester</th>
                    <th scope="col">Department name</th>
                    <th scope="col">Subject name</th>
                    <th scope="col">Subject course code</th>
                    <th scope="col">Created at</th>
                    <th scope="col">Updated at</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @if ($CseSubjects->count() > 0)
                    @php
                        $srNo = 1;
                    @endphp

                    @foreach ($CseSubjects as $subject)
                        <tr>
                            <th scope="row">{{ $srNo++ }}</th>
                            <td>{{ $subject->semester_id }}</td>
                            <td>{{ $subject->department->department_name }}</td>
                            <td>{{ $subject->subject_name }}</td>
                            <td>{{ $subject->subject_course_code }}</td>
                            <td>{{ $subject->created_at }}</td>
                            <td>{{ $subject->updated_at }}</td>

                            <td>
                                <button type="button"
                                    onclick="confirm(`Are you sure you want to delete this subject called {{ $subject->subject_name }} with it's course code of {{ $subject->subject_course_code }} ?`) || event.stopImmediatePropagation()"
                                    wire:click="deleteCsesubject({{ $subject->id }})" class="border-0"><i
                                        class="bi bi-trash text-danger"></i></button>
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

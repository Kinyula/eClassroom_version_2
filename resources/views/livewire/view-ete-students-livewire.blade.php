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
                <strong>{{ session('exportMessage') }}</strong>
                <button class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        <div class="d-flex float-end mt-3">

            <form wire:submit.prevent="importEteStudents()" class="d-flex">

                <input type="file" class="form-control" wire:model="studentImport">

                @error('studentImport')
                    <strong class="text-danger">{{ $message }}</strong>
                @enderror
                <button type="submit" class="btn btn-sm btn-primary  ms-3" wire:loading.attr="disabled"
                    onclick="confirm('Are you sure you want to import the students ?') || event.stopImmediatePropagation()"><i
                        class="bi bi-plus">Import students</i> </button>

            </form>

            <form wire:submit.prevent="exportEteStudents()" class="d-flex">

                <button type="submit" class="btn btn-sm btn-primary  ms-3"><i class="bi bi-upload"> Export students
                    </i></button>

            </form>
        </div>

        <h2 class="p-3 fs-5">Electronics and Telecommunications Engineering Students</h2>
        <table class="table table-border datatable ">
            <thead>

                <tr>
                    <th scope="col">srNo</th>
                    <th scope="col">First name</th>
                    <th scope="col">Last name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Phone number</th>
                    <th scope="col">Gender</th>
                    <th scope="col">Status</th>
                    <th scope="col">Department name</th>
                    <th scope="col">Created at</th>
                    <th scope="col">Updated at</th>
                    <th scope="col">User's status</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @if ($EteStudents->count() > 0)
                    @php
                        $srNo = 1;
                    @endphp
                    @foreach ($EteStudents as $student)
                        <tr>
                            <th scope="row">{{ $srNo++ }}</th>
                            <td>{{ $student->first_name }}</td>
                            <td>{{ $student->last_name }}</td>
                            <td>{{ $student->email }}</td>
                            <td>{{ $student->phone_number }}</td>
                            <td>{{ $student->gender }}</td>
                            <td>{{ $student->status }}</td>
                            <td>{{ $student->department_name }}</td>
                            <td>{{ $student->created_at }}</td>
                            <td>{{ $student->updated_at }}</td>

                            <td>
                                @if ($student->isOnline())
                                    <li class="text-success fw-bold">
                                        Online
                                    </li>
                                @else
                                    <li class="text-danger fw-bold">
                                        Offline
                                    </li>
                                @endif
                            </td>

                            <td>
                                <button type="button"
                                    onclick="confirm('Are you sure you want to delete this student ?') || event.stopImmediatePropagation()"
                                    wire:click="deleteEteStudent({{ $student->id }})" class="border-0"><i
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

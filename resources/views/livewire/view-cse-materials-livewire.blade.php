<div>


    <div>

        <main id="" class="main table table-responsive bg-white">

            @if (session()->has('deleteOperation'))
                <div role="alert" class="alert alert-success alert-dismissible fade show">
                    <strong>{{ session('deleteOperation') }}</strong>
                    <button class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @else
                <div role="alert" class="alert alert-success alert-dismissible fade show">
                    <strong>{{ session('deleteErrorOperation') }}</strong>
                    <button class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            <h2 class="p-3">Computer Science and Engineering Materials</h2>
            <table class="table table-border datatable ">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Department's name</th>
                        <th scope="col">Semester </th>
                        <th scope="col">Year</th>
                        <th scope="col">Instructor's name</th>
                        <th scope="col">Subject name</th>
                        <th scope="col">Document name</th>
                        <th scope="col">Created at</th>
                        <th scope="col">Updated at</th>
                        <th scope="col">Action</th>
                    </tr>
                    @php
                        $srNo = 1;
                    @endphp
                </thead>
                <tbody>
                    @if ($CseDocuments->count() > 0)
                        @foreach ($CseDocuments as $material)
                            <tr>
                                <th scope="row">{{ $srNo }}</th>
                                <td>{{ $material->department->department_name }}</td>
                                <td>{{ $material->semester->semester_name }}</td>
                                <td>{{ $material->year->status_description }}</td>
                                <td>{{ $material->instructor->last_name }}</td>
                                <td>{{ $material->subjects->subject_name }}</td>
                                <td>{{ $material->file_name }}</td>
                                <td>{{ $material->created_at->diffForHumans() }}</td>
                                <td>{{ $material->updated_at->diffForHumans() }}</td>
                                <td>
                                <td>
                                    <button type="button"
                                        onclick="confirm('Are you sure you want to delete this {{ $material->subjects->subject_name }} document ?') || event.stopImmediatePropagation()"
                                        wire:click="deleteCseDocuments({{ $material->id }})" class="border-0"><i
                                            class="bi bi-trash text-danger"></i></button>
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
    </div>
</div>

<div>

    <main id="" class="main table table-responsive bg-white">

        <div class="d-flex float-end mt-3">

            <form wire:submit.prevent="importIstStaffs()" class="d-flex">

                <input type="file" class="form-control" wire:model="staffImport">

                @error('staffImport')
                <strong class="text-danger">{{ $message }}</strong>
                @enderror
                <button type="submit" class="btn btn-sm btn-primary  ms-3" wire:loading.attr="disabled"
                        onclick="confirm('Are you sure you want to import the staffs ?') || event.stopImmediatePropagation()"><i
                        class="bi bi-plus">Import staffs</i> </button>
            </form>

            <form wire:submit.prevent="exportIstStaffs()" class="d-flex">

                <button type="submit" class="btn btn-sm btn-primary  ms-3"><i class="bi bi-upload"> Export staffs
                    </i></button>

            </form>
        </div>

        <h2 class="p-3 fs-5">Information Systems and Technology Staffs</h2>

        @if (session()->has('deleteOperation'))
            <div role="alert" class="alert alert-success alert-dismissible fade show">
                <strong>{{ session('deleteOperation') }}</strong>
                <button class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif



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
                    <th scope="col">Department id</th>
                    <th scope="col">Created at</th>
                    <th scope="col">Updated at</th>
                    <th scope="col">User's status</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>


                @if ($IstStaffs->count() > 0)

                    @php
                        $srNo = 1;
                    @endphp


                    @foreach ($IstStaffs as $staff)
                        <tr>
                            <th scope="row">{{ $srNo++ }}</th>
                            <td>{{ $staff->instructor->first_name }}</td>
                            <td>{{ $staff->instructor->last_name }}</td>
                            <td>{{ $staff->email }}</td>
                            <td>{{ $staff->instructor->phone_number }}</td>
                            <td>{{ $staff->instructor->gender }}</td>
                            <td>{{ $staff->instructor->status }}</td>
                            <td>{{ $staff->instructor->department->department_name }}</td>
                            <td>{{ $staff->created_at }}</td>
                            <td>{{ $staff->updated_at }}</td>

                            <td>
                                @if ($staff->isOnline())
                                    <li class="text-success fw-bold">
                                        Online
                                    </li>
                                @else
                                    <li class="text-danger fw-bold ">
                                        Offline
                                    </li>
                                @endif
                            </td>

                            <td>

                                <button type="button"
                                    onclick="confirm('Are you sure you want to delete this staff ?') || event.stopImmediatePropagation()"
                                    wire:click="deleteIstStaff({{ $staff->id }})" class="border-0"><i
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

<div>
    @if (session()->has('assignmentMessage'))
        <div role="alert" class="alert alert-success  alert-dismissible fade show">
            <strong>{{ session('assignmentMessage') }}</strong>
            <button class="btn btn-close" data-bs-dismiss="alert"></button>
        </div>
    @else
        <div role="alert" class="alert alert-success  alert-dismissible fade show">
            <strong>{{ session('assignmentErrorMessage') }}</strong>
            <button class="btn btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif
    @foreach ($CseStudentSubmittedAssignment as $Assignment)
        <span class="fw-bold text-success">Student's full name : </span><span
            class="fw-bold">{{ $Assignment->student->first_name }} {{ $Assignment->student->last_name }}</span>
        <br>
        <br>
        <span class="fw-bold text-success">Student's degree programme : </span><span
            class="fw-bold">{{ $Assignment->student->course_name }} </span>
        <br>
        <br>
        <span class="fw-bold text-success">Student's assignment uploaded time : </span><span
            class="fw-bold">{{ $Assignment->created_at->diffForHumans() }} </span>
        <br>
        <hr>
        <span class="fw-bold text-danger">Student's uploaded assignment</span>

        <button type="submit" class="btn brn-sm btn-success m-3"
            wire:click = "downloadAssignment({{ $Assignment->id }})" wire:loading.attr = "disabled"><i
                class="bi bi-download p-1"></i></button>


        <button type="submit" class="btn brn-sm btn-danger m-3" wire:click = "deleteAssignment({{ $Assignment->id }})"
            wire:loading.attr = "disabled"
            onclick="confirm(`Are you sure you want to delete {{ $Assignment->student->first_name }} {{ $Assignment->student->last_name }}'s assignment ?`) || event.stopImmediatePropagation()"><i
                class="bi bi-trash p-1"></i></button>
    @endforeach
</div>

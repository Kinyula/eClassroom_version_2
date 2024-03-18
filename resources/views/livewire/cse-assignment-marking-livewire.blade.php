<div>
    <div class="col-12">
        <div class="card p-3">
            @if (session()->has('assignmentMarkingMessage'))
                <div role="alert" class="alert alert-success  alert-dismissible fade show">
                    <strong>{{ session('assignmentMarkingMessage') }}</strong>
                    <button class="btn btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif
            <h3>Assignment Marking is done here.</h3>

            <form wire:submit.prevent = "setScore">
                <div class="form-group">
                    <label for="" class="form-label">Set score</label>
                    <input type="number" class="form-control" wire:model = "AssignmentScores">
                    @error('AssignmentScores')
                        <strong class="text-danger">{{ $message }}</strong>
                    @enderror
                </div>
                <div class="form-group mt-2">
                    <label for="" class="form-label">Total number of assignment questions</label>
                    <input type="text" class="form-control" wire:model = "TotalQuestionsAvailable">
                    @error('TotalQuestionsAvailable')
                        <strong class="text-danger">{{ $message }}</strong>
                    @enderror
                </div>
                <div class="form-group mt-2">
                    <label for="" class="form-label">Respective student</label>
                    <select name="" id="" class="form-select" wire:model = "Students">
                        <option value="">-- Choose the respective student to send the results to --</option>
                        @foreach ($CseStudents as $student)
                            <option value="{{ $student->id }}" class="fw-bold">Student's full name :
                                {{ $student->first_name }} {{ $student->last_name }}</option>
                        @endforeach

                    </select>
                    @error('Students')
                        <strong class="text-danger">{{ $message }}</strong>
                    @enderror
                </div>

                <div class="form-group mt-3">

                    <button type="submit" class="form-control btn btn-sm btn-primary" wire:loading.attr = "disabled"><i
                            class="fas fa-check"></i></button>

                </div>
            </form>

        </div>
    </div>
</div>

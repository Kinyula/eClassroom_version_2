<div>
@if (session()->has("addedAssignment"))

<div role="alert" class="alert alert-success  alert-dismissible fade show">
    <strong>{{session("addedAssignment")}}</strong>
    <button class="btn btn-close" data-bs-dismiss="alert"></button>
</div>

@endif
<form wire:submit.prevent="assignments">

<div class="d-block">
    <label for="" ></label>
    <label for="" class="mt-3">Upload assignment</label>
    <input type="file" name="assignmentDocument" id="assignmentDocument" class="form-control mb-2" wire:model="assignmentDocument">

    @error('assignmentDocument')
    <strong class="text-danger">{{$message}}</strong>
    @enderror
</div>

<div wire:loading wire:target = "assignmentDocument" wire:key = "assignmentDocument">

@if ($assignmentDocument)
    <img src="{{$assignmentDocument}}" alt="" srcset="" class="mt-2">
@else

@endif

</div>

<strong class="fw-bold  fs-3">To:</strong>

<div class="d-block">
            <label for="" ></label>
            <select name="CseLecturer" id="CseLecturer" class="form-select" wire:model="CseLecturer">

                <option value="">-- Choose instructor's name --</option>

                @foreach($Lecturers as $Lecturer)
                    <option value="{{$Lecturer->id}}" class="fw-bold">Instructor's full name : {{$Lecturer->first_name}} {{$Lecturer->last_name}}</option>
                @endforeach


            </select>
            @error('CseLecturer')
            <strong class="text-danger">{{$message}}</strong>
            @enderror
        </div>



        <div class="d-block p-2">
            <button type="submit" class="btn btn-sm btn-primary" wire:loading.attr ="disabled"><i class="fas fa-paper-plane p-1"></i> Upload asignment</button>
            <div wire:loading class=" spinner-border text-success " wire:key ="assignments" wire:target = "assignments">
                <span class="sr-only"></span>

            </div>

        </div>
</form>
</div>

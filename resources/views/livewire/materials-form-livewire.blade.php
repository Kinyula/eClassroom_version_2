<div>

    @if (session()->has("message"))

    <div role="alert" class="alert alert-success  alert-dismissible fade show">
        <strong>{{session("message")}}</strong>
        <button class="btn btn-close" data-bs-dismiss="alert"></button>
    </div>

    @endif
    <form wire:submit.prevent="materials">
        <div class="d-block">
            <label for=""></label>
            <label for="" class="mt-3">Upload lecture/Books</label>
            <input type="file" name="file" id="file" class="form-control mb-2" wire:model="file">

            @error('file')
            <strong class="text-danger">{{$message}}</strong>
            @enderror
        </div>
        <div class="d-block">
            <label for=""></label>
            <select name="semesters" id="semesters" class="form-select" wire:model="Semester" wire:change="changeSemester">

                <option value="">-- Choose Semester name --</option>

                @foreach($Semesters as $semester)
                <option value="{{$semester->id}}">{{$semester->semester_name}}</option>
                @endforeach


            </select>
            @error('Semester')
            <strong class="text-danger">{{$message}}</strong>
            @enderror
        </div>

        <div class="d-block">
            <label for=""></label>
            <select name="Subject" id="Subject" class="form-select" wire:model="Subject">

                <option value="">-- Choose Subject name --</option>
                @foreach($Subjects as $SubjectName)
                <option value="{{$SubjectName->id}}">{{$SubjectName->subject_name}}</option>
                @endforeach


            </select>

            @error('Subject')
            <strong class="text-danger">{{$message}}</strong>
            @enderror
        </div>

        <div class="d-block">
            <label for=""></label>
            <select name="year" id="year" class="form-select" wire:model="years">

                <option value="">-- Choose year --</option>
                @foreach($Years as $Year)
                <option value="{{$Year->id}}">{{$Year->status_description}}</option>
                @endforeach

            </select>

            @error('years')
            <strong class="text-danger">{{$message}}</strong>
            @enderror
        </div>

        <div class="d-block">
            <label for=""></label>
            <select name="department" id="department" class="form-select" wire:model="departments">

                <option value="">-- Choose department name --</option>
                @foreach($Departments as $Department)
                <option value="{{$Department->id}}">{{$Department->department_name}}</option>
                @endforeach


            </select>

            @error('departments')
            <strong class="text-danger">{{$message}}</strong>
            @enderror
        </div>

        <div class="d-block p-2">
            <button type="submit" class="btn btn-sm btn-primary" wire:loading.attr="disabled"><i class="fas fa-edit p-1"></i> Add materials</button>
            <div wire:loading class=" spinner-border text-success ">
                <span class="sr-only"></span>

            </div>
            <div>


            </div>
        </div>



    </form>

</div>
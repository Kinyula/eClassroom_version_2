<div>

    <div class="col-12">
        <div class="card p-3">
            <h3>Add Subjects</h3>
            @if (session()->has("message"))

            <div role="alert" class="alert alert-success  alert-dismissible fade show">
                <strong>{{session("message")}}</strong>
                <button class="btn btn-close" data-bs-dismiss="alert"></button>
            </div>

            @endif
            <form wire:submit.prevent="subjects">

                <div class="d-block">
                    <label for=""></label>
                    <select name="semesters" id="semesters" class="form-select" wire:model="Semester">

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
                    <select id="department" class="form-select" wire:model="departments">

                        <option value="">-- Choose department name --</option>
                        @foreach($Departments as $Department)
                        <option value="{{$Department->id}}">{{$Department->department_name}}</option>
                        @endforeach


                    </select>

                    @error('departments')
                    <strong class="text-danger">{{$message}}</strong>
                    @enderror
                </div>


                <div class="d-block">
                    <label for=""></label>
                    <div class="form-floating">
                        <input id="subjectName" type="text" class="form-control @error('subjectName') is-invalid @enderror" value="{{ old('email') }}" autocomplete="subjectName" autofocus placeholder="Subject name" wire:model="subjectName">
                        <label for="" class="form-label">Subject name</label>
                        @error('subjectName')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>

                <div class="d-block">
                    <label for=""></label>
                    <div class="form-floating">
                        <input id="subjectCode" type="text" class="form-control @error('subjectCode') is-invalid @enderror" value="{{ old('subjectCode') }}" autocomplete="subjectCode" autofocus placeholder="Subject code" wire:model="subjectCode">
                        <label for="" class="form-label">Subject code</label>
                        @error('subjectCode')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>



                <div class="d-block p-2">
                    <button type="submit" class="btn btn-sm btn-primary" wire:loading.attr="disabled"><i class="fas fa-edit p-1" onclick="confirm('Are you sure you want to add the subject information ?')|| event.stopImmediatePropagation()"></i> Add cse subjects</button>


                </div>



            </form>
        </div>
    </div>


</div>
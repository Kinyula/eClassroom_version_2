<div>

    <div class="col-12">
        <div class="card p-3">
            @if (session()->has("message"))

            <div role="alert" class="alert alert-success  alert-dismissible fade show">
                <strong>{{session("message")}}</strong>
                <button class="btn btn-close" data-bs-dismiss="alert"></button>
            </div>

            @endif
            <form wire:submit.prevent="courses" class="d-block">

                <h3>Add Courses</h3>

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

                <br>
                <div class="d-block">
                    <label for=""></label>
                    <div class="form-floating">
                        <input id="subjectName" type="text" class="form-control @error('courseName') is-invalid @enderror" value="{{ old('courseName') }}" autocomplete="courseName" autofocus placeholder="Course name" wire:model="courseName">
                        <label for="" class="form-label">Course name</label>
                        @error('courseName')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>

                <div class="d-block p-2">
                    <button type="submit" class="btn btn-sm btn-primary" wire:loading.attr="disabled"><i class="fas fa-edit p-1"></i> Add cse courses</button>
                    <div wire:loading class=" spinner-border text-success ">
                        <span class="sr-only"></span>

                    </div>

                </div>

            </form>
        </div>
    </div>


</div>
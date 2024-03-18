<div>

    <div class="col-12">

        <div class="card p-3">
            <h3>Quiz marking is done here</h3>
            <h4>Attempted questions</h4>

            @if (session()->has("quizSubmissionMessage"))
            <div role="alert" class="alert alert-success  alert-dismissible fade show">
                <strong>{{session("quizSubmissionMessage")}}</strong>
                <button class="btn btn-close" data-bs-dismiss="alert"></button>
            </div>

            @endif

            @foreach ($answers as $answer)
           <div>
            <span class="text-danger fw-bold">Student's name :</span>
           <span class="fw-bold">{{$answer->student->first_name}} {{$answer->student->last_name}}</span>
           </div> 
            <span class="fw-bold">{{$answer->optionstexts->quiz->questions}}</span>
            <form wire:submit.prevent="markQuiz">
                <label for="">
                    <span>{{$answer->optionstexts->options}}</span>
                    <input type="checkbox" value="{{$answer->optionstexts->id}}" class="form-check-input" wire:model="answer">
                </label>


            </form>
            <br>
            @endforeach
            {{$answers->links()}}
            <span class="text-primary fw-bold">Submit the quiz results To:</span>
            <div class="d-block">
                <label for=""></label>
                <select name="students" id="students" class="form-select" wire:model="SubmitTo">

                    <option value="">-- Choose student's name --</option>

                    @foreach($submitToStudents as $Student)
                    <option value="{{$Student->user_id}}">{{$Student->first_name}} {{$Student->last_name}}</option>
                    @endforeach


                </select>
                @error('SubmitTo')
                <strong class="text-danger">{{$message}}</strong>
                @enderror
            </div>
            <div class="d-block p-2">
                <button type="submit" class="btn btn-sm btn-primary" wire:loading.attr="disabled" wire:click.target="markQuiz"><i class="fas fa-check p-1"></i>Mark the quiz</button>

                <div>


                </div>
            </div>
        </div>

    </div>

</div>
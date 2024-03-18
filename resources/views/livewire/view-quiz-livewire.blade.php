<div>
    <div class="col-12">

        <div class="card p-3">

            <h3>Quiz</h3>

            @if (session()->has('quizSubmissionMessage'))
                <div role="alert" class="alert alert-success  alert-dismissible fade show">
                    <strong>{{ session('quizSubmissionMessage') }}</strong>
                    <button class="btn btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif
            <form wire:submit.prevent="submitQuiz">
                @if (count($Questions) > 0)
                    @php
                        $no = 1;
                    @endphp

                    @foreach ($Questions as $Question)
                        {{ $no++ }}). <span class="">{{ $Question->questions }}</span>

                        @foreach ($Question->optionstexts as $option)
                            <div class="d-flex ">
                                <input type="checkbox" value="{{ $option->id }}" class="form-check-input"
                                    wire:model="answer">
                                <label for="" class="form-label px-2">{{ $option->options }}</label>

                                @error('answer')
                                    <strong class="text-danger">{{ $message }}</strong>
                                @enderror

                            </div>
                        @endforeach
                    @endforeach

                    <span class="text-primary fw-bold">Submit the quiz To:</span>
                    <div class="d-block">
                        <label for=""></label>
                        <select name="semesters" id="semesters" class="form-select" wire:model="SubmitTo">

                            <option value="">-- Choose instructor's name --</option>

                            @foreach ($submitToInstructor as $Instructor)
                                <option value="{{ $Instructor->user_id }}">{{ $Instructor->first_name }}
                                    {{ $Instructor->last_name }}</option>
                            @endforeach


                        </select>


                        @error('SubmitTo')
                            <strong class="text-danger">{{ $message }}</strong>
                        @enderror
                    </div>

                    <div class="d-block p-2">
                        <button type="submit" class="btn btn-sm btn-primary" wire:loading.attr="disabled"><i
                                class="fas fa-paper-plane p-1"
                                onclick="confirm('Are you sure you want to submit your quiz ?') || event.stopImmediatePropagation()"></i>
                            Submit quiz</button>


                    </div>
                @else
                    <div role="alert" class="alert alert-danger  alert-dismissible fade show">
                        <strong>No quiz uploaded yet</strong>
                        <button class="btn btn-close" data-bs-dismiss="alert"></button>
                    </div>

                @endif




            </form>


        </div>
    </div>

</div>

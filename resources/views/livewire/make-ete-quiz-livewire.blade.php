<div>
    <div class="col-12">
        <div class="card">
            <h3>Make a quiz question</h3>
            @if (session()->has("quizmessage"))

            <div role="alert" class="alert alert-success  alert-dismissible fade show">
                <strong>{{session("quizmessage")}}</strong>
                <button class="btn btn-close" data-bs-dismiss="alert"></button>
            </div>

            @endif
            <form wire:submit.prevent="questions">

                <div class="d-block">
                    <label for=""></label>
                    <div class="form-floating">
                        <textarea id="quiz" type="text" class="form-control @error('quiz') is-invalid @enderror" value="{{ old('quiz') }}" autocomplete="quiz" autofocus placeholder="Quiz question" wire:model="quiz"></textarea>
                        <label for="" class="form-label">Make a quiz question</label>
                        @error('quiz')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>

                <h3 class="text-primary py-2 fw-bold">FROM :</h3>

                <div class="d-block">
                    <label for=""></label>
                    <select name="QuizSentInstructor" id="QuizSentInstructor" class="form-select" wire:model="QuizSentInstructor">

                        <option value="">-- Respective instructor's name --</option>


                        <option value="{{$SentQuizInstructor->id}}">{{$SentQuizInstructor->first_name}} {{$SentQuizInstructor->last_name}}</option>



                    </select>
                    @error('QuizSentInstructor')
                    <strong class="text-danger">{{$message}}</strong>
                    @enderror
                </div>

                <div class="d-block">
                    <label for=""></label>
                    <select name="students" id="questionDepartment" class="form-select" wire:model="questionDepartment">

                        <option value="">-- Choose department's name --</option>

                        @foreach($respectiveDepartment as $Department)
                        <option value="{{$Department->id}}">{{$Department->department_name}}</option>
                        @endforeach


                    </select>
                    @error('questionDepartment')
                    <strong class="text-danger">{{$message}}</strong>
                    @enderror
                </div>

                <div class="d-block p-2">
                    <button type="submit" class="btn btn-sm btn-primary" wire:loading.attr="disabled"><i class="fas fa-edit p-1"></i> Make quiz</button>


                </div>



            </form>
        </div>
    </div>


</div>
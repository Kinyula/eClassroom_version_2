<div>
    <div class="col-12">
        <div class="card p-3">
            <h3>Make a respective quiz answer option</h3>
            @if (session()->has("quizoptionmessage"))

            <div role="alert" class="alert alert-success  alert-dismissible fade show">
                <strong>{{session("quizoptionmessage")}}</strong>
                <button class="btn btn-close" data-bs-dismiss="alert"></button>
            </div>

            @endif
            <form wire:submit.prevent="options">

                <div class="d-block">
                    <label for=""></label>
                    <select name="QuestionText" id="QuestionText" class="form-select" wire:model="QuestionText">

                        <option value="">-- Choose a rispective question --</option>
                        @foreach ($Quizzes as $Quiz)
                        <option value="{{$Quiz->id}}">{{$Quiz->questions}}</option>
                        @endforeach





                    </select>
                    @error('QuestionText')
                    <strong class="text-danger">{{$message}}</strong>
                    @enderror
                </div>


                <div class="d-block">
                    <label for=""></label>

                    <div class="form-floating">
                        <textarea id="QuizText" type="text" class="form-control @error('QuizText') is-invalid @enderror" value="{{ old('QuizText') }}" autocomplete="QuizText" autofocus placeholder="Quiz question" wire:model="QuizText"></textarea>
                        <label for="" class="form-label">Make it's corresponding answer option </label>
                        @error('QuizText')
                        <strong class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </strong>
                        @enderror
                    </div>
                </div>

                <div class="d-block">
                    <label for=""></label>
                    <select name="" id="" class="form-select" wire:model="correctValue">

                        <option value="">-- Verify the correct value option selected --</option>

                        <option value="true">True</option>
                        <option value="false">False</option>
                    </select>

                    @error('correctValue')
                    <strong class="text-danger">{{$message}}</strong>
                    @enderror
                </div>


                <div class="d-block p-2">
                    <button type="submit" class="btn btn-sm btn-primary" wire:loading.attr="disabled"><i class="fas fa-edit p-1"></i> Make quiz answer option</button>


                </div>



            </form>
        </div>
    </div>


</div>
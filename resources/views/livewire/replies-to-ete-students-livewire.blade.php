<div>
    <div class="col-12">
        <div class="card p-3">


            @if (session()->has("addedStudentReply"))
            <div role="alert" class="alert alert-success  alert-dismissible fade show">
                <strong>{{session("addedStudentReply")}}</strong>
                <button class="btn btn-close" data-bs-dismiss="alert"></button>
            </div>

            @elseif(session()->has("failedReply"))
            <div role="alert" class="alert alert-danger  alert-dismissible fade show">
                <strong>{{session::get("failedReply")}}</strong>
                <button class="btn btn-close" data-bs-dismiss="alert"></button>
            </div>
            @endif
            <form wire:submit.prevent="reply">


                <h5>Write replies from the complaints sent by the student to the choosen student here</h>
                    <textarea name="replyInput" id="" cols="15" rows="0" class="form-control" placeholder="Replies" wire:model="replyInput"></textarea>
                    @error('replyInput')
                    <p class="text-danger fw-bold">{{$message}}</p>
                    @enderror

                    <strong class="fw-bold p-1 fs-2">To:</strong>

                    <br>

                    <select class="form-select" wire:model="replyStudent">
                        <option value="">-- Choose the student to send the replies to --</option>

                        @foreach ($replyStudents as $Csestudent)
                        <option value="{{$Csestudent->user_id}}">{{$Csestudent->first_name}} {{$Csestudent->last_name}}</option>
                        @endforeach
                    </select>
                    @error('replyStudent')
                    <p class="text-danger fw-bold">{{$message}}</p>
                    @enderror
                    <button type="submit" class="btn btn-sm btn-primary my-4"><i class="fas fa-paper-plane p-2" wire:loading.attr="disable"></i>Send a reply</button>

            </form>

        </div>
    </div>
</div>

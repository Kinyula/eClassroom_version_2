<div>
    <div class="col-12">
        <div class="card p-3">

            <div class="filter">
                <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                    <li class="dropdown-header text-start">
                        <h6>Filter</h6>
                    </li>

                    <li><a class="dropdown-item" href="#">Today</a></li>
                    <li><a class="dropdown-item" href="#">This Month</a></li>
                    <li><a class="dropdown-item" href="#">This Year</a></li>
                </ul>
            </div>
            @if (session()->has("addedReply"))
            <div role="alert" class="alert alert-success  alert-dismissible fade show">
                <strong>{{session("addedReply")}}</strong>
                <button class="btn btn-close" data-bs-dismiss="alert"></button>
            </div>

            @elseif(session()->has("failedReply"))
            <div role="alert" class="alert alert-danger  alert-dismissible fade show">
                <strong>{{session::get("failedReply")}}</strong>
                <button class="btn btn-close" data-bs-dismiss="alert"></button>
            </div>
            @endif
            <form wire:submit.prevent="reply">


                <h2>Write replies to the choosen instructor here</h2>
                <textarea name="replyInput" id="" cols="15" rows="0" class="form-control" placeholder="Replies" wire:model="replyInput"></textarea>
                @error('replyInput')
                <p class="text-danger fw-bold">{{$message}}</p>
                @enderror

                <strong class="fw-bold p-1 fs-2">To:</strong>

                <br>

                <select class="form-select" wire:model="replyInstructor">
                    <option value="">-- Choose the instructor to send the replies to --</option>

                    @foreach ($replyInstructors as $Cseinstructor)
                    <option class="fw-bold" value="{{$Cseinstructor->user_id}}">Instructor's full name : {{$Cseinstructor->first_name}} {{$Cseinstructor->last_name}}</option>
                    @endforeach
                </select>
                @error('replyInstructor')
                <p class="text-danger fw-bold">{{$message}}</p>
                @enderror
                <button type="submit" class="btn btn-sm btn-primary my-4"><i class="fas fa-paper-plane p-2" wire:loading.attr="disable"></i>Send a reply</button>

            </form>

        </div>
    </div>
</div>

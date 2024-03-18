<div>
    <div class="col-12">

        <div class="card p-3 ">
            <h3>Student's assignment scores</h3>

            @if ($scores->count() > 0)
            <span class="fw-bold ">Attempted scores : <span class="fw-bold text-success">{{ $scores->scores }}</span></span>
            <span class="fw-bold ">Out of : <span class="text-danger">{{ $scores->total_number_of_questions }}
                    </span>assignment questions</span>
            @else

            <div role="alert" class="alert alert-danger alert-dismissible fade show">
                <strong>Not performed assignment yet</strong>
                <button class="btn-close" data-bs-dismiss="alert"></button>
            </div>

            @endif


        </div>
    </div>
</div>

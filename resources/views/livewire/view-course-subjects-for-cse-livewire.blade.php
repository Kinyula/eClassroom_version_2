<div>

    <div class="row g-1 ms-3">

        @foreach ($getSubjects as $Subject)
            <div class="card col-md-6 ms-3" style="width: 18rem;">
                <div class="card-body p-3">
                    <h5 class="card-title"></h5>
                    <h6 class="card-subtitle mb-2 text-muted"><span class="fw-bold">Course name :
                        </span>{{ $Subject->subject_name }}</h6>
                    <a href="{{ asset('CSE/view-cse-course-documents/' . $Subject->id) }}">
                        <p class="card-text">Course code : {{ $Subject->subject_course_code }}</p>
                    </a>

                </div>
            </div>
        @endforeach
        {{ $getSubjects->links() }}







    </div>
</div>

<div>
    <div class="col-12">

        <div class="card p-3">
            <h3>Course Materials uploaded</h3>
            @if (count($CseDocuments) > 0)
                @foreach ($CseDocuments as $Document)
                    <span class="fw-bold p-2"><span class="text-danger">Subject's name :</span>
                        {{ $Document->subjects->subject_name }}</span>

                    <img src="{{ asset('my_web_documents/' . $Document->file_name) }}" alt="Image not found"
                        srcset="">
                    <br>
                    <button class="btn btn-sm btn-primary fw-bold w-50"
                        wire:click.target="downloadMaterials({{ $Document->id }})" wire:loading.attr="disabled"
                        onclick="confirm('Are you sure you want to download this document ?') || event.stopImmediatePropagation()">
                        <i class="bi bi-download "></i> Download</button>
                @endforeach
            @else
                <div role="alert" class="alert alert-danger  alert-dismissible fade show">
                    <strong>No course materials uploaded yet</strong>
                    <button class="btn btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

        </div>
    </div>

</div>

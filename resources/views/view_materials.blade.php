@section('content')
    @extends('layouts/AuthLayout.frontendLayout')

    <main id="" class="main table table-responsive bg-white">

    @if(Session::has("documentDeleted"))
  <div role="alert" class="alert alert-success alert-dismissible fade show">
    <strong>{{ Session::get("documentDeleted") }}</strong>
    <button class="btn-close" data-bs-dismiss="alert"></button>
  </div>
  @endif
        <h2 class="p-3">Telecommunications Materials</h2>
                  <table class="table table-border datatable ">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Instructor id</th>
                    <th scope="col">Subject id</th>
                    <th scope="col">Document name</th>
                    <th scope="col">Created at</th>
                    <th scope="col">Updated at</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                  @if ($materials->count() > 0)
                  @foreach ($materials as $material)
                  <tr>
                    <th scope="row">{{$material->id}}</th>
                    <td>{{$material->instructors_id}}</td>
                    <td>{{$material->subject_id}}</td>
                    <td>{{$material->file_name}}</td>
                    <td>{{$material->created_at}}</td>
                    <td>{{$material->updated_at}}</td>
                    <td>
                      <div class="d-flex">
                      <a href="{{ Route('deletematerial',$material->id)}}"><button class=" btn btn-danger btn-sm"><i class="fas fa-trash"></i></button></a>
                    <!-- <a class="px-2" href=""><button class="  btn btn-success btn-sm"><i class="fas fa-edit"></i></button></a> -->
                      </div>

                    </td>


                  </tr>
                  @endforeach
                  @else
  
                  @endif
            
                </tbody>
              </table>
    </main>
@endsection
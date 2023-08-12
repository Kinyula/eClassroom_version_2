@section('content')
    @extends('layouts/AuthLayout.frontendLayout')

    <main id="" class="main table table-responsive bg-white">

    @if(Session::has("deleteOperation"))
  <div role="alert" class="alert alert-success alert-dismissible fade show">
    <strong>{{ Session::get("deleteOperation") }}</strong>
    <button class="btn-close" data-bs-dismiss="alert"></button>
  </div>
  @endif
        <h2 class="p-3">Telecommunications Engineering staff</h2>
                  <table class="table table-border datatable ">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">First name</th>
                    <th scope="col">Last name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Phone number</th>
                    <th scope="col">Gender</th>
                    <th scope="col">Teaching course name</th>
                    <th scope="col">Department name</th>
                    <th scope="col">Created at</th>
                    <th scope="col">Updated at</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                  @if ($instructors->count() > 0)
                  @foreach ($instructors as $instructor)
                  <tr>
                    <th scope="row">{{$instructor->id}}</th>
                    <td>{{$instructor->first_name}}</td>
                    <td>{{$instructor->last_name}}</td>
                    <td>{{$instructor->email}}</td>
                    <td>{{$instructor->phone_number}}</td>
                    <td>{{$instructor->gender}}</td>
                    <td>{{$instructor->teaching_course_name}}</td>
                    <td>{{$instructor->department_name}}</td>
                    <td>{{$instructor->created_at}}</td>
                    <td>{{$instructor->updated_at}}</td>
                    <td>
                      <div class="d-flex">
                      <a href="{{ Route('deleteinstructor',$instructor->id)}}"><button class=" btn btn-danger btn-sm"><i class="fas fa-trash"></i></button></a>
                      </div>

                    </td>


                  </tr>
                  @endforeach
                  @else
                  <tr>
                    <th scope="row"></th>
                    <td class="alert alert-danger">No user(s) registered</td>
                  </tr>
                  @endif
            
                </tbody>
              </table>
    </main>
@endsection
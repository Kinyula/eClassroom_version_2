@extends('layouts.AuthLayout.frontendLayout')
@section('content')

<main id="main" class="main">
    <div class="container table-responsive bg-white w-100">
        <div class="profile-container">
            <h2 class="p-3 bi bi-person">
                View profile
            </h2>



        </div>

        <table class="table table-border datatable table-responsive bg-white">

            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">First name</th>
                    <th scope="col">Middle name</th>
                    <th scope="col">Last name</th>
                    <th scope="col">Gender</th>
                    <th scope="col">Email</th>
                    <th scope="col">Phone number</th>
                    <th scope="col">Status</th>
                    <th scope="col">Created at</th>
                    <th scope="col">Updated at</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>

                <tr>


                    <td>{{$users->id}}</td>
                    <td>{{$users->first_name}}</td>
                    <td>{{$users->middle_name}}</td>
                    <td>{{$users->last_name}}</td>
                    <td>{{$users->gender}}</td>
                    <td>{{$users->email}}</td>
                    <td>{{$users->phone_number}}</td>
                    <td>{{$users->status}}</td>
                    <td>{{$users->created_at->diffForHumans()}}</td>
                    <td>{{$users->updated_at->diffForHumans()}}</td>
                    <td>
                        <div class="d-flex">

                            <a class="px-2" href="{{url('edit-student-information/'.$users->id)}}"><button class="  btn btn-success btn-sm"><i class="fas fa-edit"></i></button></a>
                        </div>

                    </td>




                </tr>



            </tbody>
        </table>


    </div>
</main>
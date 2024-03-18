@extends('layouts.AuthLayout.frontendLayout')

@section('content')

@livewire('view-ete-course-documents-livewire' , ['id' => $id])

@endsection
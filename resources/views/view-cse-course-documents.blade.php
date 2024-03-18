@extends('layouts.AuthLayout.frontendLayout')

@section('content')

@livewire('cse-documents-livewire' , ['id' => $id])

@endsection
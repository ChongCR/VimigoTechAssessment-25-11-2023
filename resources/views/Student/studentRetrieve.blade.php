@extends('layouts.layout')

@section('content')
    <div class="container text-center mb-5">
        <p style="text-align: left;" class="mb-3"><span class="path fs-6">{{ request()->path() }}</span></p>

        <div class="card mx-auto">
            <div class="card-header">
                Student Details
            </div>
            <div class="card-body text-start">
                <p class="card-title">Student Name : <b class="ml-3">{{ $studentResource->name }}</b></p>
                <p class="card-text">Email Address : <b class="ml-3">{{ $studentResource->email }}</b></p>
                <p class="card-text">Address : <b class="ml-3">{{ $studentResource->address }}</b></p>
                <p class="card-text">Course : <b class="ml-3">{{ $studentResource->course }}</b></p>
                <p class="card-text">Created Time : <b class="ml-3">{{ $studentResource->created_at->format('Y-m-d H:i:s') }}</b></p>
                <p class="card-text">Last Updated : <b class="ml-3">{{ $studentResource->updated_at->format('Y-m-d H:i:s') }}</b></p>
            </div>
            <div class="d-flex justify-content-between m-3">
                <a href="{{ route('students.index') }}" class="btn btn-secondary btn-block w-50 m-1">Back</a>
                <a href="{{ route('students.edit', $studentResource->id) }}" class="btn btn-primary btn-block w-50 m-1">Edit</a>
            </div>
        </div>
    </div>
@endsection

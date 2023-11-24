@extends('layouts.layout')

@section('content')
    <div class="container text-center mb-5">
        <p style="text-align: left;" class="mb-3"><span class="path fs-6">{{ request()->path() }}</span></p>
        <div class="card mx-auto">
            <div class="card-header">
                Create Student
            </div>
            <div class="card-body text-start">
                <form action="{{ route('students.store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label fw-bold">Student Name</label>
                        <input type="text" class="form-control" id="name" name="name" required>
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label fw-bold">Email Address</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>

                    <div class="mb-3">
                        <label for="address" class="form-label fw-bold">Address</label>
                        <input type="text" class="form-control" id="address" name="address" required>
                    </div>

                    <div class="mb-3">
                        <label for="course" class="form-label fw-bold">Course</label>
                        <input type="text" class="form-control" id="course" name="course" required>
                    </div>

                    <div class="d-flex justify-content-between mt-3">
                        <a href="{{ route('students.index') }}" class="btn btn-secondary btn-block w-50 m-1">Back</a>
                        <button type="submit" class="btn btn-primary btn-block w-50 m-1">Create</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

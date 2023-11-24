@extends('layouts.layout')

@section('content')
    <div class="container text-center mb-5">

        <p style="text-align: left;" class="mb-3"><span class="path fs-6">{{ request()->path() }}</span></p>

        <div class="card mx-auto">
            <div class="card-header">
                Edit Student Details
            </div>
            <div class="card-body text-start">
                <form action="{{ route('students.update', $studentResource->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="name" class="form-label fw-bold">Student Name</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{ $studentResource->name }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label fw-bold">Email Address</label>
                        <input type="email" class="form-control" id="email" name="email" value="{{ $studentResource->email }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="address" class="form-label fw-bold">Address</label>
                        <input type="text" class="form-control" id="address" name="address" value="{{ $studentResource->address }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="course" class="form-label fw-bold">Course</label>
                        <input type="text" class="form-control" id="course" name="course" value="{{ $studentResource->course }}" required>
                    </div>

                    <div class="d-flex justify-content-between mt-3">
                        <a href="{{ route('students.index') }}" class="btn btn-secondary">Back</a>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>


                </form>
            </div>
        </div>
    </div>
@endsection

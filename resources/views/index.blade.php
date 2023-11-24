@extends('layouts.layout')

@section('content')
    <div class="container-fluid m-0 d-flex flex-column justify-content-start align-items-center min-vh-100 ">
        <!-- Student Registry Panel (Banner) -->
        <div class="row col-md-12 m-1  ">
            <div class="col-md-12 text-center p-5 bg-light" >
                <h3 class="text-primary">Student Registry Panel</h3>
                <div>
                    <p><b>South of Australia University</b></p>
                </div>
            </div>
        </div>

        <!-- Info Card: Student -->
        <div class="row col-md-12 mt-3 d-flex align-items-center justify-content-center">
            <div class="col-6 col-md-4">
                <div class="card bg-primary text-white w-100 text-center ">
                    <div class="card-body ">
                        <h5 class="card-title">Student Management</h5>
                        <p class="card-text">Total Students Recorded : <b>{{$totalStudents}} </b></p>
                        <a href="{{ route('students.index') }}" class="btn btn-light w-100">Enter</a>
                    </div>
                </div>
            </div>


        </div>
    </div>

    <script>
        fetch('/api/login', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
            },
            body: JSON.stringify({ email, password })
        })
            .then(response => response.json())
            .then(data => {
                if (data.access_token) {
                    localStorage.setItem('access_token', data.access_token);
                    window.location.href = '/index';
                } else {

                }
            })
            .catch(error => {
                console.error('Error:', error);
            });
    </script>

@endsection

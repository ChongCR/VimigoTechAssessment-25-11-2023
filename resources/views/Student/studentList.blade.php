@extends('layouts.layout')

@section('content')

    <style>
        .custom-table th, .custom-table td {
            font-size: smaller; /* Smaller font size */
            font-weight: bold;   /* Bold font */
        }
    </style>

    <div class="container text-center">

        <h2 class="mb-4">Student List</h2>

        <p style="text-align: left;" class="mb-3"><span class="path fs-6">{{ request()->path() }}</span></p>




        <div class="row mb-3">
            <div class="col-md-8">
                <input type="text" id="search" class="form-control" placeholder="Search by name or email...">
            </div>
            <div class="col-md-4 d-flex justify-content-end">
                <a href="{{ route('import.index') }}" class="btn btn-primary m-1 flex-grow-1">Import Excel/CSV</a>
                <a href="{{ route('students.create') }}" class="btn btn-success m-1 flex-grow-1">Create Student</a>
            </div>
        </div>

        <div class="table-responsive mx-auto">
            <table class="table table-striped table-light table-bordered custom-table">
            <thead class="table-secondary">
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Student Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Course</th>
                    <th scope="col">Actions</th>
                </tr>
                </thead>
                <tbody>


                @forelse ($students as $student)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $student->name }}</td>
                        <td>{{ $student->email }}</td>
                        <td>{{ $student->course }}</td>
                        <td>
                            <a href="{{ route('students.show', $student->id) }}" class="btn btn-info btn-sm">View</a>
                            <a href="{{ route('students.edit', $student->id) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('students.delete', $student->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5">No students found.</td>
                    </tr>
                @endforelse

                </tbody>
            </table>

            <!-- Pagination Links -->
            <div class="justify-content-center">
                {{ $students->links() }}
            </div>
        </div>
        <p class="float-start m-0">Total Students recorded in DB: <b>{{ $totalStudents }}</b></p> <br>

        <div class="float-start mt-3 mb-5">
            <a href="{{ route('students.backToIndex') }}" class="btn btn-secondary" style="width:100px;">Back</a>
        </div>

    </div>

    <script>
        $(document).ready(function() {
            $('#search').on('keyup', function() {
                var query = $(this).val();

                $.ajax({
                    url: "{{ route('students.search') }}",
                    type: "GET",
                    data: {'search': query},
                    success: function(data) {
                        $('tbody').html(data);
                    }
                })

                    .fail(function() {
                        alert('Search could not be performed. Please try again.');
                    });
            });
        });
    </script>


@endsection

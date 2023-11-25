@extends('layouts.layout')

@section('content')

    <div class="container mt-5">
        <div class="row justify-content-center">
            <p style="text-align: left;" class="mb-3"><span class="path fs-6">{{ request()->path() }}</span></p>
            <div class="col-md-12">
                <div class="alert alert-light text-center" role="alert" style="margin: 20px;">

                    <h2 class="mb-4"><strong>Excel Import Form</strong></h2>

                    @if(session('info'))
                        <div class="col-md-8 offset-md-2">
                            <div class="alert alert-danger">
                                {{ session('info') }}
                            </div>
                        </div>
                    @endif

                    @if(session('success'))
                        <div class="col-md-8 offset-md-2">
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        </div>
                    @endif

                    @if(session('error'))
                        <div class="col-md-8 offset-md-2">
                            <div class="alert alert-danger">
                                {{ session('error') }}
                            </div>
                        </div>
                    @endif

                    <form action="{{ route('import.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <label for="operation" class="mb-2 col-md-6"><strong>Select Operation:</strong></label>
                        <div class="form-group col-md-6 m-auto mb-4">

                            <select class="form-control" id="operation" name="operation">
                                <option value="insert">Insert</option>
                                <option value="update">Update</option>
                                <option value="delete">Delete</option>
                            </select>
                        </div>
                        <div class="form-group col-md-6 m-auto mb-4">
                             <label for="file" class="mb-2"><strong>Choose Excel File:</strong></label><br>
                             <input type="file" class="form-control-file" id="file" name="file" accept=".csv, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel" required>
                        </div>

                        <a href="{{ route('generate.excel') }}" class="btn btn-primary btn-block col-md-6 m-auto mb-4">Download Sample Excel</a>

                        <button type="submit" class="btn btn-primary btn-block col-md-6 m-auto mb-4">Confirm</button>

                        <a href="{{ route('students.index') }}" class="btn btn-secondary btn-block col-md-6 m-auto mb-4">Back</a>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection

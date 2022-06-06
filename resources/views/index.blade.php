@extends('layouts.main')
@section('content')
<div class="container mt-5">
    <h1 class="text-center">Create new Employee</h1>
    <div class="row">

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @if(session('success'))
            <div class="aler alert-success text-center">
                {{ session('success') }}
            </div>
        @endif
    <form id="form" class="needs-validation" enctype="multipart/form-data" novalidate>

        {{ csrf_field() }}

        <div class="form-group">
            <label for="1">Email</label>
            <input type="text" class="form-control" id="1" placeholder="Email" name="employee_email" required>
        </div>
        <div class="form-group">
            <label for="2">Name</label>
            <input type="text" class="form-control" id="2" placeholder="Name" name="employee_name" required>
        </div>
        <div class="form-group">
            <label for="3">Age</label>
            <input type="text" class="form-control" id="3" placeholder="Age" name="employee_age" required>
        </div>
        <div class="form-group">
            <label for="4">Experience</label>
            <input type="text" class="form-control" id="4" placeholder="Experience" name="employee_experience" required>
        </div>
        <div class="form-group">
            <label for="5">Salary</label>
            <input type="text" class="form-control" id="5" placeholder="Salary" name="employee_salary" required>
        </div>
        <input type="file" class="mt-3 form-control-file" id="6" name="employee_photo" accept="image/*" required >
        <div class="invalid-feedback">
            Pleas download photo
        </div>

        <button type="submit" class="btn btn-primary">Create</button>
    </form>
    </div>

    <a class="mt-4 btn btn-outline-info" id="allEmp">All Employees</a>
</div>

<div class="mt-5 container">
    <div class="row">
        <div id="info"></div>
        <div class="accordion" id="accordionExample" style="display:none">
        </div>
        </div>
    </div>
@endsection

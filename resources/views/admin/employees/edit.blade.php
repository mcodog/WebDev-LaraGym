@extends('admin.shared.layouts')
<style>
        body {
            background-image: url('{{ asset("images/background2.jpg") }}');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            background-color: #49243E; /* Change the background color as needed *   /
            color: white; /* Change text color to white */
        }

        .transparent-container {
            background-color: #C6EBC5; /* Set background color with alpha value for transparency */
            padding: 10px; /* Add padding for better visibility */
            border-radius: 10px; /* Add border radius for rounded corners */
        }

        .transparent-card {
            background-color: transparent !important; /* Set card background color to transparent */
            border: none; /* Remove card border */
            color: #E178C5; /* Change card text color to white */
        }
    </style>
@section('content')
<h1>Edit Employees</h1>
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<form enctype="multipart/form-data" action="{{url('/employee/'. $employee->id .'/update')}}" method="POST">
    @csrf
    <label for="first_name">First Name</label>
    <input type="text" name="first_name" value="{{ $employee->first_name }}"> <br>
    
    <label for="last_name">Last Name</label>
    <input type="text" name="last_name" value="{{ $employee->last_name }}"> <br>
    
    <label for="age">Age</label>
    <input type="number" id="age" name="age" min="1" value="{{ $employee->age }}"> <br>

    <label for="gender">Gender</label>
    <select name="gender" id="gender" value="{{ $employee->gender }}">
        <option value="Male">Male</option>
        <option value="Female">Female</option>
    </select> <br>
    
    <label for="type">Job Type</label>
    <input type="text" name="type" value="{{ $employee->job_type }}"> <br>
    
    <label for="status">Status</label>
    <select name="status" id="status" value="{{ $employee->status }}">
        <option value="Active">Active</option>
        <option value="On Leave">On Leave</option>
        <option value="On Vacation">On Vacation</option>
        <option value="Terminated">Terminated</option>
    </select> <br>
    
    <label for="image">Image</label> <img src="{{ $employee->getImage() }}" alt="Employee" style="width:50px;">
    <input type="file" name="image"> <br>
    <input class="btn btn-primary" type="submit">
</form>
@endsection

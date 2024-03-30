@extends('admin.shared.layouts')

@section('content')
<div class="container">
    <h1>Edit Employee</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form enctype="multipart/form-data" action="{{ url('/employee/' . $employee->id . '/update') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="first_name">First Name</label>
            <input type="text" class="form-control" id="first_name" name="first_name" value="{{ $employee->first_name }}">
        </div>

        <div class="form-group">
            <label for="last_name">Last Name</label>
            <input type="text" class="form-control" id="last_name" name="last_name" value="{{ $employee->last_name }}">
        </div>

        <div class="form-group">
            <label for="age">Age</label>
            <input type="number" class="form-control" id="age" name="age" min="1" value="{{ $employee->age }}">
        </div>

        <div class="form-group">
            <label for="gender">Gender</label>
            <select class="form-control" id="gender" name="gender">
                <option value="Male" {{ $employee->gender === 'Male' ? 'selected' : '' }}>Male</option>
                <option value="Female" {{ $employee->gender === 'Female' ? 'selected' : '' }}>Female</option>
            </select>
        </div>

        <div class="form-group">
            <label for="type">Job Type</label>
            <input type="text" class="form-control" id="type" name="type" value="{{ $employee->job_type }}">
        </div>

        <div class="form-group">
            <label for="status">Status</label>
            <select class="form-control" id="status" name="status">
                <option value="Active" {{ $employee->status === 'Active' ? 'selected' : '' }}>Active</option>
                <option value="On Leave" {{ $employee->status === 'On Leave' ? 'selected' : '' }}>On Leave</option>
                <option value="On Vacation" {{ $employee->status === 'On Vacation' ? 'selected' : '' }}>On Vacation</option>
                <option value="Terminated" {{ $employee->status === 'Terminated' ? 'selected' : '' }}>Terminated</option>
            </select>
        </div>

        <div class="form-group">
            <label for="image">Image</label>
            <img src="{{ $employee->getImage() }}" alt="Employee" style="width: 50px;">
            <input type="file" class="form-control-file" id="image" name="image">
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@endsection

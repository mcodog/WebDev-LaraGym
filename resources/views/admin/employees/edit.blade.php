@extends('admin.shared.layouts')

@section('content')
<div class="container mt-5" style="background-image: url('{{ asset('images/background2.jpg') }}'); background-size: cover; background-position: center;">
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
    <form enctype="multipart/form-data" action="{{ url('/employee/' . $employee->id . '/update') }}" method="POST" class="mt-4">
        @csrf
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="first_name">First Name</label>
                    <input type="text" class="form-control" name="first_name" value="{{ $employee->first_name }}">
                </div>
                <div class="form-group">
                    <label for="last_name">Last Name</label>
                    <input type="text" class="form-control" name="last_name" value="{{ $employee->last_name }}">
                </div>
                <div class="form-group">
                    <label for="age">Age</label>
                    <input type="number" class="form-control" id="age" name="age" min="1" value="{{ $employee->age }}">
                </div>
                <div class="form-group">
                    <label for="gender">Gender</label>
                    <select class="form-control" name="gender" id="gender">
                        <option value="Male" {{ $employee->gender == 'Male' ? 'selected' : '' }}>Male</option>
                        <option value="Female" {{ $employee->gender == 'Female' ? 'selected' : '' }}>Female</option>
                    </select>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="type">Job Type</label>
                    <input type="text" class="form-control" name="type" value="{{ $employee->job_type }}">
                </div>
                <div class="form-group">
                    <label for="status">Status</label>
                    <select class="form-control" name="status" id="status">
                        <option value="Active" {{ $employee->status == 'Active' ? 'selected' : '' }}>Active</option>
                        <option value="On Leave" {{ $employee->status == 'On Leave' ? 'selected' : '' }}>On Leave</option>
                        <option value="On Vacation" {{ $employee->status == 'On Vacation' ? 'selected' : '' }}>On Vacation</option>
                        <option value="Terminated" {{ $employee->status == 'Terminated' ? 'selected' : '' }}>Terminated</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="image">Image</label>
                    <img src="{{ $employee->getImage() }}" alt="Employee" style="width: 50px;">
                    <input type="file" class="form-control-file" name="image">
                </div>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@endsection

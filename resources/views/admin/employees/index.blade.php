@extends('admin.shared.layouts')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h1>Employees</h1>
                </div>
                <div class="card-body">     
                    <table class="table table-striped table-hover text-center">
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Age</th>
                        <th>Gender</th>
                        <th>Job Type</th>
                        <th>Status</th>
                        <th>Image</th>
                        <th>Controls</th>

                        @foreach($employee as $employees)

                        <tr>
                            <td>{{ $employees->first_name }}</td>
                            <td>{{ $employees->last_name }}</td>
                            <td>{{ $employees->age }}</td>
                            <td>{{ $employees->gender }}</td>
                            <td>{{ $employees->job_type  }}</td>
                            <td>{{ $employees->status  }}</td>
                            <td><img src="{{ $employees->getImage() }}" alt="Employee" style="width:50px;"></td>
                            <td><a href="{{ url('employee/'. $employees->id .'/edit') }}">Edit</a> &nbsp <a href="{{url('employee/'. $employees->id.'/delete')}}">Delete</a></td>
                        </tr>
                        @endforeach
                    </table>
                    <a href="employee/create">Create New</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
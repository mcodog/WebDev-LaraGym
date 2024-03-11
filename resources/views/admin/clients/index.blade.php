@extends('admin.shared.layouts')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h1>Client</h1>
                </div>
                <div class="card-body">
                <table class="table table-striped table-hover text-center">
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Age</th>
                    <th>Gender</th>
                    <th>Membership Type</th>
                    <th>Membership Expiration</th>
                    <th>Total Visits</th>
                    <th>Image</th>
                    <th>Controls</th>

                    @foreach($client as $clients)

                    <tr>
                        <td>{{ $clients->first_name }}</td>
                        <td>{{ $clients->last_name }}</td>
                        <td>{{ $clients->age }}</td>
                        <td>{{ $clients->gender }}</td>
                        <td>{{ $clients->membership_type  }}</td>
                        <td>{{ $clients->membership_expiration  }}</td>
                        <td>{{ $clients->total_visit  }}</td>
                        <td><img src="{{ $clients->getImage() }}" alt="Client" style="width:50px;"></td>
                        <td><a href="{{ url('client/'. $clients->id .'/edit') }}">Edit</a> &nbsp <a href="{{url('client/'. $clients->id.'/delete')}}">Delete</a></td>
                    </tr>

                    @endforeach
                </table>
                <a href="client/create">Create New</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
    @extends('admin.shared.layouts')
    <style>
        body {
            background-image: url('{{ asset("images/background3.jpg") }}');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            background-color: #49243E; /* Change the background color as needed */
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
    <div class="container mt-5" style="background-color: rgba(239, 188, 155, 0.7); background-size: cover; background-position: center;">
    <div class="container mt-5">
        <h1>Create Client</h1>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form enctype="multipart/form-data" action="{{ route('client.store') }}" method="POST" class="mt-4">
            @csrf
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="first_name">First Name</label>
                        <input type="text" class="form-control" name="first_name">
                    </div>
                    <div class="form-group">
                        <label for="last_name">Last Name</label>
                        <input type="text" class="form-control" name="last_name">
                    </div>
                    <div class="form-group">
                        <label for="age">Age</label>
                        <input type="number" class="form-control" id="age" name="age" min="1" max="100">
                    </div>
                    <div class="form-group">
                        <label for="gender">Gender</label>
                        <select class="form-control" name="gender" id="gender">
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="type">Membership Type</label>
                        <select class="form-control" name="type" id="type">
                            <option value="Standard Membership">Standard Membership</option>
                            <option value="Premium Membership">Premium Membership</option>
                            <option value="VIP">VIP</option>
                            <option value="Student Membership">Student Membership</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="expiration_date">Expiration Date</label>
                        <input type="date" class="form-control" name="expiration_date">
                    </div>
                    <div class="form-group">
                        <label for="image">Image</label>
                        <input type="file" class="form-control-file" name="image">
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
    @endsection

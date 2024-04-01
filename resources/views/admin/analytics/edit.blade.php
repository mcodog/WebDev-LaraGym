@extends('admin.shared.layouts')
<style>
        body {
            background-image: url('{{ asset("images/background4.jpg") }}');
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
    <h1>Edit Client</h1>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form enctype="multipart/form-data" action="{{ url('/analytics/' . $client->id . '/update') }}" method="POST" class="mt-4">
        @csrf
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="name">Transaction ID:</label>
                    <input type="text" name="transactionID" id="transactionID" class="form-control" value="{{ $client->id }}" disabled>
                </div>

                <div class="form-group">
                    <label for="first_name">User</label>
                    <input type="text" class="form-control" name="user" value="{{ $client->user_id }}">
                </div>
                <div class="form-group">
                    <label for="age">Duration</label>
                    <input type="number" class="form-control" id="duration" name="duration" min="1" max="100" value="{{ $client->duration }}">
                </div>
                <div class="form-group">
                    <label for="gender">Payment</label>
                    <input type="number" class="form-control" id="payment" name="payment" value="{{ $client->payment }}" readonly>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="type">Membership Type</label>
                    <select class="form-control" name="membership_plan" id="membership_plan">
                        <option value="{{ $client->membership_type }}">{{ $client->membership_type }}</option>
                        <option value="Standard Membership">Standard Membership</option>
                        <option value="Premium Membership">Premium Membership</option>
                        <option value="VIP">VIP</option>
                        <option value="Student Membership">Student Membership</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="expiration_date">Date</label>
                    <input type="date" class="form-control" name="expiration_date" value="{{ date('Y-m-d', strtotime($client->created_at)) }}">
                </div>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
    <script>
        var inputElement = document.getElementById('duration');
        var paymentVal = document.getElementById('payment');

        inputElement.addEventListener('input', function(event) {
            var membershipType = document.getElementById('membership_plan');
            var memTypeVal = membershipType.value
            if(memTypeVal === "Standard" || memTypeVal === "Standard Membership") {
                paymentVal.value = 2000 * event.target.value;
            } else if (memTypeVal === "Premium" || memTypeVal === "Premium Membership") {
                paymentVal.value = 3000 * event.target.value;
            } else if (memTypeVal === "VIP" || memTypeVal === "VIP Membership") {
                paymentVal.value = 3500 * event.target.value;
            } else {
                alert("Please select a membership type.");
            }
        });

        var membershipType = document.getElementById('membership_plan');

        membershipType.addEventListener('input', function(event) {
            var memTypeVal = membershipType.value
            var durationVal = inputElement.value
            console.log('ch');
            if(memTypeVal === "Standard" || memTypeVal === "Standard Membership") {
                paymentVal.value = 2000 * durationVal;
            } else if (memTypeVal === "Premium" || memTypeVal === "Premium Membership") {
                paymentVal.value = 3000 * durationVal;
            } else if (memTypeVal === "VIP" || memTypeVal === "VIP Membership") {
                paymentVal.value = 3500 * durationVal;
            } else {
                alert("Please select a membership type.");
            }
        });
    </script>
</div>
@endsection

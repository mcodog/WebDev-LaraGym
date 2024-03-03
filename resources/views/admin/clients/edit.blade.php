@extends('admin.shared.layouts')

@section('content')
<h1>Create Client</h1>
<form enctype="multipart/form-data" action="{{url('/client/update')}}" method="POST">
    @csrf
    <label for="first_name">First Name</label>
    <input type="text" name="first_name" value="{{ $client->first_name }}"> <br>
    
    <label for="last_name">Last Name</label>
    <input type="text" name="last_name" value="{{ $client->last_name }}"> <br>
    
    <label for="age">Age</label>
    <input type="number" id="age" name="age" min="1" max="100" value="{{ $client->age }}"> <br>

    <label for="gender">Gender</label>
    <select name="gender" id="gender">
        <option value="{{ $client->gender }}">{{ $client->gender }}</option>
        <option value="Male">Male</option>
        <option value="Female">Female</option>
    </select> <br>
    
    <label for="type">Membership Type</label>
    <select name="type" id="type">
        <option value="{{ $client->membership_type }}">{{ $client->membership_type }}</option>
        <option value="Standard Membership">Standard Membership</option>
        <option value="Premium Membership">Premium Membership</option>
        <option value="VIP">VIP</option>
        <option value="Student Membership">Student Membership</option>
    </select> <br>
    
    <label for="status">Expiration Date</label>
    <input type="date" name="expiration_date" value="{{ $client->membership_expiration }}"> <br>
    <input type="text"></input>
    
    <label for="image">Image</label>
    <input type="file" name="image"> <br>
    <input class="btn btn-primary" type="submit">

    <script>
        document.getElementById("expiration_date").value = "{{ date($client->membership_expiration) }}";
    </script>
</form>
@endsection
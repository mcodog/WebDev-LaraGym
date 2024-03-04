@extends('admin.shared.layouts')

@section('content')
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
<form enctype="multipart/form-data" action="{{url('/client/store')}}" method="POST">
    @csrf
    <label for="first_name">First Name</label>
    <input type="text" name="first_name"> <br>
    
    <label for="last_name">Last Name</label>
    <input type="text" name="last_name"> <br>
    
    <label for="age">Age</label>
    <input type="number" id="age" name="age" min="1" max="100"> <br>

    <label for="gender">Gender</label>
    <select name="gender" id="gender">
        <option value="Male">Male</option>
        <option value="Female">Female</option>
    </select> <br>
    
    <label for="type">Membership Type</label>
    <select name="type" id="type">
        <option value="Standard Membership">Standard Membership</option>
        <option value="Premium Membership">Premium Membership</option>
        <option value="VIP">VIP</option>
        <option value="Student Membership">Student Membership</option>
    </select> <br>
    
    <label for="status">Expiration Date</label>
    <input type="date" name="expiration_date"> <br>
    
    <label for="image">Image</label>
    <input type="file" name="image"> <br>
    <input class="btn btn-primary" type="submit">
</form>
@endsection
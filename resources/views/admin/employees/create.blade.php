@extends('admin.shared.layouts')

@section('content')
<h1>Create Employees</h1>
<form enctype="multipart/form-data" action="{{url('/employee/store')}}" method="POST">
    <label for="first_name">First Name</label>
    <input type="text" name="first_name"> <br>
    
    <label for="last_name">Last Name</label>
    <input type="text" name="last_name"> <br>
    
    <label for="age">Age</label>
    <input type="number" id="age" name="age" min="1" max="5"> <br>

    <label for="gender">Gender</label>
    <select name="gender" id="gender">
        <option value="Male">Male</option>
        <option value="Female">Female</option>
    </select> <br>
    
    <label for="type">Job Type</label>
    <input type="text" name="type"> <br>
    
    <label for="status">Status</label>
    <select name="status" id="status">
        <option value="Active">Active</option>
        <option value="On Leave">On Leave</option>
        <option value="On Vacation">On Vacation</option>
        <option value="Terminated">Terminated</option>
    </select> <br>
    
    <label for="image">Image</label>
    <input type="file" name="image"> <br>
    <input class="btn btn-primary" type="submit">
</form>
@endsection
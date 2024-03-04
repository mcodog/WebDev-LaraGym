@extends('admin.shared.layouts')

@section('content')
<h1>Create Manufacturer</h1>
<form enctype="multipart/form-data" action="{{ url('manufacturer/store') }}" method="post" >
    @csrf
    <label for="weight">Description</label>
    <input type="text" name="description"> <br>

    <label for="weight">Address</label>
    <input type="text" name="address"> <br>

    <label for="weight">Contact</label>
    <input type="tel" name="contact"> <br>

    <label for="image">Image</label>
    <input type="file" name="image"> <br>

    <button type="submit">Save</button>
</form>
@endsection
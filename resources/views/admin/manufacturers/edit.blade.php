@extends('admin.shared.layouts')

@section('content')
<h1>Edit Manufacturer</h1>
<form enctype="multipart/form-data" action="{{ url('manufacturer/'. $manufacturer->id .'/update') }}" method="post" >
    @csrf
    <label for="weight">Description</label>
    <input type="text" name="description" value="{{ $manufacturer->description }}"> <br>

    <label for="weight">Address</label>
    <input type="text" name="address" value="{{ $manufacturer->address }}"> <br>

    <label for="weight">Contact</label>
    <input type="tel" name="contact" value="{{ $manufacturer->contact }}"> <br>

    <label for="image">Image</label> <img src="{{ $manufacturer->getImage() }}" alt="Manufacturer" style="width:50px;">
    <input type="file" name="image"> <br>

    <button type="submit">Save</button>
</form>
@endsection
@extends('admin.shared.layouts')

@section('content')
<div class="container mt-5">
    <h1>Edit Manufacturer</h1>
    <form enctype="multipart/form-data" action="{{ url('manufacturer/'. $manufacturer->id .'/update') }}" method="post" class="mt-4">
        @csrf
        <div class="form-group">
            <label for="description">Description</label>
            <input type="text" class="form-control" name="description" value="{{ $manufacturer->description }}">
        </div>
        <div class="form-group">
            <label for="address">Address</label>
            <input type="text" class="form-control" name="address" value="{{ $manufacturer->address }}">
        </div>
        <div class="form-group">
            <label for="contact">Contact</label>
            <input type="tel" class="form-control" name="contact" value="{{ $manufacturer->contact }}">
        </div>
        <div class="form-group">
            <label for="image">Image</label>
            <img src="{{ $manufacturer->getImage() }}" alt="Manufacturer" style="width: 50px;">
            <input type="file" class="form-control-file" name="image">
        </div>
        <button type="submit" class="btn btn-primary">Save</button>
    </form>
</div>
@endsection

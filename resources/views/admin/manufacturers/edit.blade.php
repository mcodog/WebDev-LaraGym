@extends('admin.shared.layouts')
<style>
        body {
            background-image: url('{{ asset("images/background13.jpg") }}');
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

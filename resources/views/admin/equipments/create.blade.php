@extends('admin.shared.layouts')
<style>
        body {
            background-image: url('{{ asset("images/background10.jpg") }}');
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
    <h1>Create Equipment</h1>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form enctype="multipart/form-data" action="{{ url('/equipment/store') }}" method="POST" class="mt-4">
        @csrf
        <div class="form-group">
            <label for="description">Description</label>
            <input type="text" class="form-control" name="description">
        </div>
        <div class="form-group">
            <label for="category">Category</label>
            <select class="form-control" name="category">
                <option value="Cardio Equipment">Cardio Equipment</option>
                <option value="Strength Training Equipment">Strength Training Equipment</option>
                <option value="Functional Training">Functional Training</option>
                <option value="Flexibility and Mobility Training">Flexibility and Mobility Training</option>
                <option value="Recovery Equipment">Recovery Equipment</option>
                <option value="Miscellaneous">Miscellaneous</option>
            </select>
        </div>
        <div class="form-group">
            <label for="manufacturer">Manufacturer</label>
            <select class="form-control" name="manufacturer">
                @foreach($manufacturers as $manufacturer)
                    <option value="{{ $manufacturer->id }}">{{ $manufacturer->description }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="dimension">Dimension</label>
            <input type="text" class="form-control" name="dimension">
        </div>
        <div class="form-group">
            <label for="weight">Weight</label>
            <input type="text" class="form-control" name="weight">
        </div>
        <div class="form-group">
            <label for="cost">Cost</label>
            <input type="text" class="form-control" name="cost">
        </div>
        <div class="form-group">
            <label for="notes">Notes</label>
            <input type="text" class="form-control" name="notes">
        </div>
        <div class="form-group">
            <label for="image">Image</label>
            <input type="file" class="form-control-file" name="image">
        </div>
        <button type="submit" class="btn btn-primary">Save</button>
    </form>
</div>
@endsection

@extends('admin.shared.layouts')

@section('content')
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
<form enctype="multipart/form-data" action="{{ url('/equipment/store') }}" method="POST">
    @csrf
    <label for="description">Description</label>
    <input type="text" name="description" id=""> <br>
    <label for="category">Category</label>
    <select name="category" id="">
        <option value="Cardio Equipment">Cardio Equipment</option>
        <option value="Strength Training Equipment">Strength Training Equipment</option>
        <option value="Functional Training">Functional Training</option>
        <option value="Flexibility and Mobility Training">Flexibility and Mobility Training</option>
        <option value="Recovery Equipment">Recovery Equipment</option>
        <option value="Miscellaneous">Miscellaneous</option>
    </select> <br>

    <label for="manufacturer">Manufacturer</label>
    <select name="manufacturer" id="">
        @foreach($manufacturers as $manufacturer)
            <option value="{{ $manufacturer->id }}">{{ $manufacturer->description }}</option>
        @endforeach
    </select> <br>

    <label for="dimension">Dimension</label>
    <input type="text" name="dimension" id=""> <br>

    <label for="weight">Weight</label>
    <input type="text" name="weight" id=""> <br>

    <label for="cost">Cost</label>
    <input type="text" name="cost" id=""> <br>

    <label for="notes">Notes</label>
    <input type="text" name="notes" id=""> <br>

    <label for="image">Image</label>
    <input type="file" name="image" id=""> <br>

    <button type="submit">Save</button>
</form>
@endsection
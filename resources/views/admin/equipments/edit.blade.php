@extends('admin.shared.layouts')

@section('content')
<div class="container mt-5">
    <h1>Create Equipment</h1>
    <form enctype="multipart/form-data" action="{{ url('/equipment/'. $equipment->id .'/update') }}" method="POST" class="mt-4">
        @csrf
        <div class="form-group">
            <label for="description">Description</label>
            <input type="text" class="form-control" name="description" value="{{ $equipment->description }}">
        </div>
        <div class="form-group">
            <label for="category">Category</label>
            <select class="form-control" name="category">
                <option value="Cardio Equipment" {{ $equipment->category == "Cardio Equipment" ? 'selected' : '' }}>Cardio Equipment</option>
                <option value="Strength Training Equipment" {{ $equipment->category == "Strength Training Equipment" ? 'selected' : '' }}>Strength Training Equipment</option>
                <option value="Functional Training" {{ $equipment->category == "Functional Training" ? 'selected' : '' }}>Functional Training</option>
                <option value="Flexibility and Mobility Training" {{ $equipment->category == "Flexibility and Mobility Training" ? 'selected' : '' }}>Flexibility and Mobility Training</option>
                <option value="Recovery Equipment" {{ $equipment->category == "Recovery Equipment" ? 'selected' : '' }}>Recovery Equipment</option>
                <option value="Miscellaneous" {{ $equipment->category == "Miscellaneous" ? 'selected' : '' }}>Miscellaneous</option>
            </select>
        </div>
        <div class="form-group">
            <label for="manufacturer">Manufacturer</label>
            <select class="form-control" name="manufacturer">
                @foreach($manufacturers as $manufacturer)
                    <option value="{{ $manufacturer->id }}" {{ $manufacturer->id == $equipment->manufacturer_id ? 'selected' : '' }}>{{ $manufacturer->description }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="dimension">Dimension</label>
            <input type="text" class="form-control" name="dimension" value="{{ $equipment->dimension }}">
        </div>
        <div class="form-group">
            <label for="weight">Weight</label>
            <input type="text" class="form-control" name="weight" value="{{ $equipment->weight }}">
        </div>
        <div class="form-group">
            <label for="cost">Cost</label>
            <input type="text" class="form-control" name="cost" value="{{ $equipment->cost }}">
        </div>
        <div class="form-group">
            <label for="notes">Notes</label>
            <input type="text" class="form-control" name="notes" value="{{ $equipment->notes }}">
        </div>
        <div class="form-group">
            <label for="image">Image</label>
            <img src="{{ $equipment->getImage() }}" alt="Equipment" style="width: 50px;">
            <input type="file" class="form-control-file" name="image">
        </div>
        <button type="submit" class="btn btn-primary">Save</button>
    </form>
</div>
@endsection

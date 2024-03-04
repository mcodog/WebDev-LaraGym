@extends('admin.shared.layouts')

@section('content')
<h1>Create Equipment</h1>
<form enctype="multipart/form-data" action="{{ url('/equipment/'. $equipment->id .'/update') }}" method="POST">
    @csrf
    <label for="description">Description</label>
    <input type="text" name="description" id="" value="{{ $equipment->description }}"> <br>
    <label for="category">Category</label>
    <select name="category" id="">
        <option value="Cardio Equipment" <?php if($equipment->category == "Cardio Equipment"){ echo "selected"; } ?>>Cardio Equipment</option>
        <option value="Strength Training Equipment" <?php if($equipment->category == "Strength Training Equipment"){ echo "selected"; } ?>>Strength Training Equipment</option>
        <option value="Functional Training" <?php if($equipment->category == "Functional Training"){ echo "selected"; } ?>>Functional Training</option>
        <option value="Flexibility and Mobility Training" <?php if($equipment->category == "Flexibility and Mobility Training"){ echo "selected"; } ?>>Flexibility and Mobility Training</option>
        <option value="Recovery Equipment" <?php if($equipment->category == "Recovery Equipment"){ echo "selected"; } ?>>Recovery Equipment</option>
        <option value="Miscellaneous" <?php if($equipment->category == "Miscellaneous"){ echo "selected"; } ?>>Miscellaneous</option>
    </select> <br>

    <label for="manufacturer">Manufacturer</label>
    <select name="manufacturer" id="">
        @foreach($manufacturers as $manufacturer)
            <option value="{{ $manufacturer->id }}" <?php if($manufacturer->id == $equipment->manufacturer_id){ echo "selected"; } ?>>{{ $manufacturer->description }}</option>
        @endforeach
    </select> <br>

    <label for="dimension">Dimension</label>
    <input type="text" name="dimension" id="" value="{{ $equipment->dimension }}"> <br>

    <label for="weight">Weight</label>
    <input type="text" name="weight" id="" value="{{ $equipment->weight }}"> <br>

    <label for="cost">Cost</label>
    <input type="text" name="cost" id="" value="{{ $equipment->cost }}"> <br>

    <label for="notes">Notes</label>
    <input type="text" name="notes" id="" value="{{ $equipment->notes }}"> <br>

    <label for="image">Image</label> <img src="{{ $equipment->getImage() }}" alt="Equipment" style="width:50px;">
    <input type="file" name="image" id=""> <br>

    <button type="submit">Save</button>
</form>
@endsection
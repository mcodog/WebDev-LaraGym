@extends('admin.shared.layouts')

@section('content')
<div class="container mt-5">
    <h1>Create Manufacturer</h1>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form enctype="multipart/form-data" action="{{ url('manufacturer/store') }}" method="post" class="mt-4">
        @csrf
        <div class="form-group">
            <label for="description">Description</label>
            <input type="text" class="form-control" name="description">
        </div>
        <div class="form-group">
            <label for="address">Address</label>
            <input type="text" class="form-control" name="address">
        </div>
        <div class="form-group">
            <label for="contact">Contact</label>
            <input type="tel" class="form-control" name="contact">
        </div>
        <div class="form-group">
            <label for="image">Image</label>
            <input type="file" class="form-control-file" name="image">
        </div>
        <button type="submit" class="btn btn-primary">Save</button>
    </form>
</div>
@endsection

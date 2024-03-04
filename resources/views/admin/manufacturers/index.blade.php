@extends('admin.shared.layouts')

@section('content')
<h1>Manufacturers</h1>
<table>
    <th>Description</th>
    <th>Address</th>
    <th>Contact</th>
    <th>Image</th>
    <th>Controls</th>

    @foreach($manufacturers as $manufacturer)

    <tr>
        <td>{{ $manufacturer->description }}</td>
        <td>{{ $manufacturer->address }}</td>
        <td>{{ $manufacturer->contact }}</td>

        <td><img src="{{ $manufacturer->getImage() }}" alt="Manufacturer" style="width:50px;"></td>
        <td><a href="{{ url('manufacturer/'. $manufacturer->id .'/edit') }}">Edit</a> &nbsp <a href="{{url('manufacturer/'. $manufacturer->id.'/delete')}}">Delete</a></td>
    </tr>

    @endforeach
</table>
<a href="manufacturer/create">Create New</a>
@endsection
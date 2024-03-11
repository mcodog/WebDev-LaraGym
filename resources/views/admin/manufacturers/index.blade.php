@extends('admin.shared.layouts')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h1><strong>Manufacturers</strong></h1>
                </div>
                <div class="card-body">
                    <table class="table table-striped table-hover text-center">
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
                
                <div class="d-flex justify-content-end">
                    <a class="btn btn-success" href="manufacturer/create">Create New</a> <br>
                </div>

                <br>

                <div class="d-flex justify-content-center">
                    {{ $manufacturers->links() }}
                </div>
                
                
                </div>
                
            </div>
        </div>
    </div>
</div>

@endsection
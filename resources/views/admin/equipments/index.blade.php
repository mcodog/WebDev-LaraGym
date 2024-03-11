@extends('admin.shared.layouts')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h1>Equipments</h1>
                </div>

                <div class="card-body">
                <table class="table table-striped table-hover text-center">
                    <th>Description</th>
                    <th>Category</th>
                    <th>Manufacturer</th>
                    <th>Dimension</th>
                    <th>Weight</th>
                    <th>Cost</th>
                    <th>Notes</th>
                    <th>Image</th>
                    <th>Controls</th>

                    @foreach($equipments as $equipment)

                    <tr>
                        <td>{{ $equipment->equipment }}</td>
                        <td>{{ $equipment->category }}</td>
                        <td>{{ $equipment->manufacturer }}</td>
                        <td>{{ $equipment->dimension }}</td>
                        <td>{{ $equipment->weight }}</td>
                        <td>{{ $equipment->cost }}</td>
                        <td>{{ $equipment->notes }}</td>

                        @if($equipment->img_path == null)
                        <td><img src="{{URL::asset('storage/equipment/default-equipment.png')}}" style="width:50px;" alt="Equipment"></td>
                        @else
                            <td><img src="{{url('storage/'.$branch->img_path)}}" style="width:50px;" alt="Branch"></td>
                        @endif
                        <td><a href="{{ url('equipment/'. $equipment->id .'/edit') }}">Edit</a> &nbsp <a href="{{url('equipment/'. $equipment->id.'/delete')}}">Delete</a></td>
                    </tr>

                    @endforeach
                </table>
                <a class="button" href="equipment/create">Create New</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
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
                {{ $dataTable->table() }}
                <a class="btn btn-success" href="manufacturer/create">Create New</a>
                <br>
                
                </div>
                
            </div>
        </div>
    </div>
</div>

@endsection
@push('scripts')
    {{ $dataTable->scripts(attributes: ['type' => 'module']) }}
@endpush
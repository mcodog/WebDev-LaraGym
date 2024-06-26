@extends('admin.shared.layouts')
<style>
        body {
            background-image: url('{{ asset("images/background12.jpg") }}');
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
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
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
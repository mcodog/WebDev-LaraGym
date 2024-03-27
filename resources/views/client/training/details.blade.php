@extends('admin.shared.layouts')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h1>{{ $service->title }}</h1>
                    
                </div>
                <div class="card-body">
                    {{ $service->description }} | {{ $service->duration }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
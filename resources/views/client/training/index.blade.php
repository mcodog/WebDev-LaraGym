

@extends('admin.shared.layouts')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
        

        

            <div class="card">
                <div class="card-header">
                    <h1>Coaching Program</h1>
                </div>
                <div class="card-body">
                    <div class="programs">
                    @foreach($services as $service)
                            <a href="{{ url('program/'. $service->id .'/details') }}">
                                <div class="program-item">
                                    <div class="program-description">{{ $service->description }} | {{ $service->duration }}</div>
                                    <div class="program-title"><h2><strong>{{ $service->title }}</strong></h2></div>
                                </div>
                            </a>
                    @endforeach
                    <div class="d-flex justify-content-center">
                    {{ $services->links() }}
                </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
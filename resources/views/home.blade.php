@extends('admin.shared.layouts')

<style>
    body {
        background-image: rgba(255, 255, 255, 0);
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
        color: white; /* Change text color to white */
    }

    .transparent-card {
        background-image: rgba(255, 255, 255, 0); /* Set background image */
        background-size: cover; /* Cover the entire card with the background image */
        border: none; /* Remove card border */
        color: black; /* Change card text color to black */
        transition: box-shadow 0.3s; /* Add transition effect for box shadow */
    }

    /* Set image height and make it cover the container */
    .card-img-top {
        height: 250px;
        object-fit: cover;
    }

    /* Add padding to the container */
    .card-container {
        padding: 10px;
    }

    /* Add box shadow and elevate effect on hover */
    .transparent-card:hover {
        box-shadow: 0px 5px 20px rgba(0, 0, 0, 0.3); /* Add box shadow */
        transform: translateY(-5px); /* Elevate effect */
    }
</style>

@section('content')
<div class="container card-container">
    <div class="row justify-content-center">
        <div class="col-md-6 mb-5">
            <div class="card transparent-card">
                <img class="card-img-top" src="{{ asset('images/background.jpg') }}" alt="Card image">
                <div class="card-body">
                    <h5 class="card-title">Train with Us</h5>
                    <p class="card-text">This is a description of the card. It can contain additional information about the card content.</p>
                </div>
            </div>
        </div>

        <div class="col-md-6 mb-5">
            <div class="card transparent-card">
                <img class="card-img-top" src="{{ asset('images/background2.jpg') }}" alt="Card image">
                <div class="card-body">
                    <h5 class="card-title">Coaching</h5>
                    <p class="card-text">This is a description of the card. It can contain additional information about the card content.</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@extends('admin.shared.layouts')

<style>

    h1 {
        text-align: center; /* Center the text horizontally */            
        color: white !important; /* Set text color to white */
        font-size: 36px; /* Set the font size */
        margin-top: 100px; /* Add space above the h1 */
        margin-bottom: 50px; /* Add space below the h1 */
    }



    body {
        position: relative; /* Ensure proper stacking order */
        background-image: url('{{ asset('images/background1.jpg') }}');
        background-size: cover;
        background-position: center;
        background-attachment: fixed;
    }

    body::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.3); /* Adjust opacity here */
        z-index: -1; /* Place behind the content */
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
<h1> WELCOME TO FITZONE </h1> 

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

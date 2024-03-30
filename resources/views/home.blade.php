@extends('admin.shared.layouts')

    <style>
        body {
            background-image: url('{{ asset("images/background.jpg") }}');
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
<div class="container transparent-container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card transparent-card">
                <div class="card-header">Welcome to Our Gym</div>

                <div class="card-body">
                    <h2>Get Fit, Stay Fit</h2>
                    <p>At our gym, we're dedicated to helping you achieve your fitness goals. Whether you're looking to lose weight, build muscle, or improve your overall health, we have the resources and support you need.</p>
                    <p>Our state-of-the-art facilities and experienced trainers are here to guide you every step of the way. From group classes to personalized training programs, we offer a variety of options to suit your needs and preferences.</p>
                    <p>Join us today and start your journey to a healthier, happier you!</p>
                </div>
            </div>
        </div>
    </div>

    <div class="row justify-content-center mt-4">
        <div class="col-md-8">
            <div class="card transparent-card">
                <div class="card-header">Membership Options</div>

                <div class="card-body">
                    <p>Choose the membership plan that best fits your lifestyle:</p>
                    <ul>
                        <li>Standard Membership - Access to our gym facilities</li>
                        <li>Premium Membership - Additional perks and benefits</li>
                        <li>VIP Membership - Exclusive access and privileges</li>
                    </ul>
                    <p>Sign up today and take the first step towards a healthier you!</p>
                </div>
            </div>
        </div>
    </div>

    <div class="row justify-content-center mt-4">
        <div class="col-md-8">
            <div class="card transparent-card">
                <div class="card-header">Contact Us</div>

                <div class="card-body">
                    <p>Have questions or need more information? Contact us:</p>
                    <ul>
                        <li>Phone: 123-456-7890</li>
                        <li>Email: info@example.com</li>
                        <li>Address: 123 Gym Street, City, Country</li>
                    </ul>
                    <p>Our team is here to assist you!</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

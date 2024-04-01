@extends('admin.shared.layouts')

@section('content')
    <style>
        body {
            background-image: url('{{ asset('images/background1.jpg') }}');
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
        }
    </style>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Get Membership</div>

                    <div class="card-body">
                        <form action="{{ route('train.store') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="name">Name:</label>
                                <input type="text" id="name" name="name" class="form-control" value="{{ Auth::user()->name }}" disabled>
                            </div>
                            <div class="form-group">
                                <label for="email">Email:</label>
                                <input type="email" id="email" name="email" class="form-control" value="{{ Auth::user()->email }}" disabled>
                            </div>
                            <div class="form-group">
                                <label for="membership_plan">Membership Plan:</label>
                                <select id="membership_plan" name="membership_plan" class="form-control">
                                    <option value="Standard">Standard</option>
                                    <option value="Premium">Premium</option>
                                    <option value="VIP">VIP</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="duration">Membership Duration</label>
                                <input type="number" class="form-control" id="duration" name="duration" value="1" min="1" max="100">
                            </div>
                            <div class="form-group">
                                <label for="payment">Payment Due</label>
                                <input type="number" class="form-control" id="payment" name="payment" value="2000" readonly>
                            </div>

                            <br>
                            <div class="d-flex flex-row-reverse">
                                <button type="submit" class="btn btn-primary ">Submit</button>
                                &nbsp
                                <a href="/home" class="btn btn-light border-dark">Cancel</a>
                            </div>
                            
                        </form>
                        <script>
                            var inputElement = document.getElementById('duration');
                            var paymentVal = document.getElementById('payment');

                            inputElement.addEventListener('input', function(event) {
                                var membershipType = document.getElementById('membership_plan');
                                var memTypeVal = membershipType.value
                                if(memTypeVal === "Standard") {
                                    paymentVal.value = 2000 * event.target.value;
                                } else if (memTypeVal === "Premium") {
                                    paymentVal.value = 3000 * event.target.value;
                                } else if (memTypeVal === "VIP") {
                                    paymentVal.value = 3500 * event.target.value;
                                } else {
                                    alert("Please select a membership type.");
                                }
                            });

                            var membershipType = document.getElementById('membership_plan');

                            membershipType.addEventListener('input', function(event) {
                                var memTypeVal = membershipType.value
                                var durationVal = inputElement.value
                                console.log('ch');
                                if(memTypeVal === "Standard") {
                                    paymentVal.value = 2000 * durationVal;
                                } else if (memTypeVal === "Premium") {
                                    paymentVal.value = 3000 * durationVal;
                                } else if (memTypeVal === "VIP") {
                                    paymentVal.value = 3500 * durationVal;
                                } else {
                                    alert("Please select a membership type.");
                                }
                            });
                        </script>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
